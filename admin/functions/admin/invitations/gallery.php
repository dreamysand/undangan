<?php
if (isset($_GET['id_acara'])) {
    $table_gallery = 't_galeri'; 
    $table_event = 't_invitations'; 
    $id_Acara = $_GET['id_acara'];
    $sql = "SELECT gallery.*, event.f_file_path 
            FROM $table_gallery gallery
            INNER JOIN $table_event event ON gallery.f_id_acara = event.f_id
            WHERE gallery.f_id_acara = :id_acara";
    $stmt = $config->prepare($sql);
    $stmt->execute([
        ':id_acara' =>$id_Acara
    ]);
    if ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
        ?>
        <script>
            console.log("Galeri berhasil diambil");
        </script>
        <?php
    } else {
        ?>
        <script>
            console.log("Galeri gagal diambil");
        </script>
        <?php
    }
}

?>