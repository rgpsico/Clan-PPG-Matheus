<?php include('includes/header.php');?>
			<?php include('includes/menu.php');
				$cat  = $_GET['cat'];
			
			?>
			
			<div class="body news">
			
				<div>
				
					<ul>
						<h1 class="news-titulo"><?php echo $cat ?></h1>
					<?php 
				
					$pag  = (empty($_GET['pag']) ? '1' : $_GET['pag']);
					$maximo  = 5 ;
					$inicio  = ($pag * $maximo) - $maximo;
					
					$bu = read('artigos'," where public = 1 and categoria = '$cat' order by id desc "); 
					
					
					
							
							if(!$bu)
								{
								echo'<span class="ms al">Desculpe Não Temos Nenhum Artigo No momento</span>';
								}
								else
								{
								foreach($bu as $read):
								
								?>
					
						<li>
						                                                      <!--<img src="admin/upload/artigos/1378687264como mandar moabe.jpg" height="150" width="150">-->
							<a href="news-single.php?id=<?php echo $read['id']?>">
							
							<img src="upload/artigos/<?php echo $read['foto'] ?>"  alt="<?php echo $read['titulo'] ?>" title="<?php echo $read['titulo'] ?>"height="151px" width="200px"></a>
							<div>
								<h3 class="news-titulo"><?php echo $read['titulo']?></h3>
								</br>
								<span><?php echo data($read['data']); ?></span></span>
								<p>
								<?php echo lmword($read['content'],250)?>
								</p>
								<a href="news-single.php?id=<?php echo $read['id']?>"></a>
							</div>
						</li>
						              
               
				 		
						<?php endforeach;} ?>
						
					</ul>
					<div class="paginator">
						<?php /*
					     
					     $link = 'news.php?pag=';
			             readPaginator('artigos',"WHERE id" , $maximo, $link ,$pag);
						 */
					    ?>
					  </div><!-- /paginator -->
				</div>
				
				<?php include('includes/side-bar.php');?>
				
		<?php include('includes/footer.php');?>