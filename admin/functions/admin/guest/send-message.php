<?php
require_once ('../vendor/autoload.php'); // if you use Composer
//require_once('ultramsg.class.php'); // if you download ultramsg.class.php

function SendMessage($to, $link, $unique_id, $ultramsg_token = "gyf2hpa0eonzchsr", $instance_id = "instance107033")
{
	$client = new UltraMsg\WhatsAppApi($ultramsg_token,$instance_id);

	$body="✨ Undangan Job Fair 2025! ✨  

Halo, para pencari kerja dan profesional muda!  
Jangan lewatkan kesempatan emas untuk menemukan karier impian Anda di *Job Fair 2025*!  

📅 *Tanggal:* 29-30 April 2025  
📍 *Lokasi:* SMKN 71 Jakarta  
📍 *Unique Code:* $unique_id  

Temui berbagai perusahaan terkemuka dan raih peluang karier terbaik!  
👉 Klik link di bawah ini untuk informasi lebih detail:  
$link

Siapkan CV terbaik Anda dan jangan sampai ketinggalan!  
Sampai jumpa di Job Fair 2025!  

✨🚀";

	if ($api=$client->sendChatMessage($to,$body)) {
		?>
		<script>
			console.log(<?= $to ?>)
		</script>
		<?php
		return $api;
	} else {
		return null;
	}
}
if (isset($_GET['nomor_telepon'])) {
	$table = 't_invitations_data';
	$no_tel = strval($_GET['nomor_telepon']);
	$sql = "SELECT *
	FROM $table
	WHERE
	`f_nomor_telepon` = :no_tel
	";
	$stmt = $config->prepare($sql);
	$stmt->execute([
		':no_tel' => $no_tel
	]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$acara_path = $_GET['file_path'];
	$kode_unik = $_GET['kode_unik'];
	$acara_path = str_replace("../", "", $acara_path);
	$link = "http://localhost/undangan/$acara_path";
	$send_message_status = SendMessage($no_tel, $link, $kode_unik);

	if ($send_message_status != null) {
		?>
		<script>
			if (confirm("Undangan berhasil dikirim")) {
				window.location.href = localStorage.getItem("previousPage");
			}
		</script>
		<?php
	} else {
		?>
		<script>
			if (confirm("Undangan gagal dikirim")) {
				window.location.href = localStorage.getItem("previousPage");
			}
		</script>
		<?php
	}
}
?>