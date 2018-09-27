<?php
//5,31 res ad,om e edotp
ob_start();
session_start();
require('dts/dbaSis.php');
require('dts/getSis.php');
require('dts/setSis.php');
require('dts/outSis.php');

if(!$_SESSION['autUser']){
header('location:index.php');
}else{
$userId = $_SESSION['autUser']['id'];
$readAutUser = read('up_users'," WHERE id ='$userId'");
if($readAutUser){
foreach($readAutUser as $autUser);
if($autUser['nivel'] <'1' || $autUser['nivel'] > '2' ){
header('location:index2.php');

}
}else{
header('location:index2.php');
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
<link rel="stylesheet" type="text/css" href="css/painel.css" />
<link rel="stylesheet" type="text/css" href="css/geral.css" />
<script src="js/tiny_mce/tiny_mce.js"></script>





</head>
<body>

<div id="painel">
	<?php require_once('includes/header.php');?>
    
    <div id="content">

    <?php require_once('includes/navi.php');?>
		<div class="pg">
    	<?php
		if(empty($_GET['exe'])){
		require('home.php');
		}elseif(file_exists($_GET['exe'].'.php')){
		require($_GET['exe'].'.php');
		}else{
		echo'<div class="bloco"><span class="ms in">desculpe não tem essa pagina que vc procura</span></div>';
		}
		
		
		?>
      </div><!-- /pg -->
    <!-- conteudo aqui -->
    </div><!-- /content -->
    
<div style="clear:both"></div> 
<div id="footer">Desenvolvido por <a href="" title="Sistema desenvolvido por Roger Neves">Roger Neves</a>
</div> <!-- //footer -->  
</div><!-- //painel -->



</body>

<?php require_once('js/jscSis.php');?>
<?php require_once('js/jsc.php');?>

<?php ob_end_flush(); ?>
</html>