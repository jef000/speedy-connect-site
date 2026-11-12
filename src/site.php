<?php
declare(strict_types=1);

/*
 * Everything the page templates call. The site is built into plain HTML (build.php) and served by
 * GitHub Pages, so nothing here runs on a visitor's request: there is no server, no session and no
 * form handler. "Book a demo" hands the request to WhatsApp in the visitor's browser (assets/booking.js).
 */

if (defined('SITE_ROOT')) {
    return;
}
define('SITE_ROOT', dirname(__DIR__));

/** Escape for HTML text and attributes. */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** @return mixed */
function site_config(string $key, $default = null)
{
    static $config = null;
    $config ??= require SITE_ROOT . '/site.config.php';
    return $config[$key] ?? $default;
}

/** The business WhatsApp number, digits only (international form, e.g. 254712345678). */
function whatsapp_number(): string
{
    return preg_replace('/\D+/', '', (string) site_config('whatsapp', '')) ?? '';
}

function whatsapp_url(string $text = ''): string
{
    $number = whatsapp_number();
    if ($number === '') {
        return '#book';
    }
    return 'https://wa.me/' . $number . ($text !== '' ? '?text=' . rawurlencode($text) : '');
}

/** The five editions: one list drives the menu, the edition strip, the footer and the forms. */
function editions(): array
{
    return [
        'isp' => [
            'path' => 'isp', 'name' => 'for ISPs', 'short' => 'ISPs', 'color' => '#111215', 'icon' => '◎',
            'sub' => 'Sell internet: M-Pesa billing, hotspot and home lines, routers watched',
            'edition' => 'ISP', 'size_label' => 'How many routers?', 'size_default' => '3–10',
        ],
        'hotels' => [
            'path' => 'hotels', 'name' => 'for Hotels', 'short' => 'Hotels', 'color' => '#2E5E4E', 'icon' => '⌂',
            'sub' => 'Wi-Fi that follows the booking, event codes, OPERA',
            'edition' => 'Hotel', 'size_label' => 'How many rooms?', 'size_default' => '21–60',
        ],
        'cafes' => [
            'path' => 'cafes', 'name' => 'for Cafés & restaurants', 'short' => 'Cafés', 'color' => '#B4532A', 'icon' => '☕',
            'sub' => 'A free hour in one tap, and offers that bring guests back',
            'edition' => 'Café', 'size_label' => 'How many seats?', 'size_default' => '31–80',
        ],
        'schools' => [
            'path' => 'schools', 'name' => 'for Schools', 'short' => 'Schools', 'color' => '#1F3A68', 'icon' => '✎',
            'sub' => 'Student sign-in, study hours, lights-out and blocked sites',
            'edition' => 'School', 'size_label' => 'How many students?', 'size_default' => '500–2,000',
        ],
        'venues' => [
            'path' => 'venues', 'name' => 'for Venues', 'short' => 'Venues', 'color' => '#3C6E5A', 'icon' => '▦',
            'sub' => 'Offices, clinics, churches, event spaces: a code for every room',
            'edition' => 'Venue', 'size_label' => 'How many people use the Wi-Fi on a busy day?', 'size_default' => '51–200',
        ],
    ];
}

/** Kept so the templates read the same as the PHP-hosted version; nothing to do for a static build. */
function page_begin(string $pageId): void
{
}

/** Hidden fields, the error area and a no-JavaScript fallback, printed right after each <form> tag. */
function booking_fields(string $pageId): void
{
    $page = editions()[$pageId] ?? null;
    if ($page === null) {
        return;
    }
    echo '<input type="hidden" name="page" value="' . e($pageId) . '">';
    echo '<input type="hidden" name="edition" value="' . e($page['edition']) . '">';
    echo '<input type="hidden" name="size" value="' . e($page['size_default']) . '">';
    echo '<input type="hidden" name="size_label" value="' . e($page['size_label']) . '">';
    echo '<p class="bk-msg" role="alert" hidden style="margin:0 0 12px;padding:10px 12px;border-radius:8px;background:#fdecea;color:#8a2a1c;font-size:14px;line-height:1.45"></p>';
    echo '<noscript><p style="margin:0 0 12px;font-size:14px">This form needs JavaScript. You can also '
        . '<a href="' . e(whatsapp_url('Hello Speedy Connect, I would like a ' . $page['edition'] . ' demo')) . '">message us on WhatsApp</a> directly.</p></noscript>';
}

