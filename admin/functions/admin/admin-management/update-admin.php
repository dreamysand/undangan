<?php
if (isset($_POST['username']) &&
	isset($_POST['password']) &&
	isset($_POST['email'])) {
	// Definisikan variabel dari input
	$username = $_POST['username'];
	$email = $_POST['email'];
	$id_admin = $_GET['id_admin'];
	$table = 't_admin';

	if (!is_null($_POST['password'])) {
		$password = $_POST['password'];
		if ($hashed_Password = password_hash($password, PASSWORD_DEFAULT)) {
			$sql = "UPDATE $table 
					SET 
					    `f_username` = :username, 
					    `f_email` = :email, 
					    `f_password` = :password 
					WHERE `f_id` = :id_admin;
					";
			$stmt = $config->prepare($sql);
			if ($stmt->execute([
				':username'=>$username,
				':email'=>$email,
				':password'=>$hashed_Password,
				':id_admin'=>$id_admin,
			])) {
				?>
				<script>
					if (confirm("Admin berhasil diedit")) {
						window.location.href = localStorage.getItem("previousPage");
					}
				</script>
				<?php
			} else {
				?>
				<script>
					alert("Admin gagal diedit");

				</script>
				<?php
			}
		} else {
			?>
			<script>
				alert("Password gagal di hash");
			</script>
			<?php
		}
	} else {
		$sql = "UPDATE $table 
					SET 
					    `f_username` = :username, 
					    `f_email` = :email
					WHERE `f_id` = :id_admin;
				";
		$stmt = $config->prepare($sql);
		if ($stmt->execute([
			':username'=>$username,
			':email'=>$email,
			':id_admin'=>$id_admin,
		])) {
			?>
			<script>
				alert("Admin berhasil diedit");
				window.location.href='../';
			</script>
			<?php
		} else {
			?>
			<script>
				alert("Admin gagal diedit");
			</script>
			<?php
		}
	}
	$stmt = null;
}
?>