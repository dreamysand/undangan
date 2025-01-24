<?php
if (isset($_COOKIE['level']) && $_COOKIE['level'] == 'Admin') {
    include 'admin/views/index.php'; 
} else {
    echo 'Hai cuk';
}
?>