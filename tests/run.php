<?php
declare(strict_types=1);

/*
 * Builds the site into a temporary folder and checks the result: php tests/run.php
 */

$root = dirname(__DIR__);
$out = sys_get_temp_dir() . '/sc-site-test-' . bin2hex(random_bytes(4));
$failures = 0;
$passes = 0;
function check(bool $ok, string $what): void
{
    global $failures, $passes;
    if ($ok) {
        $passes++;
        return;
    }
    $failures++;
    fwrite(STDERR, "FAIL: $what\n");
}

exec(escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg("$root/build.php") . ' ' . escapeshellarg("--out=$out") . ' 2>&1', $log, $code);
check($code === 0, 'the build runs: ' . implode(' ', $log));

$pages = ['index', 'isp', 'hotels', 'cafes', 'schools', 'venues'];
foreach ($pages as $p) {
    $file = "$out/$p.html";
    check(is_file($file), "$p.html is built");
    $html = (string) @file_get_contents($file);
    check(!str_contains($html, '<?'), "$p.html has no PHP left in it");
    check(substr_count($html, 'http-equiv="Content-Security-Policy"') === 1, "$p.html carries the security policy once");
    check(str_contains($html, '<header class="sc-top">') && str_contains($html, '<footer class="sc-foot">'), "$p.html has the shared header and footer");
    check(!preg_match('/<script>/', $html), "$p.html has no inline script");

    // Every local link and file the page points at exists in the build.
    preg_match_all('/(?:href|src)="([^"#?]+)(?:[#?][^"]*)?"/', $html, $m);
    foreach (array_unique($m[1]) as $url) {
        if (preg_match('#^(https?:|mailto:|tel:|data:|//)#', $url)) {
            continue;
        }
        // GitHub Pages serves "hotels" from hotels.html, so a link without an extension names a page.
        $target = $url === './' ? "$out/index.html" : "$out/" . ltrim($url, './');
        check(is_file($target) || is_file("$target.html"), "$p.html links to $url, which exists");
    }
    check(!preg_match('/href="[^"]*\.php/', $html), "$p.html links to no .php page");
    check(!preg_match('/href="(?!https?:)[^"]*\.html/', $html), "$p.html links to pages by clean address, without .html");

    if ($p !== 'index') {
        check(str_contains($html, 'data-booking'), "$p.html has the booking form");
        check(str_contains($html, 'name="size_label"'), "$p.html's form carries its size question");
        check(str_contains($html, 'Continue on WhatsApp'), "$p.html's button says what happens next");
        check(!str_contains($html, 'book.php') && !str_contains($html, '_token'), "$p.html has no server-only form parts");
    }
}
check(is_file("$out/assets/booking.js") && is_file("$out/assets/chrome.css") && is_file("$out/favicon.svg"), 'assets are copied');
check(is_file("$out/.nojekyll"), 'GitHub Pages is told not to run Jekyll');

// Scripts must not send visitors to the .php templates either: only the .html pages are published.
foreach (glob("$out/assets/*.js") as $script) {
    check(!preg_match('/[\w-]+\.php\b/', (string) file_get_contents($script)), basename($script) . ' points at no .php page');
}

// The home page's "I run …" picker is a set of real links, one per edition, so it works without scripts.
$home = (string) file_get_contents("$out/index.html");
preg_match('#<div class="picker".*?</div>#s', $home, $picker);
foreach (['isp', 'hotels', 'cafes', 'schools', 'venues'] as $edition) {
    check(str_contains($picker[0] ?? '', 'href="' . $edition . '"'), "the home picker links to /$edition");
}

// The booking script never writes HTML from the form, only text.
$js = (string) file_get_contents("$root/assets/booking.js");
check(!preg_match('/innerHTML|outerHTML|insertAdjacentHTML|document\.write|eval\(/', $js), 'booking.js never injects HTML');

// --strict refuses to publish without a WhatsApp number (only checkable while the number is empty).
require "$root/src/site.php";
if (whatsapp_number() === '') {
    exec(escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg("$root/build.php") . ' --strict ' . escapeshellarg("--out=$out-strict") . ' 2>&1', $l2, $code2);
    check($code2 !== 0, '--strict refuses to build without a WhatsApp number');
} else {
    $hotel = (string) file_get_contents("$out/hotels.html");
    check(str_contains($hotel, 'action="https://wa.me/' . whatsapp_number() . '"'), 'the form opens WhatsApp to the configured number');
}

// Clean up.
$rm = static function (string $dir) use (&$rm): void {
    if (!is_dir($dir)) {
        return;
    }
    foreach (array_diff(scandir($dir) ?: [], ['.', '..']) as $e) {
        is_dir("$dir/$e") ? $rm("$dir/$e") : unlink("$dir/$e");
    }
    rmdir($dir);
};
$rm($out);
$rm("$out-strict");

echo $failures === 0 ? "OK ($passes checks)\n" : "$failures failed, $passes passed\n";
exit($failures === 0 ? 0 : 1);
