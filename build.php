<?php
declare(strict_types=1);

/*
 * Builds the website into _site/ as plain HTML for GitHub Pages.
 *
 *   php build.php            build (warns if the WhatsApp number is missing)
 *   php build.php --strict   refuse to build without it (what the publish workflow runs)
 *   php build.php --out=DIR  build somewhere else (the tests use this)
 */

require __DIR__ . '/src/site.php';

const PAGES = ['index', 'isp', 'hotels', 'cafes', 'schools', 'venues'];

$strict = in_array('--strict', $argv, true);
$out = __DIR__ . '/_site';
foreach ($argv as $arg) {
    if (str_starts_with($arg, '--out=')) {
        $out = substr($arg, 6);
    }
}

if (whatsapp_number() === '') {
    $warning = "site.config.php: 'whatsapp' is empty, so Book a demo cannot open WhatsApp.";
    if ($strict) {
        fwrite(STDERR, "Not publishing. $warning\n");
        exit(1);
    }
    fwrite(STDERR, "Warning: $warning\n");
}

$domain = strtolower(trim((string) site_config('domain', '')));
if ($domain !== '' && !preg_match('/^(?=.{4,253}$)([a-z0-9]([a-z0-9-]{0,61}[a-z0-9])?\.)+[a-z]{2,}$/', $domain)) {
    fwrite(STDERR, "site.config.php: 'domain' is not a valid domain name.\n");
    exit(1);
}

remove_dir($out);
mkdir($out . '/assets', 0755, true);

foreach (PAGES as $page) {
    ob_start();
    include __DIR__ . "/pages/$page.php";
    $html = (string) ob_get_clean();
    $count = 0;
    $html = str_replace('<meta charset="utf-8">', '<meta charset="utf-8">' . head_meta(), $html, $count);
    if ($count !== 1) {
        fwrite(STDERR, "pages/$page.php: expected one <meta charset=\"utf-8\">\n");
        exit(1);
    }
    file_put_contents("$out/$page.html", $html);
}

foreach (glob(__DIR__ . '/assets/*') ?: [] as $file) {
    copy($file, $out . '/assets/' . basename($file));
}
copy(__DIR__ . '/assets/favicon.svg', $out . '/favicon.svg');
file_put_contents($out . '/.nojekyll', '');
file_put_contents($out . '/robots.txt', "User-agent: *\nAllow: /\n");
if ($domain !== '') {
    file_put_contents($out . '/CNAME', $domain . "\n");
}

echo 'Built ' . count(PAGES) . " pages into $out" . ($domain !== '' ? " for $domain" : '') . "\n";

function remove_dir(string $dir): void
{
    if (!is_dir($dir)) {
        return;
    }
    foreach (array_diff(scandir($dir) ?: [], ['.', '..']) as $entry) {
        $path = "$dir/$entry";
        is_dir($path) && !is_link($path) ? remove_dir($path) : unlink($path);
    }
    rmdir($dir);
}
