<?php
if (isset($_GET['id_guest'])) {
    $id_Guest = $_GET['id_guest'];
    $table_guest = 't_invitations_data';
    $table_event = 't_invitations';
    $sql = "SELECT guest.*, event.* 
            FROM $table_guest guest
            INNER JOIN $table_event event ON guest.f_acara_id = event.f_id
            WHERE guest.f_id = :id_guest";
    
    $stmt = $config->prepare($sql);
    $stmt->execute([':id_guest' => $id_Guest]);

    if ($guest = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <script>
            console.log("Data tamu dan acara berhasil diambil");
        </script>
        <?php
    } else {
        ?>
        <script>
            console.log("Data tidak ditemukan");
        </script>
        <?php
    }
}
?>
