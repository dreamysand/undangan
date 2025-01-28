<?php
if (isset($_COOKIE['level']) && $_COOKIE['level'] == 'Admin') {
    header('Location: admin');
    exit();
} else {
    echo 'Hai cuk';
}
?>