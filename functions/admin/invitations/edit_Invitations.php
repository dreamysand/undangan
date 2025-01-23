<?php
if ($_GET['id_acara']) {
    $id_Acara = $_GET['id_acara'];
    $sql = 'SELECT * $table WHERE id = :id_acara';
    $stmt = $config->prepare($sql);
    $stmt->execute([
        ':id_acara' => $id_Acara
    ]);
    $result = $stmt->fetch();
}
?>