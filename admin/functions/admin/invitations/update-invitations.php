<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && 
    isset($_POST['acara']) && 
    isset($_POST['imageOld']) && 
    isset($_POST['filePath']) && 
    isset($_POST['lokasi']) && 
    isset($_POST['embed_lokasi']) && 
    isset($_POST['lokasi']) && 
    isset($_POST['tanggal_berakhir'])) {
    $table = 't_invitations';
    $acara = htmlspecialchars($_POST['acara']);
	$file_Path_Old = htmlspecialchars($_POST['filePath']);
	$imageOld = htmlspecialchars($_POST['imageOld']);
	$tanggal = htmlspecialchars($_POST['tanggal']);
	$lokasi = htmlspecialchars($_POST['lokasi']);
    $tanggal_berakhir = htmlspecialchars($_POST['tanggal_berakhir']);
    $embed_lokasi = htmlspecialchars($_POST['embed_lokasi']);

    $sql = "
    SELECT
    COUNT(*)
    FROM $table
    WHERE 
    `f_tanggal_acara` = :tanggal
    ";

    $stmt = $config->prepare($sql);
    $stmt->execute([
        ':tanggal' => $tanggal
    ]);
    $result = $stmt->fetchColumn();
    if ($result > 0) {
        ?>
        <script>
            alert("Tidak boleh ada acara di tanggal yang sama");
        </script>
        <?php
        exit();
    }
    $stmt = null;

    $sql = "
    SELECT
    COUNT(*)
    FROM $table
    WHERE 
    `f_acara` = :acara 
    ";
    $stmt = $config->prepare($sql);
    $stmt->execute([
        ':acara' => $acara
    ]);
    $result = $stmt->fetchColumn();
    if ($result > 0) {
        ?>
        <script>
            alert("Tidak boleh ada acara yang sama");
        </script>
        <?php
        exit();
    }
    $stmt = null;

	$location_Link_Verified = "https://maps.app.goo.gl/";
    $embed_Link_Verified = "https://www.google.com/maps/embed?pb=";
	if (stripos($lokasi, $location_Link_Verified) !== false) {
        if (stripos($embed_lokasi, $embed_Link_Verified) !== false) {
            if (strtotime($tanggal) <= strtotime($tanggal_berakhir)) {
                if (file_exists($file_Path_Old)) {
                    $acara_Parent_Path = '../'.strtolower(str_replace(" ", "-",$acara)); 
                    if (is_writable($file_Path_Old)) {
                        exec("sudo chown -R www-data:www-data " . escapeshellarg($file_Path_Old));
                        exec("sudo chmod -R 775 " . escapeshellarg($file_Path_Old));
                        if (rename($file_Path_Old, $acara_Parent_Path)) {
                            if (isset($_FILES['gambar'])) {
                                $asset_Dir = 'asset';
                                $location_Img = $acara_Parent_Path.'/'.$asset_Dir.'/';
                                $image = UploadIMG($_FILES['gambar'], $location_Img);
                                if ($image != null) {
                                    if (file_exists($location_Img.$imageOld)) {
                                        if (unlink($location_Img.$imageOld)) {
                                            $sql = "UPDATE 
                                                    `t_invitations` 
                                                    SET 
                                                    `f_admin_id`=:admin_id,
                                                    `f_acara`=:acara,
                                                    `f_alamat`=:alamat,
                                                    `f_tanggal_acara`=:tanggal,
                                                    `f_image`=:img, 
                                                    `f_file_path`=:file_path, 
                                                    `f_admin_id`=:id_admin 
                                                    WHERE 
                                                    `f_id`=:id_acara";
                                            $stmt = $config->prepare($sql);
                                            if ($stmt->execute([
                                                ':admin_id' => $_COOKIE['id'],
                                                ':acara' => $acara,
                                                ':alamat' => $lokasi,
                                                ':tanggal' => $tanggal,
                                                ':img' => $image,
                                                ':file_path' => $acara_Parent_Path,
                                                ':id_admin' => $_COOKIE['id'],
                                                ':id_acara' => $_GET['id_acara']
                                            ])) {
                                                ?>
                                                <script>
                                                    if (confirm("Acara berhasil diedit")) {
                                                        window.location.href = localStorage.getItem("previousPage");
                                                    }
                                                </script>
                                                <?php
                                            } else {
                                                ?>
                                                <script>
                                                    alert("Acara gagal diedit");
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
                                    $sql = "UPDATE 
                                            `t_invitations` 
                                            SET 
                                            `f_admin_id`=:admin_id,
                                            `f_acara`=:acara,
                                            `f_alamat`=:alamat,
                                            `f_tanggal_acara`=:tanggal,
                                            `f_image`=:img, 
                                            `f_file_path`=:file_path, 
                                            `f_admin_id`=:id_admin 
                                            WHERE 
                                            `f_id`=:id_acara";
                                    $stmt = $config->prepare($sql); 
                                    if ($stmt->execute([
                                        ':admin_id' => $_COOKIE['id'],
                                        ':acara' => $acara,
                                        ':alamat' => $lokasi,
                                        ':tanggal' => $tanggal,
                                        ':img' => $location_Img.$imageOld,
                                        ':file_path' => $acara_Parent_Path,
                                        ':id_admin' => $_COOKIE['id'],
                                        ':id_acara' => $_GET['id_acara']
                                    ])) {
                                        ?>
                                        <script>
                                            if (confirm("Acara berhasil diedit")) {
                                                window.location.href = localStorage.getItem("previousPage");
                                            }
                                        </script>
                                        <?php
                                    } else {
                                        ?>
                                        <script>
                                            alert("Acara gagal diedit");
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
                            alert("Folder tidak bisa di rubah");
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
                    alert("Tanggal acara berakhir tidak valid");
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("Link embed tidak valid");
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