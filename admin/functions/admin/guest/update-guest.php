<?php
include '../phpqrcode/qrlib.php';
if (isset($_POST['acara_id']) && 
	isset($_POST['nama']) && 
	isset($_POST['no_tel']) && 
	isset($_POST['email']) && 
	isset($_POST['alamat']) &&
	isset($_POST['kode_unik']) && 
	isset($_POST['kode_qr']) && 
	isset($_POST['instansi'])) {
	// Definisikan variabel dari input
	$acara_id = $_POST['acara_id'];
	$id_guest = $_GET['id_guest'];
	$nama = $_POST['nama'];
	$no_tel = $_POST['no_tel'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$kode_unik = $_POST['kode_unik'];
	$kode_qr = $_POST['kode_qr'];
	$instansi = $_POST['instansi'];

	$table = 't_invitations';
	$sql = "SELECT * FROM $table WHERE `f_id` = :id_acara";
	$stmt = $config->prepare($sql);
	// Get data acara
	if ($stmt->execute([
		':id_acara'=>$acara_id
	])) {
		$events = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($events) {
			?>
			<script>
				console.log("Data acara berhasil diambil");
			</script>
			<?php
		} else {
			?>
			<script>
				alert("Data acara gagal diambil");
			</script>
			<?php
		}
	} else {
		?>
		<script>
			alert("Pernyataan acara gagal dieksekusi");
		</script>
		<?php
	}
	$stmt = null;

	$location_Link_Verified = "https://maps.app.goo.gl/";
	if (stripos($alamat, $location_Link_Verified) !== false) {
		if (file_exists($kode_qr)) {
			if (unlink($kode_qr)) {
		        $QR_Location_Path = $events['f_file_path'].'/asset/'.$kode_unik.'.png';
		        $data_QR = "
					Id Acara : $acara_id\n
					Nama : $nama\n
					Nomor Telepon : $no_tel\n
					Email : $email\n
					Alamat : $alamat\n
					Instansi : $instansi\n
					Kode Unik : $kode_unik\n
					";
					
				QRcode::png($data_QR, $QR_Location_Path);
				$table = 't_invitations_data';
				$sql = "UPDATE $table 
						SET 
						    `f_acara_id` = :acara_id,
						    `f_nama_tamu` = :nama,
						    `f_nomor_telepon` = :no_tel,
						    `f_email_tamu` = :email,
						    `f_alamat` = :alamat,
						    `f_instansi` = :instansi,
						    `f_kode_qr` = :kode_qr
						WHERE `f_id` = :id_guest;";

				$stmt = $config->prepare($sql);
				if ($stmt->execute([
					':acara_id'=>$acara_id,
					':nama'=>$nama,
					':no_tel'=>$no_tel,
					':email'=>$email,
					':alamat'=>$alamat,
					':instansi'=>$instansi,
					':kode_qr'=>$QR_Location_Path,
					':id_guest'=>$id_guest
				])) {
					?>
					<script>
						if (confirm("Tamu berhasil diedit")) {
							window.location.href = localStorage.getItem("previousPage");
						}
					</script>
					<?php
				} else {
					?>
					<script>
						alert("Tamu gagal diedit");
					</script>
					<?php
				}  
			} else {
				?>
				<script>
					alert("QR gagal dihapus");
				</script>
				<?php
			}
		} else {
			?>
			<script>
				alert("Lokasi QR tidak ditemukan");
			</script>
			<?php
		}
	} else {
		?>
		<script>
			alert("Link alamat tidak valid");
		</script>
		<?php
	}
}
$stmt = null;
?>