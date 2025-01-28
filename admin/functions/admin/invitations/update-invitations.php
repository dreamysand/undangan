<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acara']) && isset($_POST['imageOld']) && isset($_POST['filePath']) && isset($_POST['lokasi']) && isset($_POST['tanggal'])) {
    $table = 't_invitations';
    $acara = $_POST['acara'];
	$file_Path_Old = $_POST['filePath'];
	$imageOld = $_POST['imageOld'];
	$tanggal = $_POST['tanggal'];
	$lokasi = $_POST['lokasi'];

	$location_Link_Verified = "https://maps.app.goo.gl/";
	if (stripos($lokasi, $location_Link_Verified) !== false) {
        if (file_exists($file_Path_Old)) {
            $acara_Parent_Path = '../'.strtolower(str_replace(" ", "-",$acara)); 
            if (rename($file_Path_Old, $acara_Parent_Path)) {
                if (isset($_FILES['gambar'])) {
                    $asset_Dir = 'asset';
                    $location_Img = $acara_Parent_Path.'/'.$asset_Dir.'/';
                    $image = UploadIMG($_FILES['gambar'], $location_Img);
                    if ($image != null) {
                        if (file_exists($location_Img.$imageOld)) {
                            if (unlink($location_Img.$imageOld)) {
                                $sql = "UPDATE `t_invitations` SET `f_admin_id`=:admin_id,`f_acara`=:acara,`f_alamat`=:alamat,`f_tanggal_acara`=:tanggal,`f_image`=:img, `f_file_path`=:file_path WHERE `f_id`=:id_acara";
                                $stmt = $config->prepare($sql);
                                if ($stmt->execute([
                                    ':admin_id' => $_COOKIE['id'],
                                    ':acara' => $acara,
                                    ':alamat' => $lokasi,
                                    ':tanggal' => $tanggal,
                                    ':img' => $image,
                                    ':file_path' => $acara_Parent_Path,
                                    ':id_acara' => $_GET['id_acara']
                                ])) {
                                    ?>
                                    <script>
                                        alert("Acara berhasil ditambahkan");
                                        window.location.href = "";
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
                        $sql = "UPDATE `t_invitations` SET `f_admin_id`=:admin_id,`f_acara`=:acara,`f_alamat`=:alamat,`f_tanggal_acara`=:tanggal,`f_image`=:img, `f_file_path`=:file_path WHERE `f_id`=:id_acara";
                        $stmt = $config->prepare($sql); 
                        if ($stmt->execute([
                            ':admin_id' => $_COOKIE['id'],
                            ':acara' => $acara,
                            ':alamat' => $lokasi,
                            ':tanggal' => $tanggal,
                            ':img' => $location_Img.$imageOld,
                            ':file_path' => $acara_Parent_Path,
                            ':id_acara' => $_GET['id_acara']
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
                    }
                    
                } else {
                    ?>
                    <script>
                        alert("Gambar gagal diatur");
                        window.location.href = "undangan.php";
                    </script>
                    <?php
                }
            } else {
                ?>
                <script>
                    alert("Folder gagal diperbarui");
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("Folder tidak ditemukan");
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