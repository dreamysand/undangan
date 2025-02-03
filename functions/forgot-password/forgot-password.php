<?php
if (isset($_POST['email'])) {
	$email = $_POST['email'];
	$table = 't_admin';
	$check_Email = CheckEmail($email);
	if ($check_Email > 0) {
        $account = SelectAccount($email);
        if ($account != null) {
        	$_SESSION['forgot_password'] = 2;
            $_SESSION['id_admin'] = $account['f_id'];
        } else {
        	?>
			<script>
				alert("Data akun kosong");
			</script>
			<?php
        }
	} else {
		?>
		<script>
			alert("Akun tidak ditemukan");
		</script>
		<?php
	}
} 

if (isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
	$password = $_POST['new_password'];
	$confirm_password = $_POST['confirm_password'];
	$id_admin = $_SESSION['id_admin'];
	$table = 't_admin';

	if ($password == $confirm_password) {
		if ($hashed_Password = password_hash($password, PASSWORD_DEFAULT)) {
			$sql = "UPDATE $table 
					SET 
					    `f_password` = :password 
					WHERE `f_id` = :id_admin;
					";
			$stmt = $config->prepare($sql);
			if ($stmt->execute([
				':password'=>$hashed_Password,
				':id_admin'=>$id_admin
			])) {
				?>
				<script>
					alert("Password berhasil diganti");
					window.location.href='login.php';
				</script>
				<?php
			} else {
				?>
				<script>
					alert("Password gagal diganti");
				</script>
				<?php
			}
		} else {
			?>
			<script>
				alert("Password gagal dihash");
			</script>
			<?php
		}
	} else {
		?>
		<script>
			alert("Password gagal dikonfirmasi");
		</script>
		<?php
	}
}
?>