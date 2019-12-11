<?php
require_once "../config/config.php";
if (!isset($_SESSION['user'])) {
    header("location:" . base_url('auth/login.php') . "");
    exit();
}

session_destroy();
session_unset();
unset($_SESSION['user']);
$_SESSION = [];
header("location:" . base_url('auth/login.php') . "");
exit();
