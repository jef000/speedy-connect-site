<?php
/**
 * Local preview only (never published): php -S localhost:8080 -t _site serve.php
 * Serves /hotels from hotels.html, the way GitHub Pages does, so clean addresses work locally too.
 */
declare(strict_types=1);

$path = rawurldecode((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH));
$root = realpath($_SERVER['DOCUMENT_ROOT']);
$page = $root === false ? false : realpath($root . '/' . ltrim($path, '/') . '.html');

if ($page !== false && str_starts_with($page, $root . DIRECTORY_SEPARATOR) && is_file($page)) {
    header('Content-Type: text/html; charset=utf-8');
    readfile($page);
    return true;
}
return false; // anything else: the built-in server serves the file as usual
