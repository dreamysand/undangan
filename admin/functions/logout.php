<?php
session_start();
$table = 't_admin';
$id_admin = $_COOKIE['id'];
$sql = "UPDATE 
        $table
        SET
        `f_status` = :status
        WHERE
        `f_id` = :id_admin
        ";

$stmt = $config->prepare($sql); 
if ($stmt->execute([
    'status' => "Nonaktif",
    'id_admin' => $id_admin,
])) {
	setcookie("remember_me", "", time()-3600, "/");
	setcookie("level", "", time()-3600, "/");
	setcookie("cookie_exp", "", time()-3600, "/");
	setcookie("id", "", time()-3600, "/");

	header("Location: ../");
	exit();
}
?>