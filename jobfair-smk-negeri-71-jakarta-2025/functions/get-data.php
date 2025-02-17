<?php
if (isset($_SESSION['unique_id'])) {
    $kode_unik = $_SESSION['unique_id'];
    $table_guest = 't_invitations_data'; 
    $sql = "SELECT * FROM $table_guest WHERE `f_kode_unik_tamu` = :kode_unik";
    $stmt = $config->prepare($sql);
    $stmt->execute([
        ':kode_unik'=>$kode_unik
    ]);
    if ($guest = $stmt->fetch(PDO::FETCH_ASSOC)) {
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

    $table_events = 't_invitations'; 
    $id_Acara = $guest['f_acara_id'];
    $sql = "SELECT * FROM $table_events WHERE `f_id` = :id_acara";
    $stmt = $config->prepare($sql);
    $stmt->execute([
        ':id_acara'=>$id_Acara
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
} else {
    $full_url = $_SERVER['REQUEST_URI'];
    $filepath = explode('/', trim($full_url, '/'));
    $filepath = '../'.$filepath[1];
    $table = 't_invitations'; 
    $sql = "SELECT * FROM $table WHERE f_file_path = :filepath";
    $stmt = $config->prepare($sql);
    $stmt->execute([
        ':filepath'=>$filepath
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