<?php include('includes/header.php');?>
		<?php include('includes/menu.php');?>
			<div class="body videos">
				<div>
					
					
					
					<div id="video_lista">
					
					
						<ul>
						<?php 
						
						   $perfil  = (empty($_GET['perfil']) ? '1' : $_GET['perfil']);
						   $pag  = (empty($_GET['pag']) ? '1' : $_GET['pag']);
					       $maximo  = 5 ;
				           $inicio  = ($pag * $maximo) - $maximo;
					
					             $bu = read('videos',"where autor='$perfil'","  LIMIT  $inicio , $maximo");
								if(!$bu){
								echo'<span class="ms al">Desculpe Não Temos Nenhum video No momento</span>';

								}else{
								foreach($bu as $read):
								
?>       
                                                              
							<li>
							
							
								<a href="videos-single.php?id=<?php echo $read['id']?>" > 
								<iframe width="200" height="200" src="<?php echo $read['nome_video']?>" frameborder="0" allowfullscreen></iframe>
								
								
							</li>
						
							...</a>
							
							<?php

 endforeach;} ?>
							
							
							
							
							
						</ul>
							
				</div>
				
					</div>
					
					
					
			<?php include('includes/side-bar.php');?>
			<?php include('includes/footer.php');?>