<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
	isset($_GET['gallery']) &&
	isset($_GET['id_acara'])) {
	$table_galeri = 't_galeri';
	$table_invitations = 't_invitations';

	$id_Acara = $_GET['id_acara'];

	$sql = "SELECT `f_file_path` FROM $table_invitations WHERE `f_id` = :id_acara";
	$stmt = $config->prepare($sql);
	$stmt->execute([
		':id_acara' => $id_Acara
	]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	$stmt = null;

	if (isset($_FILES['gambar'])) {
		$asset_Dir = 'asset';
		$file_path = $result['f_file_path'];
		$location_Img = "/$asset_Dir/";
		$images = UploadIMGS($_FILES['gambar'], $location_Img);
		if (!empty($images)) {
			foreach ($images as $image) {
				$sql = "INSERT 
						INTO $table_galeri
						( `f_id_acara`, 
							`f_image`) 
						VALUES 
						(:id_acara,
							:img)";
				$stmt = $config->prepare($sql);	
				if ($stmt->execute([
					':id_acara' => $id_Acara,
					':img' => htmlspecialchars($image)
				])) {
					?>
					<script>
						if (confirm("Gambar berhasil ditambah")) {
							window.location.href = localStorage.getItem("previousPage");
						}
					</script>
					<?php
				} else {
					?>
					<script>
						alert("Gambar gagal ditambahkan");
					</script>
					<?php
				}
			}
		} else {
			?>
			<script>
				alert("Gambar kosong");
			</script>
			<?php
		}
		
	} else {
		?>
		<script>
			alert("Gambar tidak ditambahkan");

		</script>
		<?php
	}
}
?>