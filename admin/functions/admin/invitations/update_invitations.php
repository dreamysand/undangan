<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acara']) && isset($_POST['imageOld']) && isset($_POST['lokasi']) && isset($_POST['tanggal'])) {
    $table = 't_invitations';
	$acara = $_POST['acara'];
	$imageOld = $_POST['imageOld'];
	$tanggal = $_POST['tanggal'];
	$lokasi = $_POST['lokasi'];

	$location_Link_Verified = "https://maps.app.goo.gl/";
	if (stripos($lokasi, $location_Link_Verified) !== false) {
		if (isset($_FILES['gambar'])) {
            $asset_Dir = 'asset';
            $location_Img = $acara.'/'.$asset_Dir.'/';
            $image = UploadIMG($_FILES['gambar'], $location_Img);
            if ($image != null) {
                if (file_exists($imageOld)) {
                    if (unlink($imageOld)) {
                        $sql = "UPDATE `t_invitations` SET `f_admin_id`=:admin_id,`f_acara`=:acara,`f_alamat`=:alamat,`f_tanggal_acara`=:tanggal,`f_image`=:img";
                        $stmt = $config->prepare($sql);
                        if ($stmt->execute([
                            ':admin_id' => $_COOKIE['id'],
                            ':acara' => $acara,
                            ':alamat' => $lokasi,
                            ':tanggal' => $tanggal,
                            ':img' => $image
                        ])) {
                            ?>
                            <script>
                                alert("Acara berhasil ditambahkan");
                                window.location.href = "undangan.php";
                            </script>
                            <?php   
                        } else {
                            ?>
                            <script>
                                alert("Acara gagal ditambahkan");
                                window.location.href = "undangan.php";
                            </script>
                            <?php
                        }    
                    } else {
                        ?>
                        <script>
                            alert("Gagal menghapus gambar lama");
                        </script>
                        <?php
                    }
                } else {
                    ?>
                    <script>
                        alert("File yang dimaksud tidak ditemukan");
                    </script>
                    <?php
                }
            } else {
                ?>
                <script>
                    alert("Acara gagal ditambahkan");
                </script>
                <?php
            }
            
        } else {
            $sql = "UPDATE `t_invitations` SET `f_admin_id`=:admin_id,`f_acara`=:acara,`f_alamat`=:alamat,`f_tanggal_acara`=:tanggal,`f_image`=:img";
            $stmt = $config->prepare($sql);	
            $stmt->execute([
                ':admin_id' => $_COOKIE['id'],
                ':acara' => $acara,
                ':alamat' => $lokasi,
                ':tanggal' => $tanggal,
                ':img' => $imageOld
            ]);
            ?>
            <script>
                alert("Acara berhasil ditambahkan");
                window.location.href = "undangan.php";
            </script>
            <?php
        }						
    } else {
        ?>
        <script>
            alert("Link gagal diperbarui");
        </script>
        <?php
    }
}
?>