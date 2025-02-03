<?php
session_start();
if (isset($_COOKIE['id']) && isset($_COOKIE['level']) && $_COOKIE['level'] == 'Admin') {
	require 'functions/config.php';
	if (isset($_GET['id_admin'])) {
		require 'functions/admin/admin-management/delete-admin.php';
	} elseif (isset($_GET['id_guest'])) {
		require 'functions/admin/guest/delete-guest.php';
	} else {
		require 'functions/admin/invitations/delete-invitations.php';
	}
} else {
	header('Location: ../');
	exit();
}
?>