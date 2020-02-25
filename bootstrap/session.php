<?php

if (! isLogin()) {
    $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    header('location:' . APP_URL . '/login.php?to=' . $link);
    die();
}

$user = $_SESSION['user'];