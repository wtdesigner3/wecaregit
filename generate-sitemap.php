<?php
ob_start();
require_once('inc/function.php');
ob_clean();

header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

$base = rtrim(BASE_URL, '/') . '/';
$lastmod = date('Y-m-d');

// Static Pages
$static_pages = ['', 'about', 'services', 'blog', 'contact', 'privacy', 'termsandcondition'];
foreach ($static_pages as $page) {
    echo '  <url>' . PHP_EOL;
    echo '    <loc>' . $base . $page . '</loc>' . PHP_EOL;
    echo '    <lastmod>' . $lastmod . '</lastmod>' . PHP_EOL;
    echo '    <changefreq>weekly</changefreq>' . PHP_EOL;
    echo '    <priority>' . ($page == '' ? '1.0' : '0.8') . '</priority>' . PHP_EOL;
    echo '  </url>' . PHP_EOL;
}


// Services from DB
$svcQuery = mysqli_query($conn, "SELECT url FROM `tbl_services` WHERE `status`='1'");
while ($svc = mysqli_fetch_assoc($svcQuery)) {
    echo '  <url>' . PHP_EOL;
    echo '    <loc>' . $base . 'services/' . rawurlencode($svc['url']) . '</loc>' . PHP_EOL;
    echo '    <lastmod>' . $lastmod . '</lastmod>' . PHP_EOL;
    echo '    <changefreq>monthly</changefreq>' . PHP_EOL;
    echo '    <priority>0.8</priority>' . PHP_EOL;
    echo '  </url>' . PHP_EOL;
}

// Blogs from DB
$blogQuery = mysqli_query($conn, "SELECT b_url FROM `tbl_blogs` WHERE `b_status`='1'");
while ($blog = mysqli_fetch_assoc($blogQuery)) {
    echo '  <url>' . PHP_EOL;
    echo '    <loc>' . $base . 'blog-detail/' . rawurlencode($blog['b_url']) . '</loc>' . PHP_EOL;
    echo '    <lastmod>' . $lastmod . '</lastmod>' . PHP_EOL;
    echo '    <changefreq>monthly</changefreq>' . PHP_EOL;
    echo '    <priority>0.7</priority>' . PHP_EOL;
    echo '  </url>' . PHP_EOL;
}

echo '</urlset>';

