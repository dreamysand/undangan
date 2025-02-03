<?php
$full_url = $_SERVER['REQUEST_URI'];
$base_path = "/undangan/";
$filepath = str_replace($base_path, "../", $full_url);
$filepath = rtrim($filepath, "/");
$table = 't_invitations'; 
$sql = "SELECT * FROM $table WHERE `f_file_path` = :filepath";
$stmt = $config->prepare($sql);
$stmt->execute([
	':filepath'=>$filepath
]);
if ($acara = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <script>
        console.log("Acara berhasil diambil");
    </script>
    <?php
} else {
    ?>
    <script>
        console.log("Acara gagal diambil");
    </script>
    <?php
}
?>