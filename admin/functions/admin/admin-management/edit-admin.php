<?php
if ($_GET['id_admin']) {
    $id_Admin = $_GET['id_admin'];
    $table = 't_admin'; 
    $sql = "SELECT * FROM $table WHERE `f_id` = :id_admin";
    $stmt = $config->prepare($sql);
    $stmt->execute([
        ':id_admin' => $id_Admin
    ]);
    if ($admin = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
}
?>