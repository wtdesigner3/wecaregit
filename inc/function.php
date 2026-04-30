<?php
if ($_SERVER['SERVER_NAME'] == "localhost") {
    $hostname = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "wecarede_wecaredb";
} else {
    $hostname = "localhost";
    $dbusername = "wecarede_wecaredbuser";
    $dbpassword = "[zNByTS0qa}5";
    $dbname = "wecarede_wecaredb";
}

if (!defined('BASE_URL')) {
    if ($_SERVER['SERVER_NAME'] == "localhost") {
        define('BASE_URL', 'http://localhost/wecarefix/');
    } else {
        define('BASE_URL', 'https://wecaredentist.com/');
    }
}

if (!defined('SITE_NAME')) {
    define('SITE_NAME', 'We Care HealthCare');
}

if (!defined('RECAPTCHA_SITE_KEY')) {
    define('RECAPTCHA_SITE_KEY', '6LcrypssAAAAALRzkkhD0621NtKURCnSc8rErNCo');
}

if (!defined('RECAPTCHA_SECRET_KEY')) {
    define('RECAPTCHA_SECRET_KEY', '6LcrypssAAAAAOcp7IyrY3y1tMFgONOuSdcagHSA');
}

if (!defined('BASE_NAME')) {
    define("BASE_NAME", "We Care");
}

$conn = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);

if (!$conn) {
    die("Database Connection Failed");
}

date_default_timezone_set('Asia/Kolkata');

$ip_address = $_SERVER['REMOTE_ADDR'] ?? '';
$date = date('Y-m-d H:i:s');
