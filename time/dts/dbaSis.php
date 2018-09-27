<?php
@require('iniSis.php');
$con  = mysql_connect(HOST, USER , PASS) or die('erro ao conectar'.mysql_error());
$dbsa = mysql_select_db(DBSA) or die ('erro ao selecionar'.mysql_error());

/*******************************************
funчуo de cadastro no banco
*******************************************
*/
function create($tabela,array $datas){
$fields   = implode(", ",array_keys($datas));
$values   ="'".implode("', '",array_values($datas))." ' ";
$qrCreate = "INSERT INTO {$tabela} ($fields) Values ($values)";
$stCreate = mysql_query($qrCreate) or die('erro ao cadastra'.$tabela.''.mysql_error());
 
 if($stCreate){
 return true ;
 
 }
 
} 
 /*
*******************************************
upload de imagem
*******************************************
*/
function upload($tmp ,$nome,$largura,$pasta){
$img = imagecreatefromjpeg($tmp);
$x = imagesx($img);
$y = imagesx($img);
$altura = ($largura * $y)/$x;
$nova = imagecreatetruecolor($largura , $altura);
imagecopyresampled($nova, $img, 0 , 0, 0 , 0, $largura , $altura, $x, $y);
//imagedestroy($img);
imagejpeg($nova,"$pasta/$nome");

imagedestroy($nova);



}
 

/*
*******************************************
funчуo de seleчуo no banco
*******************************************
*/

function read ($tabela , $cond = NULL){
$qrRead = " SELECT * from {$tabela} {$cond}";
$stRead = mysql_query($qrRead) or die ('erro ao ler'.$tabela.' '.mysql_error());
$cField = mysql_num_fields($stRead);

for($y = 0; $y < $cField; $y++){

$names[$y] = mysql_field_name($stRead,$y);

}


for($x = 0; $res = mysql_fetch_assoc($stRead); $x++){
   for($i = 0; $i < $cField; $i++){
          
		  $resultado[$x][$names[$i]] = $res[$names[$i]];
}

}
return @$resultado;

}






/*
*******************************************
funчуo de ediчуo
*******************************************
*/

function update($tabela, array $datas, $where){

foreach($datas as $fields => $values){
       $campos[] = "$fields = '$values'";


}

$campos = implode(", ",$campos);
$qrUpdate = "UPDATE {$tabela} SET $campos WHERE {$where}";
$stUpdate = mysql_query($qrUpdate) or die ('Erro ao atualizar em '.$tabela.''.mysql_error());
if($stUpdate){
return true;
}

}


/*
*******************************************
funчуo delete
*******************************************
*/
function delete($tabela,$where){
$qrDelete = "DELETE FROM {$tabela} WHERE {$where}";
$stDelete = mysql_query($qrDelete) or die ('Erro ao deletar em '.$tabela.''.mysql_error());
if($stDelete){
return true;
}

}





?>