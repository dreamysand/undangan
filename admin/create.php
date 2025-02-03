<?php
session_start();
if (isset($_COOKIE['id']) && isset($_COOKIE['level']) && $_COOKIE['level'] == 'Admin') {
	require 'functions/config.php';
	if (isset($_GET['admin'])) {
		require 'functions/admin/admin-management/add-admin.php';
		require 'views/admin-management/add-admin.php';
	} elseif (isset($_GET['id_event'])) {
		require 'functions/admin/guest/add-guest.php';
		require 'views/guest/add-guest.php';
	} else {
		require 'functions/admin/invitations/create-invitations.php';
		require 'views/invitations/create-invitations.php';
	}
} else {
	header('Location: ../');
	exit();
}
?>