<?php
session_start();
if (isset($_COOKIE['id']) && isset($_COOKIE['level']) && $_COOKIE['level'] == 'Admin') {
    require 'functions/config.php';
    require 'functions/admin/invitations/gallery.php';
    require 'views/invitations/gallery.php';
} else {
    header('Location: ../');
    exit();
}
?>