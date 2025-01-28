<?php
session_start();
if (isset($_COOKIE['id']) && isset($_COOKIE['level']) && $_COOKIE['level'] == 'Admin') {
    require 'functions/config.php';
    require 'functions/admin/admin-management/read-admin.php';
    require 'views/admin-management/admin-table.php';
} else {
    header('Location: ../');
    exit();
}
?>