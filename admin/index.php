<?php
ob_start();
session_start();
require('dts/dbaSis.php');
require('dts/outSis.php');
require('dts/getSis.php');

if(!empty($_SESSION['autUser'])){
header('location: index2.php');
}else{

}





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Painel Administrativo - Pró Notícias</title>

<meta name="title" content="" />
<meta name="description" content="" />
<meta name="keywords" content="" />

<meta name="author" content="" />   
<meta name="url" content="" />
   
<meta name="language" content="pt-br" /> 
<meta name="robots" content="NOINDEX,NOFOLLOW" /> 

<link rel="icon" type="image/png" href="ico/chave.png" />
<link rel="stylesheet" type="text/css" href="css/login.css" />
<link rel="stylesheet" type="text/css" href="css/geral.css" />

</head>

<body>

<div id="login">

	<?php
$config = read("config");

if(!$config){
echo'Erro ao conectar';
}else{
 foreach($config as $conf){?>
    	<img src="../upload/user/<?php echo $conf['logo']?>"  height="100" width="100"alt="Site Admin" title="Site Admin" />
        <?php }}?>

		
	<?php
	
	if(isset($_POST['sendLogin'])){
    $f['email']  = mysql_real_escape_string($_POST['email']);
	$f['senha']  = mysql_real_escape_string($_POST['senha']);
	
	
	
	
	
	if(!$f['email'] || !valMail($f['email'])){
	echo'<pre class="ms al">Campo e-Email está vazio, ou email invalido</pre>';
	}
	elseif(strlen($f['senha']) < 3 || strlen($f['senha']) > 12){
	echo'<pre class="ms al">Senha tem que ter no minimo 3 caractere e no maximo 12 caractere</pre>';
	}	
	else{
	$autEmail = $f['email'];
	$autSenha = md5($f['senha']);	
	
	$readAutUser = read('up_users',"WHERE email ='$autEmail'");		
		if($readAutUser){
	foreach($readAutUser as $autUser);				
		if($autEmail == $autUser['email'] && $autSenha == $autUser['senha']){		
		   if($autUser['nivel'] == 1 || $autUser['nivel'] == 2){	
		  		  if($f['salva']  = mysql_real_escape_string($_POST['remember'])){	
				  
	        $cookiesalva = base64_encode($autEmail).'&'.base64_encode($f['senha']);
	          setcookie('autUser',$cookiesalva,time()+60*60*24*30,'/');
			  
	}else{
	setcookie('autUser','',time()+3600,'/');
	}
	
	$_SESSION['autUser'] = $autUser;
    header('Location:'.$_SERVER['PHP_SELF']);
		}else{
echo'<pre class="ms in">Seu nivel não permite aceddo a essa
 area vo redireciona vc pa outro local</pre>';
header('Refresh: 5;url='.BASE.'/pagina/login');
}
	}else{
		echo'<span class="ms no">Senha informada  não cofere</span>';
	}
	}else{
			echo'<span class="ms no">email informado n�o consta em nossos bancos</span>';
	
	
	}

	}
  
}elseif(!empty($_COOKIE['autUser'])){
	$cookie = $_COOKIE['autUser'];
	$cookie = explode('&',$cookie);
	$f['email'] = base64_decode($cookie[0]);
	$f['senha'] = base64_decode($cookie[1]);
	$f['salva']  = 1;

	
	}
	
	
	
	
	
	 if(!isset($_GET['remember'])){?>
    	<form name="login" action="" method="post">
        	<label>
            	<span>E-mail:</span>
                <input type="text" class="radius" name="email" value=""  />
            </label>
            <label>
            	<span>Senha:</span>
                <input type="password" class="radius" name="senha"  value=""  />
            </label>
            <input type="submit" value="Logar-se" name="sendLogin" class="btn" />
            
            <div class="remember">
            	<input type="checkbox" name="salva" value="" /> 
				Lembrar meus dados de acesso!
				 <a href="index.php?remember=remember" class="link" title="Esqueci minha senha!">Esqueci minha Senha</a>
            </div>
           
        </form>
        <?php }else{
		
		if(isset($_POST['sendRecover'])){
		$recover = mysql_real_escape_string($_POST['email']);
		$readRec = read('',"WHERE email= '$recover'");
		if(!$readRec){
		echo'<span class="ms no">Email n�o confere</span>	';
		}else{
		foreach($readRec as $rec);
		if($rec['nivel']== 1 || $rec['nivel']==2){
		//$msg = '';
		//sendMail('Reenvio de senha',$msg,MailUser,SITEName,$rec['email'],$rec['nome']);
		}else{
		echo'<pre class="ms al">Seu nivel não permite aceddo a essa
 area vo redireciona vc pa outro local</pre>';
header('Refresh: 5;url='.BASE.'/pagina/login');
		
		}
		}
		}
		
		
		?>
		<span class="ms ok">seus dados foram enviao para seu email!</span>	
        <form name="recover" action="" method="post">
        	<span class="ms in">Informe seu e-mail para que possamos enviar seus dados de acesso!</span>
        	<label>
            	

               <span>E-mail:</span>
                <input type="text" class="radius" name="email" />
            </label>
            <input type="submit" value="Recuperar dados" name="sendRecover" class="btn" />
            
         
        </form>
   <?php } ?>
    
</div><!-- //login -->

</body>
<?php ob_end_flush(); ?>
</html>