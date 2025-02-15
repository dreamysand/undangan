<?php
$table = 't_galeri'; 
$id_Acara = $acara['f_id'];
$sql = "SELECT * FROM $table WHERE `f_id_acara` = :id_acara";
$stmt = $config->prepare($sql);
$stmt->execute([
    ':id_acara' =>$id_Acara
]);
if ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
    ?>
    <script>
        console.log("Galeri berhasil diambil");
    </script>
    <?php
} else {
    ?>
    <script>
        console.log("Galeri gagal diambil");
    </script>
    <?php
}
?>