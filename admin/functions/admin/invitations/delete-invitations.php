<?php
if (isset($_GET['id_acara'])) {
    $id_Acara = $_GET['id_acara'];
    $table = 't_invitations'; 
    $sql = "SELECT * FROM $table WHERE f_id = :id_acara";
    $stmt = $config->prepare($sql);
    $stmt->execute([
        ':id_acara' => $id_Acara
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
    $file_path = $acara['f_file_path'];
    if (is_dir($file_path)) {
        $status_folder = DeleteFolder($file_path);
        if ($status_folder != false) {
            $sql = "DELETE FROM $table WHERE f_id = :id_acara";
            $stmt = $config->prepare($sql);
            if ($stmt->execute([
                ':id_acara' => $id_Acara
            ])) {
                ?>
                <script>
                    alert("Acara berhasil dihapus");
                    window.location.href = localStorage.getItem("previousPage");
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("Acara gagal dihapus");
                    window.location.href = localStorage.getItem("previousPage");
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("Folder gagal dihapus");
                window.location.href = localStorage.getItem("previousPage");
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("Folder tidak ditemukan");
            window.location.href = localStorage.getItem("previousPage");
        </script>
        <?php
    }
}
$stmt = null;
?>