function site_header(string $current): void
{
    $eds = editions();
    $here = $eds[$current] ?? null;

    $menu = '';
    foreach ($eds as $id => $ed) {
        $menu .= '<a href="' . e($ed['path']) . '"' . ($id === $current ? ' class="sc-here" aria-current="page"' : '') . '>'
            . '<span class="sq" style="background:' . e($ed['color']) . '">' . e($ed['icon']) . '</span>'
            . '<span><b>Speedy Connect ' . e($ed['name']) . '</b><small>' . e($ed['sub']) . '</small></span></a>';
    }

    $strip = '';
    if ($here !== null) {
        $strip = '<div class="sc-strip"><div class="sc-w"><span class="lbl">Editions</span>';
        foreach ($eds as $id => $ed) {
            $strip .= '<a href="' . e($ed['path']) . '"'
                . ($id === $current ? ' class="sc-here" aria-current="page" style="--ed:' . e($ed['color']) . '"' : '') . '>'
                . '<span class="d" style="background:' . e($ed['color']) . '"></span>' . e($ed['short']) . '</a>';
        }
        $strip .= '</div></div>';
    }

    echo '<header class="sc-top"><div class="sc-w sc-bar">'
        . '<a class="sc-brand" href="./"><i>⌁</i>Speedy Connect</a>'
        . '<nav class="sc-links" aria-label="Main">'
        . '<div class="sc-ed"><button type="button" aria-expanded="false" aria-haspopup="true"' . ($here !== null ? ' class="sc-cur"' : '') . '>Editions ▾</button>'
        . '<div class="sc-dd"><div class="sc-ddh">One Speedy Connect, five editions</div>' . $menu
        . '<a class="sc-all" href="./#editions">Compare all editions →</a></div></div>'
        . '<a href="./#platform">Platform</a><a href="#">Pricing</a><a href="#">Stories</a><a href="#">About</a>'
        . '</nav>'
        . '<a class="sc-cta" href="#book">Book a demo</a>'
        . '</div>' . $strip . '</header>';
}

function site_footer(): void
{
    $links = '';
    foreach (editions() as $ed) {
        $links .= '<a href="' . e($ed['path']) . '">' . e($ed['short']) . '</a>';
    }
    echo '<footer class="sc-foot"><div class="sc-w"><div class="sc-cols">'
        . '<div><span class="sc-brand"><i>⌁</i>Speedy Connect</span><p>Network management for every business that runs a network: ISPs, hotels, cafés, schools and venues. Made in Nairobi.</p></div>'
        . '<div><b>Editions</b>' . $links . '</div>'
        . '<div><b>Company</b><a href="./#platform">Platform</a><a href="#">Pricing</a><a href="#">Stories</a><a href="#">About</a></div>'
        . '<div><b>Talk to us</b><a href="#book">Book a demo</a><a href="' . e(whatsapp_url('Hello Speedy Connect')) . '">WhatsApp</a><a href="#">Help centre</a></div>'
        . '</div><div class="sc-legal"><span>© ' . date('Y') . ' Speedy Connect</span><span>Privacy · ODPC · Terms</span></div></div></footer>';
}

/** Meta tags every built page gets in its <head>. GitHub Pages can't send headers, so CSP goes here. */
function head_meta(): string
{
    $csp = "default-src 'self'; script-src 'self'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; "
        . "font-src https://fonts.gstatic.com; img-src 'self' data:; connect-src 'self'; object-src 'none'; "
        . "base-uri 'self'; form-action https://wa.me";
    return '<meta http-equiv="Content-Security-Policy" content="' . e($csp) . '">'
        . '<meta name="referrer" content="strict-origin-when-cross-origin">';
}
