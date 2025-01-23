<?php
include 'functions/functions/main_functions.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acara']) && isset($_FILES['gambar'])) {
	$table = 't_invitations';
	$acara = $_POST['acara'];

	$image = UploadIMG($_FILES['gambar']);

	if ($image != null) {
		// code...
	}
	

} else {
	// code...
}

?>