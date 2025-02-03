<?php
session_start();
if (isset($_COOKIE['id']) && isset($_COOKIE['level']) && $_COOKIE['level'] == 'Admin') {
    require 'functions/logout.php';
} else {
    header('Location: ../');
    exit();
}
?>