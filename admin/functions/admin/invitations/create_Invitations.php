<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acara']) && isset($_POST['lokasi']) && isset($_POST['tanggal'])) {
	$table = 't_invitations';
	$acara = $_POST['acara'];
	$tanggal = $_POST['tanggal'];
	$lokasi = $_POST['lokasi'];

	$location_Link_Verified = "https://maps.app.goo.gl/";
	if (stripos($lokasi, $location_Link_Verified) !== false) {
		if (!file_exists($acara)) {
			if (mkdir($acara)) {
				$functions_Dir = 'functions';
				$views_Dir = 'views';
				$databases_Dir = 'databases';
				$asset_Dir = 'asset';
				if (mkdir($acara.'/'.$functions_Dir) && mkdir($acara.'/'.$views_Dir) && mkdir($acara.'/'.$databases_Dir) && mkdir($acara.'/'.$asset_Dir)) {
					if (isset($_FILES['gambar'])) {
						$location_Img = $acara.'/'.$asset_Dir.'/';
						$image = UploadIMG($_FILES['gambar'], $location_Img);
						if ($image != null) {
							$sql = "INSERT INTO $table(`f_admin_id`, `f_acara`, `f_alamat`, `f_tanggal_acara`, `f_image`, `f_file_path`) VALUES (:admin_id,:acara,:alamat,:tanggal,:img,:filepath)";
							$stmt = $config->prepare($sql);	
							$stmt->execute([
								':admin_id' => $_COOKIE['id'],
								':acara' => $acara,
								':alamat' => $lokasi,
								':tanggal' => $tanggal,
								':img' => $image,
								':filepath' => $acara,
							]);
							?>
							<script>
								alert("Acara berhasil ditambahkan");
								window.location.href = "undangan.php";
							</script>
							<?php
						} else {
							?>
							<script>
								alert("Acara gagal ditambahkan");
							</script>
							<?php
						}
						
					} else {
						?>
						<script>
							alert("Gambar tidak diisi");
		
						</script>
						<?php
					}						
				} else {
					?>
					<script>
						alert("Gambar gagal ditambahkan");
					</script>
					<?php
				}
			} else {
				?>
				<script>
					alert("Direktori gagal ditambahkan");

				</script>
				<?php
			}
		} else {
			?>
			<script>
				alert("Folder sudah ada");

			</script>
			<?php
		}
	} else {
		?>
		<script>
			alert("Link tidak valid");
		</script>
		<?php
	}
}
?>