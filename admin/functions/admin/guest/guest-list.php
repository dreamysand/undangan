<?php
if (isset($_GET['id_event'])) {
    $id_Event = $_GET['id_event'];
    $table_guest = 't_invitations_data';
    $table_event = 't_invitations'; 
    $sql = "SELECT guest.*, event.f_file_path 
            FROM $table_guest guest
            INNER JOIN $table_event event ON guest.f_acara_id = event.f_id
            WHERE guest.f_acara_id = :id_event";
    $stmt = $config->prepare($sql);
    $stmt->execute([
        ':id_event' => $id_Event
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