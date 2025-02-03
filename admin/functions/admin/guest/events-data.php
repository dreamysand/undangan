<?php
$table = 't_invitations'; 
$sql = "SELECT * FROM $table";
$stmt = $config->prepare($sql);
$stmt->execute();
if ($events_Data = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
    ?>
    <script>
        console.log("Events berhasil diambil");
    </script>
    <?php
} else {
    ?>
    <script>
        console.log("Events gagal diambil");
    </script>
    <?php
}
?>