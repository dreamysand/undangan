<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && 
	isset($_POST['acara']) && 
	isset($_POST['lokasi']) &&
	isset($_POST['embed_lokasi']) && 
	isset($_POST['tanggal']) &&
	isset($_POST['tanggal_berakhir'])) {
	$table = 't_invitations';
	$acara = htmlspecialchars($_POST['acara']);
	$tanggal = htmlspecialchars($_POST['tanggal']);
	$tanggal_berakhir = htmlspecialchars($_POST['tanggal_berakhir']);
	$lokasi = htmlspecialchars($_POST['lokasi']);
	$embed_lokasi = htmlspecialchars($_POST['embed_lokasi']);

	$location_Link_Verified = "https://maps.app.goo.gl/";
    $embed_Link_Verified = "https://www.google.com/maps/embed?pb=";

    $sql = "
    SELECT
    COUNT(*)
    FROM $table
    WHERE 
    `f_tanggal_acara` = :tanggal
    ";

    $stmt = $config->prepare($sql);
    $stmt->execute([
    	':tanggal' => $tanggal
    ]);
    $result = $stmt->fetchColumn();
    if ($result > 0) {
    	?>
		<script>
			alert("Tidak boleh ada acara di tanggal yang sama");
		</script>
		<?php
		exit();
    }
    $stmt = null;

    $sql = "
    SELECT
    COUNT(*)
    FROM $table
    WHERE 
    `f_acara` = :acara 
    ";
    $stmt = $config->prepare($sql);
    $stmt->execute([
    	':acara' => $acara
    ]);
    $result = $stmt->fetchColumn();
    if ($result > 0) {
    	?>
		<script>
			alert("Tidak boleh ada acara yang sama");
		</script>
		<?php
		exit();
    }
    $stmt = null;

	if (stripos($lokasi, $location_Link_Verified) !== false) {
		if (stripos($embed_lokasi, $embed_Link_Verified) !== false) {
			if (strtotime($tanggal) <= strtotime($tanggal_berakhir)) {
				$acara_Parent_Path = htmlspecialchars('../'.strtolower(str_replace(" ", "-",$acara))); 
				if (!file_exists($acara_Parent_Path)) {
					if (mkdir($acara_Parent_Path)) {
						$functions_Dir = 'functions';
						$views_Dir = 'views';
						$databases_Dir = 'databases';
						$asset_Dir = 'asset';
						if (mkdir($acara_Parent_Path.'/'.$functions_Dir) && mkdir($acara_Parent_Path.'/'.$views_Dir) && mkdir($acara_Parent_Path.'/'.$databases_Dir) && mkdir($acara_Parent_Path.'/'.$asset_Dir)) {
							if (isset($_FILES['gambar'])) {
								$location_Img = $acara_Parent_Path.'/'.$asset_Dir.'/';
								$image = htmlspecialchars(UploadIMG($_FILES['gambar'], $location_Img));
								if ($image != null) {
									$sql = "INSERT 
											INTO $table
											(`f_admin_id`, 
												`f_acara`, 
												`f_alamat`, 
												`f_tanggal_acara`, 
												`f_image`, 
												`f_file_path`) 
											VALUES 
											(:admin_id,
												:acara,
												:alamat,
												:tanggal,
												:img,
												:filepath)";
									$stmt = $config->prepare($sql);	
									if ($stmt->execute([
										':admin_id' => $_COOKIE['id'],
										':acara' => $acara,
										':alamat' => $lokasi,
										':tanggal' => $tanggal,
										':img' => $image,
										':filepath' => $acara_Parent_Path,
									])) {
										?>
										<script>
											if (confirm("Acara berhasil ditambah")) {
												window.location.href = localStorage.getItem("previousPage");
											}
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
						} else {
							?>
							<script>
								alert("Direktori turunan gagal ditambahkan");
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
					alert("Tanggal acara berakhir tidak valid");
				</script>
				<?php
			}
		} else {
			?>
			<script>
				alert("Link embed tidak valid");
			</script>
			<?php
		}
	} else {
		?>
		<script>
			alert("Link lokasi tidak valid");
		</script>
		<?php
	}
}
?>