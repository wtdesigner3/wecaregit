<?php
if ($_SERVER['SERVER_NAME'] == "localhost") {

    $hostname = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "wecarede_wecaredb";

    define('BASE_URL', 'http://lo calhost/wecarefix/');
    define('SITE_NAME', 'We Care HealthCare');
    define('RECAPTCHA_SITE_KEY', '6LcrypssAAAAALRzkkhD0621NtKURCnSc8rErNCo');
    define('RECAPTCHA_SECRET_KEY', '6LcrypssAAAAAOcp7IyrY3y1tMFgONOuSdcagHSA');

} else {

    $hostname = "localhost";
    $dbusername = "wecarede_wecaredbuser";
    $dbpassword = "[zNByTS0qa}5";
    $dbname = "wecarede_wecaredb";

    define('BASE_URL', 'https://wecaredentist.com/');
    define('SITE_NAME', 'We Care HealthCare');
    define('RECAPTCHA_SITE_KEY', '6LcrypssAAAAALRzkkhD0621NtKURCnSc8rErNCo');
    define('RECAPTCHA_SECRET_KEY', '6LcrypssAAAAAOcp7IyrY3y1tMFgONOuSdcagHSA');
}

$conn = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);

if (!$conn) {
    die("Database Connection Failed");
}

define("BASE_NAME", "We Care");

date_default_timezone_set('Asia/Kolkata');

$ip_address = $_SERVER['REMOTE_ADDR'] ?? '';
$date = date('Y-m-d H:i:s');
?>