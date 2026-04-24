<?php
session_start();

$Get = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

if (!isset($_SESSION['admin_session']) || $_SESSION['admin_session'] != $Get . session_id()) {
    header("Location: login.php");
    exit;
}

$inactive = 3600;

if (!isset($_SESSION['timeout'])) {
    $_SESSION['timeout'] = time();
}

$session_life = time() - $_SESSION['timeout'];

if ($session_life > $inactive) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

$_SESSION['timeout'] = time();
?>
