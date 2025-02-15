<?php
session_start();
session_unset();
session_destroy();

// Redirect ke halaman login atau halaman utama
header("Location: ./"); 
exit();
?>
