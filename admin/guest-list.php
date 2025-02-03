<?php
session_start();
if (isset($_COOKIE['id']) && isset($_COOKIE['level']) && $_COOKIE['level'] == 'Admin') {
    require 'functions/config.php';
    require 'functions/admin/guest/guest-list.php';
    require 'functions/admin/guest/get-events-data.php';
    require 'views/guest/guest-list.php';
} else {
    header('Location: ../');
    exit();
}
?>