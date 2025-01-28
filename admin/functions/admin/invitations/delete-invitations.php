<?php
if ($_GET['id_acara']) {
    $id_Acara = $_GET['id_acara'];
    $table = 't_invitations'; 
    $sql = "DELETE FROM $table WHERE f_id = :id_acara";
    $stmt = $config->prepare($sql);
    $stmt->execute([
        ':id_acara' => $id_Acara
    ]);
    if ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
        ?>
        <script>
            alert("Acara berhasil dihapus");
            window.location.href = "undangan.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Acara gagal dihapus");
            window.location.href = "undangan.php";
        </script>
        <?php
    }
}
?>