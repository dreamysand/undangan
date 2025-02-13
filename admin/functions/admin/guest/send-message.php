<?php
require_once ('../vendor/autoload.php'); // if you use Composer
//require_once('ultramsg.class.php'); // if you download ultramsg.class.php

function SendMessage($to, $ultramsg_token = "gyf2hpa0eonzchsr", $instance_id = "instance107033")
{
	$client = new UltraMsg\WhatsAppApi($ultramsg_token,$instance_id);

	$body="✨ Undangan Job Fair 2025! ✨  

Halo, para pencari kerja dan profesional muda!  
Jangan lewatkan kesempatan emas untuk menemukan karier impian Anda di *Job Fair 2025*!  

📅 *Tanggal:* 29-30 April 2025  
📍 *Lokasi:* SMKN 71 Jakarta  

Temui berbagai perusahaan terkemuka dan raih peluang karier terbaik!  
👉 Klik link di bawah ini untuk informasi lebih detail:  
ultramsg.com 

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
	$no_tel = strval($_GET['nomor_telepon']);
	$send_message_status = SendMessage($no_tel);

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