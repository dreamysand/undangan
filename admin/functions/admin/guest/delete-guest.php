<?php
if (isset($_GET['id_guest'])) {
    $id_guest = $_GET['id_guest'];
    $table_guest = 't_invitations_data';
    $table_event = 't_invitations';
    $sql = "SELECT guest.*, event.f_file_path 
            FROM $table_guest guest
            INNER JOIN $table_event event ON guest.f_acara_id = event.f_id
            WHERE guest.f_id = :id_guest";
    
    $stmt = $config->prepare($sql);
    $stmt->execute([':id_guest' => $id_guest]);

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
    $stmt = null;

    $QR_Location_File = $guest['f_kode_qr'];
    $event_path  = $guest['f_file_path'];
    if (file_exists($event_path.$QR_Location_File)) {
        if (unlink($event_path.$QR_Location_File)) {
            $sql = "DELETE FROM $table_guest WHERE f_id = :id_guest";
            $stmt = $config->prepare($sql);
            if ($stmt->execute([
                ':id_guest' => $id_guest
            ])) {  
                ?>
                <script>
                    if (confirm("Tamu berhasil dihapus")) {
                        window.location.href = localStorage.getItem("previousPage");
                    }
                </script>
                <?php
            } else {
                ?>
                <script>
                    if (confirm("Tamu gagal dihapus")) {
                        window.location.href = localStorage.getItem("previousPage");
                    }
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                if (confirm("QR tamu gagal dihapus")) {
                    window.location.href = localStorage.getItem("previousPage");
                }
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            if (confirm("File tidak ditemukan")) {
                window.location.href = localStorage.getItem("previousPage");
            }
        </script>
        <?php
    }
}
$stmt = null;
?>