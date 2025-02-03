<?php
session_start();

setcookie("remember_me", "", time()-3600, "/");
setcookie("level", "", time()-3600, "/");
setcookie("cookie_exp", "", time()-3600, "/");
setcookie("id", "", time()-3600, "/");

header("Location: ../");
exit();
?>