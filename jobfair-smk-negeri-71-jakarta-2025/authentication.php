<?php
session_start();
require 'functions/config.php';
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true) {
	header("Location: ./");
	exit();
} else {
	require 'functions/get-data.php';
	require 'functions/authentication.php';
	require 'views/open-invitation.php';
}
?>