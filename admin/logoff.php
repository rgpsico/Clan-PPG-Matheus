<?php 
ob_start();
session_start();
unset($_SESSION['autUser']);
unset($_SESSION['user']);

unset($_SESSION  ['login']);
unset($_SESSION  ['email']);

ob_end_flush();
session_destroy();
header('location:index.php');

?>