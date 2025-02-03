<?php
function CountGuest($id_Acara)
{
    global $config;
    $table = 't_invitations_data'; 
    $sql = "SELECT COUNT(*) AS total_Guest FROM $table WHERE `f_acara_id` = :id_acara";
    $stmt = $config->prepare($sql);
    $stmt->execute([
        ':id_acara'=>$id_Acara
    ]);
    if ($total = $stmt->fetch(PDO::FETCH_ASSOC)) {
        return $total;
        ?>
        <script>
            console.log("Jumlah tamu berhasil diambil");
        </script>
        <?php
    } else {
        return null;
        ?>
        <script>
            console.log("Jumlah tamu gagal diambil");
        </script>
        <?php
    }
}
?>