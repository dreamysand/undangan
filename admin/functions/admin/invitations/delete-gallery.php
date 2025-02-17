<?php
if (isset($_GET['id_image'])) {
	$id_image = $_GET['id_image'];
	$table = 't_galeri';

	$sql = "SELECT * FROM $table WHERE f_id = :id_image";
    $stmt = $config->prepare($sql);
    $stmt->execute([
        ':id_image' => $id_image
    ]);
    if ($image = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <script>
            console.log("Gambar berhasil diambil");
        </script>
        <?php
    } else {
        ?>
        <script>
            console.log("Gambar gagal diambil");
        </script>
        <?php
    }
    $stmt = null;
    $img_path = $image['f_image'];
    if (file_exists($img_path)) {
    	if (unlink($img_path)) {
    		$sql = "DELETE FROM $table WHERE f_id = :id_image";
            $stmt = $config->prepare($sql);
            if ($stmt->execute([
                ':id_image' => $id_image
            ])) {
                ?>
                <script>
                    alert("Gambar berhasil dihapus");
                    window.location.href = localStorage.getItem("previousPage");
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("Gambar gagal dihapus");
                    window.location.href = localStorage.getItem("previousPage");
                </script>
                <?php
            }
    	} else {

    	}
    } else {

    }
}
?>