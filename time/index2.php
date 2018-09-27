<?php
 include('includes/headerpainel.php');
session_start();
if(!isset($_SESSION['user'])){
 header('location:../index.php');
}else{


}
 
      

?>

<body>

<div id="painel">
	<?php require_once('includes/header.php');?>
    
    <div id="content">

    <?php require_once('includes/navi.php');?>
		<div class="pg">
    	<?php
		if(empty($_GET['exe'])){
		require('posts/mensagem.php');
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
<div id="footer">Desenvolvido por <a href="http://studio.upinside.com.br" title="Sistema desenvolvido por Roger Neves">Roger Neves</a>
</div> <!-- //footer -->  
</div><!-- //painel -->



</body>
<?php require_once('../js/jscSis.php');?>


<?php ob_end_flush(); ?>
</html>