<?php
mysql_connect('localhost','root','');
mysql_select_db('pro_php');

$nome = $_GET['galeria'];
$galeria = mysql_query("select * from up_users where nome ='$nome' limit 1 ");				
while($gal = mysql_fetch_array($galeria)){

?>