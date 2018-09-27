<?php
@include('iniSis.php');
$conn = mysql_connect(HOST,USER,PASS) or die('erro ao conectar');
$dba = mysql_select_db(DBSA) or die('erro ao conectar');





function create($tabela, array $datas){
// campos
$fields = implode(', ',array_keys($datas));

$values ="' ".implode("', '",array_values($datas))."'";

$qrCreate ="INSERT INTO {$tabela} ($fields) Values ($values)";
print_r($qrCreate);
$stCreate = mysql_query($qrCreate) or die('erro ao cadas');


}


$datas = array(
"titulo"=> "meu Titulo",
"content"=> "conteudo do artigo",
"data"=>    date('Y-m-d')

);


create('up_posts',$datas);
?>