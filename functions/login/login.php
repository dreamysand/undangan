<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$table = 't_admin';

	$check_Email = CheckEmail($email);

	if ($check_Email > 0)  {
        $account = SelectAccount($email);
        $password_DB = $account['f_password'];
        $level = "Admin";
        $username = $account['f_username'];

        if (password_verify($password, $password_DB)) {
            
            $expiryTime = (isset($_POST['remember'])) ? time() + (86400 * 30) : time() + 600 ;
            // Cookie hanya akan bertahan selama 10 menit jika remember me toggler tidak diaktifkan
            
            $sql = "UPDATE 
                    $table
                    SET
                    `f_status` = :status
                    WHERE
                    `f_email` = :email
                    ";

            $stmt = $config->prepare($sql); 
            if ($stmt->execute([
                'status' => "Aktif",
                'email' => $account['f_email'],
            ])) {
                CookieRememberMe($expiryTime, $username);
                CookieLevel($expiryTime, $level);
                CookieActiveTime($expiryTime);
                CookieIdUser($expiryTime, $account['f_id']);
                ?>
                <script>
                    alert("Selamat Datang <?php echo $level?> <?php echo $username ?>");
                    window.location.href = "index.php";
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("Gagal memperbarui status");
                </script>
                <?php
            }            
            
        } else {
            ?>
            <script>
                alert("Password salah");
            </script>
            <?php 
        }
	} else {
		?>
        <script>
            alert("Akun tidak ditemukan");
        </script>
        <?php 
	}
}
?>