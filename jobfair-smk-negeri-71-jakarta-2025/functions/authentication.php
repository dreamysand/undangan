<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" &&
	isset($_POST['unique_id'])) {
	$kode_unik = htmlspecialchars($_POST['unique_id']);
	$table = "t_invitations_data";
	$sql = "SELECT COUNT(*) FROM $table WHERE `f_kode_unik_tamu` = :kode_unik";

	$stmt = $config->prepare($sql);
	$stmt->execute([
		':kode_unik' => $kode_unik
	]);
	$result = $stmt->fetchColumn();

	if ($result>0) {
		$_SESSION['authenticated'] = true;
		$_SESSION['unique_id'] = $kode_unik;
		header("Location: ./");
		exit();
	} else {
		?>
		<script>
			alert("Autentikasi gagal");
		</script>
		<?php
	}
}
?>