<?php
$table = 't_admin'; 
$sql = "SELECT * FROM $table";
$stmt = $config->prepare($sql);
$stmt->execute();
if ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
    ?>
    <script>
        console.log("Admin berhasil diambil");
    </script>
    <?php
} else {
    ?>
    <script>
        console.log("Admin berhasil diambil");
    </script>
    <?php
}

?>