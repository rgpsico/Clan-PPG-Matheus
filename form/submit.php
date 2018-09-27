<?php


if(isset($_POST['enviar'])){
require('../dts/dbaSis.php');
require('../dts/outSis.php');
require('../dts/getSis.php');

$f['nome']    = mysql_real_escape_string($_POST['nome']);
$s['nome']    = mysql_real_escape_string($_POST['nome']);
$f['email']   = mysql_real_escape_string($_POST['email']);
$f['senha']   = md5(mysql_real_escape_string($_POST['senha']));
$senhau       = md5(mysql_real_escape_string($_POST['sen']));
//variavel de error caso seja 1 tudo certo se for 0 erro no final
$msg = 1;



if(strlen($f['nome']) < 5 ){
$msg = 0;
$error ='<span class="error"> nome deve conter mais de cinco caracteres</span>';

}

if($senhau != $f['senha'])
{
$msg = 0;
$error ='<span class="error">Erro senhas não coferem </span>';

}

if(!$f['email'] || !valMail($f['email']))
{
$msg = 0;
$error ='<pre class="ms al">Campo e-Email estÃ  vazio, ou email e invalido</pre>';
}
	
	
	
elseif(strlen($f['senha']) < 3 || strlen($f['senha']) > 12)
{
$error ='<pre class="ms al">Senha tem que ter no minimo 3 caractere e no maximo 12 caractere</pre>';

}	



if($msg == 0){
echo $error;

}else{
$create = create('up_users',$f);
$creat =  create('tab_upload',$s);
echo'cadastrado com sucesso';


}



}





//























?>