<?php
$con  = mysql_connect('localhost', 'root', '') or die('erro ao conectar'.mysql_error());
$dbsa = mysql_select_db('passeio') or die ('erro ao selecionar'.mysql_error());


function create($tabela, array $datas){
//Primeiro pega os campos
$fields = implode(", ",array_keys($datas));

//segundo pega os valores
$values = "'".implode("','",array_values($datas))."'";

//terceiro inserir no banco com sql
$qrCreate ="INSERT INTO {$tabela} ($fields) values ($values)";

//quanrto execulta  a query
$stCreate = mysql_query($qrCreate) or die ('erro ao 
cadastra em' .$tabela.' '.mysql_error());



}


$con  = mysql_connect('localhost', 'root', '') or die('erro ao conectar'.mysql_error());
$dbsa = mysql_select_db('passeio') or die ('erro ao selecionar'.mysql_error());

function read($tabela , $cond = NULL){
/*
Primeiro sql  $qrRead = "select * from {$tabela}";
segundo execulta a query com 'mysql_query';
terceiro conta o nuemro de camopo com mysql-NUM _FIELDS 


*/


$qrRead = "select * from {$tabela} {$cond}";
$stRead = mysql_query($qrRead);
$cField = mysql_num_fields($stRead);

for($y =0; $y < $cField; $y++){
$names[$y] = mysql_field_name($stRead,$y);
}
for($x = 0; $res = mysql_fetch_assoc($stRead); $x++){
    for($i= 0 ; $i < $cField; $i++){
 $resultado[$x][$names[$i]] = $res[$names[$i]];
}



}

return $resultado;


}





?>