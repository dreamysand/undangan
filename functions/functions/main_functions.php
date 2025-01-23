<?php
// Upload File
function UploadIMG($file)
{
	if (isset($file)) {
		if ($file['error'] == 0) {
			$allowed_Ext = [
				'jpg',
				'png',
				'jpeg',
				'gif',
				'jfif',
				'webp'
			];
			$target_Dir = 'asset/invitations_image';
			$target_File = $target_Dir . $file['name'];
			$img_Ext_Info = new SplFileInfo($file['name']);
			$img_Ext = $img_Ext_Info->getExtension();

			if (in_array($img_Ext, $allowed_Ext)) {
				if (move_uploaded_file($file['tmp_name'], $target_File)) {
					$img_Path = $target_File;
					return $img_Path;
				} else {
					?>
					<script>
						console.log('Gambar gagal diupload');
					</script>
					<?php
					return null;
				}
			} else {
				?>
				<script>
					console.log('Ekstensi tidak didukung');
				</script>
				<?php
				return null;
			}
		}
	}
}

function SQLConnectPDO($dsn, $db, $usrname, $pass)
{
	if ($config = new PDO('mysql:host='.$dsn.';dbname='.$db, $usrname, $pass)) {
		?>
		<script>
			console.log('Koneksi Berhasil');
		</script>
		<?php
		return $config;
	} else {
		?>
		<script>
			console.log('Koneksi Gagal');
		</script>
		<?php
		return null;
	}
	
}
?>