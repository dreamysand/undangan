<?php
if ($_GET['id_guest']) {
    $id_Guest = $_GET['id_guest'];
    $table = 't_invitations_data'; 
    $sql = "SELECT * FROM $table WHERE `f_id` = :id_guest";
    $stmt = $config->prepare($sql);
    $stmt->execute([
        ':id_guest' => $id_Guest
    ]);
    if ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
        ?>
        <script>
            console.log("Tamu berhasil diambil");
        </script>
        <?php
    } else {
        ?>
        <script>
            console.log("Tamu gagal diambil");
        </script>
        <?php
    }
}
?>