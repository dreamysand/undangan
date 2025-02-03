<?php
session_start();
if (isset($_COOKIE['level']) && $_COOKIE['level'] == 'Admin') {
    header("Location: dashboard.php");
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>