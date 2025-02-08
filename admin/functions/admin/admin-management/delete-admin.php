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
            if (confirm("Admin berhasil dihapus")) {
                window.location.href = localStorage.getItem("previousPage");
            }
        </script>
        <?php
    } else {
        ?>
        <script>
            if (confirm("Admin gagal dihapus")) {
                window.location.href = localStorage.getItem("previousPage");
            }
        </script>
        <?php
    }
}
?>