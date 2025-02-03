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
}
?>