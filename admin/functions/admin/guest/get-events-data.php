<?php
// Ambil data acara
$table = "t_invitations";
$sql = "SELECT `f_id` `f_acara` FROM $table";
$stmt = $config->prepare($sql);
if ($stmt->execute()) {
	if ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
		?>
		<script>
			console.log('Data acara berhasil diambil')
		</script>
		<?php
	} else {
		?>
		<script>
			console.log('Data acara gagal diambil')
		</script>
		<?php
	}
} else {
	?>
	<script>
		console.log('Pernyataan gagal dieksekusi')
	</script>
	<?php
}
$stmt->close();
?>