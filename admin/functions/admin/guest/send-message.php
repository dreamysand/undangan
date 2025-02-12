<?php
require_once ('../vendor/autoload.php'); // if you use Composer
//require_once('ultramsg.class.php'); // if you download ultramsg.class.php

function SendMessage($to, $ultramsg_token = "gyf2hpa0eonzchsr", $instance_id = "instance107033")
{
	$client = new UltraMsg\WhatsAppApi($ultramsg_token,$instance_id);

	$body="Hello world";

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
				// window.location.href = localStorage.getItem("previousPage");
			}
		</script>
		<?php
	} else {
		?>
		<script>
			if (confirm("Undangan gagal dikirim")) {
				// window.location.href = localStorage.getItem("previousPage");
			}
		</script>
		<?php
	}
}
?>