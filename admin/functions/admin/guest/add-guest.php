<?php
include '../phpqrcode/qrlib.php';
if (isset($_POST['acara_id']) && 
	isset($_POST['nama']) && 
	isset($_POST['no_tel']) && 
	isset($_POST['email']) && 
	isset($_POST['alamat']) && 
	isset($_POST['instansi'])) {
	// Definisikan variabel dari input
	$acara_id = $_POST['acara_id'];
	$nama = $_POST['nama'];
	$no_tel = $_POST['no_tel'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$instansi = $_POST['instansi'];
	$kode_unik = uniqid();

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
		if (substr($no_tel, 0, 1) === '0') {
			?>
			<script>
				alert("Tolong gunakan nomor telepon internasional");
			</script>
			<?php
		} else {
			$QR_Location_Path = $events['f_file_path'].'/asset/'.$kode_unik.'.png';
	        echo "$QR_Location_Path, $acara_id, $nama, $no_tel, $email, $kode_unik, $alamat, $instansi";
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
			$sql = "INSERT 
					INTO $table 
					(`f_acara_id`, 
						`f_nama_tamu`, 
						`f_kode_unik_tamu`, 
						`f_nomor_telepon`, 
						`f_email_tamu`, 
						`f_alamat`, `f_instansi`, 
						`f_kode_qr`) 
					VALUES 
					(:acara_id,
						:nama,
						:kode_unik,
						:no_tel,
						:email,
						:alamat,
						:instansi,
						:kode_qr)";

			$stmt = $config->prepare($sql);
			if ($stmt->execute([
				':acara_id'=>$acara_id,
				':nama'=>$nama,
				':kode_unik'=>$kode_unik,
				':no_tel'=>$no_tel,
				':email'=>$email,
				':alamat'=>$alamat,
				':instansi'=>$instansi,
				':kode_qr'=>$QR_Location_Path
			])) {
				?>
				<script>
					if (confirm("Tamu berhasil ditambah")) {
						window.location.href = localStorage.getItem("previousPage");
					}
				</script>
				<?php
			} else {
				?>
				<script>
					alert("Tamu gagal ditambah");
				</script>
				<?php
			}  
		}
	} else {
		?>
		<script>
			alert("Link alamat tidak valid");
		</script>
		<?php
	}
}
?>