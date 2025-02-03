<?php
// Ambil data acara
if (isset($_GET['id_event'])) {
	$id_Event = $_GET['id_event'];
	$table = "t_invitations";
	$sql = "SELECT `f_id`, `f_acara` FROM $table WHERE `f_id` = :id_event";
	$stmt = $config->prepare($sql);
	if ($stmt->execute([
		':id_event'=>$id_Event
	])) {
		if ($events = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
}
$stmt = null;
?>