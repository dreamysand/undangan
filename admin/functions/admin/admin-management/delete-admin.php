<?php
if ($_GET['id_admin']) {
    $id_Admin = $_GET['id_admin'];
    $table = 't_admin'; 
    $sql = "DELETE FROM $table WHERE `f_id` = :id_admin";
    $stmt = $config->prepare($sql);
    if  ($stmt->execute([
        ':id_admin' => $id_Admin
    ])) {
        ?>
        <script>
            console.log("Admin berhasil dihapus");
        </script>
        <?php
    } else {
        ?>
        <script>
            console.log("Admin gagal dihapus");
        </script>
        <?php
    }
}
?>