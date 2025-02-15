<?php
session_start();
require 'functions/config.php';
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true) {
	require 'functions/get-data.php';
	require 'functions/get-gallery.php';
	require 'views/index.php';
} else {
	header("Location: authentication.php");
	exit();
}
?>