<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acara']) && isset($_FILES['gambar'])) {
	$table = 't_invitations';
	$acara = $_POST['acara'];

	if ($_FILES['gambar']['error'] === 0) {
		$target_Dir = 'asset/invitations_image/';
		$target_File = $target_Dir. basename($_FILES['gambar']['name']);
		$img_Ext = strtolower(pathinfo($target_File, PATHINFO_EXTENSION));
		$allowed_Ext = [
			'jpg',
			'png',
			'jpeg',
			'gif',
			'jfif',
			'webp',
		];

		if (in_array($img_Ext, $allowed_Ext)) {
			if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_File)) {
				$gambar = $target_File;
			} else {
				echo "Gagal diupload";
			}
		} else {
			echo "File tidak didukung";
		}
	}
	

} else {
	// code...
}

?>