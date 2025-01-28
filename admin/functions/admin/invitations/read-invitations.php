<?php
$table = 't_invitations'; 
$sql = "SELECT * FROM $table";
$stmt = $config->prepare($sql);
$stmt->execute();
if ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
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