<?php include('includes/header.php');
?>
		<?php include('includes/menu.php');?>
		<div id="mae-perfil">

    <div id="left-perfil"><!---leftperfil-->
<div id ="foto-perfil">
<?php 
 $perfil = $_GET['perfil'];
 
 $bu = mysql_query("select * from up_users inner join tab_upload where tab_upload.nome='$perfil'  limit 1");
 if(!$bu){
 echo '<span class="ms al">User em manuntençaõ </span>';
 }else{
 while($read = mysql_fetch_array($bu)){
  $foto = ($read['img'] == '' ?  'padrao.jpg'   : $read['img'] );
 ?>

<ul class="perfil">
 <img src="time/uploadfoto/upload/thumb/<?php echo $foto ;?>" height="120" width="143">
<li>Roger Neves</li>
<li>21 Anos </li>
<span id="foto-face">
<img src="http://newsroom.fb.com/display-media/4406/4" height="30" width="30">
<img src="http://mkgaming.com/wp-content/uploads/2011/08/xbox360logo.jpg" height="30" width="30">
</span>
<?php }} ?>
</ul>

<div id="album-perfil">

<ul>
Albuns
<?php 
 $galeria = $_GET['galeria'];
 $bu = mysql_query("select * from ppg_play where nome='$galeria' and id_pai is null   ");
 if(!$bu){
 echo'<span class="ms al">Ainda não temos membros</span>';
 }else{
 while($read = mysql_fetch_array($bu)){
 $foto =($read['foto'] == "" ? 'videos.jpg' :  $read['foto'] );
 ?>
 
 <a href="">
 <li><a href="fotosalbum.php?nome=<?php echo $read['nome']?>&id=<?php echo $read['id']?>" class="vlightbox1">
 <img src="time/upload/<?php echo $foto ?>" height="100" width="100"></a></li>
 

<?php }} ?>
</ul>





</div><!---album-perfil-->


<div id="video-perfil">

<ul>
Videos
<br/>
<?php 
 
 $bu = mysql_query("select * from videos where autor='$perfil'");
 if(!$bu){
 echo'<span class="ms al">Sem Videos</span>';
 }else{
 while($read = mysql_fetch_array($bu)){
$imagem =($read['imagem'] == "" ? 'videos.jpg' :  $read['imagem'] );
 
 ?>
 
 <li>
 <a href="videos_lista.php?perfil=<?php echo $read['autor']?>"><img src="time/upload/<?php echo $imagem?>" height="100" width="100"></li></a>
<?php }} ?>
</ul>





</div>




</div><!---fotoperfil-->
	
	
					
			
	 </div><!---leftperfil-->
	 	<div id="meio-perfil"><!---meio-perfil-->
<br/>
	<?php include('time/editor/index.html');?>
	<div id="mensagem-perfil">
	
	<ul>
	





</ul>




		
</div>
		
			
	 </div><!---meio-perfil-->
	 
	 <div id="right-perfil"><!--rightperfil-->
<ul>
<h1>Minha loja</h1>
<li><img src="http://img1.mlstatic.com/s_MLB_v_G_f_4136535363_042013.jpg" width="125" height="125">
<span id="nome-preco">Bolsa felipe</span>
<span id="valor-preco">29,00</span>
</li>

<li><img src="http://img1.mlstatic.com/s_MLB_v_G_f_4136535363_042013.jpg" width="125" height="125">
<span id="nome-preco">Bolsa felipe</span>
<span id="valor-preco">29,00</span>
</li>
<li><img src="http://img1.mlstatic.com/s_MLB_v_G_f_4136535363_042013.jpg" width="125" height="125">
<span id="nome-preco">Bolsa felipe</span>
<span id="valor-preco">29,00</span>
</li>
<li><img src="http://img1.mlstatic.com/s_MLB_v_G_f_4136535363_042013.jpg" width="125" height="125">
<span id="nome-preco">Bolsa felipe</span>
<span id="valor-preco">29,00</span>
</li>
</ul>
			
	 </div><!--rightperfil-->
							   

</div>	 












	 
</div>

				</div>
				  <div>
				</div>
				</div>
			<?php include('includes/footer.php');?>