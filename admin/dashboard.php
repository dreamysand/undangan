<?php
session_start();
if (isset($_COOKIE['id']) && isset($_COOKIE['level']) && $_COOKIE['level'] == 'Admin') {
	require 'views/dashboard.php';
} else {
	header('Location: ../');
	exit();
}
?>