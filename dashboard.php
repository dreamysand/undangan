<?php
session_start();
if (isset($_COOKIE['level']) && $_COOKIE['level'] == 'Admin') {
    header('Location: admin');
    exit();
} else {
    include 'views/dashboard.php';
}
?>