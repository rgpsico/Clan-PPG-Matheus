  <?php
 function setHome(){
 echo BASE ;
 
 }
 
 
function setUrl($string){
$a = 'Ã€ÃÃ‚ÃƒÃ„Ã…Ã†Ã‡ÃˆÃ‰ÃŠÃ‹ÃŒÃÃŽÃÃÃ‘Ã’Ã“Ã”Ã•Ã–Ã˜Ã™ÃšÃ›ÃœÃ¼ÃÃžÃŸÃ Ã¡Ã¢Ã£Ã¤Ã¥Ã¦Ã§Ã¨Ã©ÃªÃ«Ã¬Ã­Ã®Ã¯Ã°Ã±Ã²Ã³Ã´ÃµÃ¶Ã¸Ã¹ÃºÃ»Ã½Ã½Ã¾Ã¿Rr"!@#$%&*()_-+={[}]/?;:.,\\\'<>Â°ÂºÂª';
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
echo 'Erro ao incluir'.$nomeArquivo.'php, arquivo ou caminho nÃ£o coferem';
}


}


/*
*******************************************
soma visitas
*******************************************
*/


function setViews($topicoId){
$topicoId = mysql_real_escape_string($topicoId);
$readArtigo = read('artigos',"WHERE id='$topicoId'");
foreach($readArtigo as $artigo);
$views = $artigo['visitas'];
$views = $views+1;
$dataViews = array('visitas'=>$views);
update('artigos',$dataViews,"id = '$topicoId'");
}



?>