<?php
/*
*******************************************
GET HOME
*******************************************
*/
function limitar($string, $tamanho, $encode = 'UTF-8') {
    if( strlen($string) > $tamanho )
        $string = mb_substr($string, 0, $tamanho - 3, $encode);
    else
        $string = mb_substr($string, 0, $tamanho, $encode);
 
    return $string;
}

function data($data){
$dataAno = explode(' ',$data);
$data = $dataAno[0];
$hora = $dataAno[1];

$dataex = explode('-',$data);
$rever = array_reverse($dataex);

$dataCerta = $dataex[2].'/'.$dataex[1].'/'.$dataex[0];

print_r($dataCerta) ;

}





function getHome(){
$url = $_GET['url'];
$url = explode('/',$url);
$url[0] = ($url[0] == NULL ? 'index' : $url[0]);

if(file_exists('tpl/'.$url[0].'.php')){
   require_once ('tpl/'.$url[0].'.php');
}elseif(file_exists('tpl/'.$url[0].'/'.$url[1].'.php')){
       require_once('tpl/'.$url[0].'/'.$url[1].'.php');
}else{

require_once('tpl/404.php');
}

}


/*
*******************************************
GET THUMB
*******************************************
*/
function getThumb($img , $titulo , $alt ,$w,$h, $grupo=NULL,$dir=NULL, $link=NULL){

$grupo=($grupo != NULL ? "[$grupo]" : "");
$dir = ($dir !=NULL ? "$dir": "midias");
$varDir = explode('/',$_SERVER['PHP_SELF']);
$urlDir = (in_array('admin',$varDir)? '../' : '');

if(file_exists($urlDir.$dir.'/'.$img)){
if($link == ''){
echo'
<a href="'.BASE.'/'.$dir.'/'.$img.'" rel="shadowbox'.$grupo.'" title="'.$titulo.'">;
<img src="'.BASE.'/tim.php?src='.BASE.'/'.$dir.'/'.$img.'&w='.$w.'&h='.$h.'&zc=1&q=100   title="'.$titulo.'" alt="'.$alt.'">;

</a>';

}elseif($link=='#'){
echo '
<img src="'.BASE.'/tim.php?src='.BASE.'/'.$dir.'/'.$img.'&w='.$w.'&h='.$h.'&zc=1&q=100   title="'.$titulo.'" alt="'.$alt.'">';


}else{
echo'
<a href="'.$link.'" title="'.$titulo.'">;
<img src="'.BASE.'/tim.php?src='.BASE.'/'.$dir.'/'.$img.'&w='.$w.'&h='.$h.'&zc=1&q=100   title="'.$titulo.'" alt="'.$alt.'">;

</a>';

}

}else{

echo'
<img src="'.BASE.'/tim.php?src='.BASE.'/midias/defult.jpg&w='.$w.'&h='.$h.'&zc=1&q=100   title="'.$titulo.'" alt="'.$alt.'">;
';


}
}





/*
*******************************************
GET CAT
*******************************************
*/

function getCat($catId, $campo = NULL){
$categoria = mysql_real_escape_string($catId);
$readCategoria = read('up_cat',"WHERE id='$categoria'");



if($readCategoria){
if($campo){
foreach ($readCategoria as $cat){
return $cat[$campo];
}

}else{
return $readCategoria;
}
}else{

return'erro ao ler cat';

}
}

/*
*******************************************
GET autor
*******************************************
*/
function getAutor($autorId, $campo= NULL){

$autorId = mysql_real_escape_string($autorId);
$readAutor = read('up_users',"WHERE id='$autorId'");
if($readAutor){
foreach($readAutor as $autor);
if($autor['foto']):
$gravatar = 'http://www.gravatar.com/avatar/';
$gravatar .= md5(strtolower(trim($autor['email'])));
$gravatar .= '?d=mm&s=180';
$autor['foto'] = $gravatar;
endif;
if(!$campo){
return $autor;
}else{
return $autor[$campo];
}

}else{
echo'Erro ao ler autor';

}

}

























/*
*******************************************
GET user
*******************************************
*/


function getUser($user , $nivel =NULL){
if($nivel != null){
$readUser = read('up_users',"WHERE id= '$user'");
if($readUser){
foreach($readUser as $usuario);
if($usuario['nivel'] <= $nivel && $usuario['nivel'] != '0' && $usuario['nivel'] <= '4'){
return true;
}else{
return false;
}

}else{
return false;
}

}else{
return true;
}


}





?>