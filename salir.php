<?php
session_start();
setcookie('userEmail',null,0);
session_destroy();
header('location:index.php');
 ?>
