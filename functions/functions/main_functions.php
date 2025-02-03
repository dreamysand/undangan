<?php
// Upload File
function UploadIMG($file, $location)
{
	if (isset($file)) {
		if ($file['error'] == 0) {
			$allowed_Ext = [
				'jpg',
				'png',
				'jpeg',
				'gif',
				'jfif',
				'webp',
				'svg'
			];
			$target_Dir = $location;
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

function DeleteFolder($folderName)
{
	if (!is_dir($folderName)) {
		return false;
	}
	$files = array_diff(scandir($folderName), array(".",".."));

	foreach ($files as $file) {
		$path = $folderName. DIRECTORY_SEPARATOR. $file;
		if (is_dir($path)) {
			DeleteFolder($path);
		} else {
			unlink($path);
		}
	}

	return rmdir($folderName);
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

function CheckEmail($email)
{
	global $config, $table;
	$sql = "SELECT COUNT(*) FROM $table WHERE f_email=:email";
	$stmt = $config->prepare($sql);
	$stmt->bindParam(":email", $email);
	$stmt->execute();
	$result = $stmt->fetchColumn();
    $stmt = null;

    return $result;
}

function SelectAccount($email)
{
	global $config, $table;
	$stmt = $config->prepare("SELECT * FROM $table WHERE f_email=:email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function CookieRememberMe($expiryTime, $username)
{
    setcookie("remember_me", $username, $expiryTime, "/");
}

function CookieLevel($expiryTime, $level)
{
	setcookie("level", $level, $expiryTime, "/");
}

function CookieActiveTime($expiryTime)
{
    setcookie("cookie_exp", $expiryTime, $expiryTime, "/");
}

function CookieIdUser($expiryTime, $id)
{
    setcookie("id", $id, $expiryTime, "/");
}
?>