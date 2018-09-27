<?php

$id = $_GET['id'];
$gal = mysql_query("select foto  from galeria where id_pai = '$id' ");

while($ga = mysql_fetch_array($gal)){

echo'<pre>';

echo '<img src="upload/'.$ga['foto'].'" height="200" width="200">';

echo '</pre>';
}
?>

