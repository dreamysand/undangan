<?php
if (isset($_POST['username']) && 
	isset($_POST['email']) && 
	isset($_POST['password'])) {
	// Definisikan variabel dari input
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$table = 't_admin';

	if ($hashed_Password = password_hash($password, PASSWORD_DEFAULT)) {
		$sql = "INSERT INTO $table(`f_username`, `f_email`, `f_password`) VALUES (:username,:email,:password)";
		$stmt = $config->prepare($sql);
		if ($stmt->execute([
			':username'=>$username,
			':email'=>$email,
			':password'=>$hashed_Password
		])) {
			echo 'Admin berhasil ditambahkan';
		} else {
			echo 'Admin gagal ditambahkan';
		}
	} else {
		echo 'Password gagal dihash';
	}
	$stmt = null;
}
?>