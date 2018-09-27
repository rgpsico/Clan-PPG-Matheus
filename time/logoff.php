<?php 
ob_start();
session_start();
unset($_SESSION['autUser']);
$log = 1;
header('location:../index.php?loggof='.$log);
ob_end_flush();

?>