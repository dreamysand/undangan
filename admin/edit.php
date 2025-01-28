<?php
session_start();
if (isset($_COOKIE['id']) && isset($_COOKIE['level']) && $_COOKIE['level'] == 'Admin') {
	require 'functions/config.php';
	if (isset($_GET['id_admin'])) {
		require 'functions/admin/admin-management/edit-admin.php';
		// require 'functions/admin/admin/update-admin.php';
		require 'views/admin-management/edit-admin.php';
	} else {
		require 'functions/admin/invitations/edit-invitations.php';
		require 'functions/admin/invitations/update-invitations.php';
		require 'views/invitations/edit-invitations.php';
	}
} else {
	header('Location: ../');
	exit();
}
?>