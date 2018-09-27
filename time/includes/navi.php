

                  
				  <ul class="nav">
				  <?php

mysql_connect('localhost','root','');
mysql_select_db('pro_php');

$nome = $_GET['perfil'];


$galeria = mysql_query("select * from tab_upload where nome='$nome' limit 1 ");				
while($gal = mysql_fetch_array($galeria)){

$foto = ($gal['img'] == '' ?  'avatar.jpg'   : $gal['img'] );

?>
				  
				  <a href="uploadfoto/index.php?id=<?php echo $gal['id'] ?>"><img src="../time/uploadfoto/upload/thumb/<?php echo $foto?>" height="150" width="150"></a>
				  <br/>
				  <li class="tt"><span>Mensagem</span>
            	<ul class="sub">     
<?php
}
mysql_connect('localhost','root','');
mysql_select_db('pro_php');


$galeria = mysql_query("select * from up_users where nome ='$nome' limit 1 ");				
while($gal = mysql_fetch_array($galeria)){
?>


				
                    <li><a href="index2.php?exe=posts/mensagem&perfil=<?php echo $gal['nome']?>&galeria=<?php echo $gal['nome']?>&email=<?php echo $gal['email']?>">Mensagem</a></li>
					<li><a href="index2.php?exe=videos/create_videos&perfil=<?php echo $gal['nome']?>&galeria=<?php echo $gal['nome']?>">Enviar videos</a></li>
					<li><a href="index2.php?exe=videos/listas_video&perfil=<?php echo $gal['nome']?>&galeria=<?php echo $gal['nome']?>">Editar videos</a></li>
                   <?php } ?>
                </ul>
            </li>
<?php
mysql_connect('localhost','root','');
mysql_select_db('pro_php');

$nome = $_GET['galeria'];
$galeria = mysql_query("select * from up_users where nome ='$nome' limit 1 ");				
while($gal = mysql_fetch_array($galeria)){
?>
        	<li class="tt"><span>Perfil</span>
            	<ul class="sub">                	
                    <li><a href="index2.php?exe=posts/create&perfil=<?php echo $gal['nome']?>&galeria=<?php echo $gal['nome']?>" title="Editar artigo">Editar Perfil</a></li>
                    
                </ul>
            </li>
           
		   <?php 
				             
}							 ?>		
		   <li class="tt"><span>Galeria de fotos</span>
           <ul class="sub">     

<?php
mysql_connect('localhost','root','');
mysql_select_db('pro_php');
$nome = $_GET['galeria'];
  $galeria = mysql_query("select * from up_users where nome ='$nome' limit 1 ");				
	while($gal = mysql_fetch_array($galeria)){
				  ?>		   
		   <li><a href="index2.php?exe=galeria/galcreate&galeria=<?php echo $gal['nome']?>&perfil=<?php echo $gal['nome']?>" title="Galeria">Criar Galeria</a></li>
		   <li><a href="index2.php?exe=galeria/gal_edit&galeria=<?php echo  $gal['nome']?>&perfil=<?php echo $gal['nome']?>" title="Galeria">Editar Galeria</a></li>
				<?php 
				             
}							 ?>		
                </ul>
				
				 
            </li>
			
			
			
           
          
        </ul><!-- /nav -->