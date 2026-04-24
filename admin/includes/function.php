<?php
@session_start();
//error_reporting(0);
if($_SERVER['SERVER_NAME']=="localhost")
{
$hostname = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname="u554775428_saiman_db";
}
else
{
// $hostname = "localhost";
// $dbusername = "saiman_new_user";
// $dbpassword = "w*xZj*waB1Bu";
// $dbname="saiman_db_new";

    $hostname = "localhost";
    $dbusername = "wecarede_wecaredbuser";
    $dbpassword = "[zNByTS0qa}5";
    $dbname = "wecarede_wecaredb";

    define('BASE_URL', 'https://wecaredentist.com/');
    define('SITE_NAME', 'We Care HealthCare');
    define('RECAPTCHA_SITE_KEY', '6LcrypssAAAAALRzkkhD0621NtKURCnSc8rErNCo');
    define('RECAPTCHA_SECRET_KEY', '6LcrypssAAAAAOcp7IyrY3y1tMFgONOuSdcagHSA');

// $hostname = "localhost";
// $dbusername = "saimanhealth_user";
// $dbpassword = "9=A^ZJi1.Tg!";
// $dbname="saiman_db";
}
@define("SITE_URL","https://wecaredentist.com/");
$conn = mysqli_connect($hostname, $dbusername, $dbpassword,$dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
?>