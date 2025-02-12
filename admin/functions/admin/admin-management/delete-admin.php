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
        $status = $admin['f_status'];

        if ($status != 'Aktif') {
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
        } else {
            ?>
            <script>
                if (confirm("Admin sedang aktif")) {
                    window.location.href = localStorage.getItem("previousPage");
                }
            </script>
            <?php
        }
        
    } else {
        ?>
        <script>
            console.log("Admin berhasil diambil");
        </script>
        <?php
    }
}
?>