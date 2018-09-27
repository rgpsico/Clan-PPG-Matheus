  <?php
 function setHome(){
 echo BASE ;
 
 }
 
 
function setUrl($string){
$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
$b = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr ';     
$string = utf8_decode($string);
$string = strtr($string, utf8_decode($a), $b);
$string = strip_tags(trim($string));
$string  = str_replace(" ","-",$string);
$string  = str_replace(array("-----","----","---","--"),"-",$string);
$string = strtolower(utf8_encode($string));
 }


/*
*******************************************
inclui arquivo
*******************************************
*/

function setArq($nomeArquivo){
if(file_exists($nomeArquivo.'.php')){
}else{
echo 'Erro ao incluir'.$nomeArquivo.'php, arquivo ou caminho não coferem';
}


}


/*
*******************************************
soma visitas
*******************************************
*/


function setViews($topicoId){
$topicoId = mysql_real_escape_string($topicoId);
$readArtigo = read('up_posts',"WHERE id='$topicoId'");
foreach($readArtigo as $artigo);
$views = $artigo['visitas'];
$views = $views+1;
$dataViews = array('visitas'=>$views);
update('up_posts',$dataViews,"id = '$topicoId'");
}



?>