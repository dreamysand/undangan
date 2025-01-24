<?php
if ($_GET['id_acara']) {
    $id_Acara = $_GET['id_acara'];
    $table = 't_invitations'; 
    $sql = "SELECT * FROM $table WHERE f_id = :id_acara";
    $stmt = $config->prepare($sql);
    $stmt->execute([
        ':id_acara' => $id_Acara
    ]);
    if ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
        echo 'Ada';
    } else {
        echo 'Tidak ada';
    }
}
?>