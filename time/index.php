<?php
ob_start();
session_start();
require('../dts/dbaSis.php');
require('../dts/outSis.php');
require('../dts/getSis.php');

if(!empty($_SESSION['autUser'])){
header('location: index2.php');
}else{

	
	if(isset($_POST['sendLogin'])){
    $f['email']  = mysql_real_escape_string($_POST['email']);
	$f['senha']  = mysql_real_escape_string($_POST['senha']);
	$f['salva']  = mysql_real_escape_string($_POST['remember']);
	
	
	
	
	if(!$f['email'] || !valMail($f['email'])){
	echo'<pre class="ms al">Campo e-Email estÃ¡ vazio, ou email invalido</pre>';
	}
	elseif(strlen($f['senha']) < 3 || strlen($f['senha']) > 12){
	echo'<pre class="ms al">Senha tem que ter no minimo 3 caractere e no maximo 12 caractere</pre>';
	}	
	else{
	$autEmail = $f['email'];
	$autSenha = $f['senha'];	
	
	$readAutUser = read('up_users',"WHERE email ='$autEmail'");		
		if($readAutUser){
	foreach($readAutUser as $autUser);				
		if($autEmail == $autUser['email'] && $autSenha == $autUser['senha']){		
		   if($autUser['nivel'] == 1 || $autUser['nivel'] == 2){	
		  		  if($f['salva']){	
	        $cookiesalva = base64_encode($autEmail).'&'.base64_encode($f['senha']);
	          setcookie('autUser',$cookiesalva,time()+60*60*24*30,'/');
			  
	}else{
	setcookie('autUser','',time()+3600,'/');
	}
	
	$_SESSION['autUser'] = $autUser;
    header('Location:'.$_SERVER['PHP_SELF']);
		}else{
echo'<pre class="ms in">Seu nivel nÃ£o permite aceddo a essa
 area vo redireciona vc pa outro local</pre>';
header('Refresh: 5;url='.BASE.'/pagina/login');
}
	}else{
		echo'<span class="ms no">Senha informada  nÃ£o cofere</span>';
	}
	}else{
			echo'<span class="ms no">email informado não consta em nossos bancos</span>';
	
	
	}

	}
  
}elseif(!empty($_COOKIE['autUser'])){
	$cookie = $_COOKIE['autUser'];
	$cookie = explode('&',$cookie);
	$f['email'] = base64_decode($cookie[0]);
	$f['senha'] = base64_decode($cookie[1]);
	$f['salva']  = 1;

	
	}
	
	
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Painel Administrativo - Pró Notícias</title>

<meta name="title" content="Painel Administrativo - Pró Notícias" />
<meta name="description" content="Área restrita aos administradores do site PRÓ NOTÍCIAS" />
<meta name="keywords" content="Login, Recuperar Senha, Pró Notícias" />

<meta name="author" content="AUTOR DO SITE" />   
<meta name="url" content="URL DO SITE" />
   
<meta name="language" content="pt-br" /> 
<meta name="robots" content="NOINDEX,NOFOLLOW" /> 

<link rel="icon" type="image/png" href="ico/chave.png" />
<link rel="stylesheet" type="text/css" href="css/login.css" />
<link rel="stylesheet" type="text/css" href="css/geral.css" />

</head>

<body>

<div id="login">

	<img src="images/logo.png" alt="Pro Notícias - Área administrativa | Login" title="Pro Notícias - Área administrativa | Login" />

		
	<?php
	
	if(isset($_POST['sendLogin'])){
        $nome   = mysql_real_escape_string($_POST['nome']);
	    $senha  = mysql_real_escape_string($_POST['senha']);

	$sql = "select * from up_users where nome='$nome' and senha='$senha'";
           $res=  mysql_query($sql,$con);
                   if($co =  mysql_num_rows($res) == 1 ){
                  $bus = mysql_fetch_array($res);    
                  $nem = $_COOKIE = $nome ;
    
$_SESSION  ['user'] =   $bus['nome'];
$_SESSION  ['login']=   $bus['nome'];
$_SESSION  ['tempo']=   time();
    
	$msg="bem vindo ".$nome;
	
  header('location:index2.php?user='.$msg.'&galeria='.$nome);  
}else{
    $msg='<span class=error>erro ao logar</span>';
    header('location;index.php?msg=').$msg;
    
    
}
}
?>
	
		
    <form name="login" action="" method="post">
        	<label>
            	<span>E-mail:</span>
                <input type="text" class="radius" name="nome" value="">
            </label>
            <label>
            	<span>Senha:</span>
                <input type="password" class="radius" name="senha" value="">
            </label>
            <input type="submit" value="Logar-se" name="sendLogin" class="btn">
            
           
           
        </form>
</div><!-- //login -->

</body>
</html>