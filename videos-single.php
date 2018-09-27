<?php include('includes/header.php');?>
		<?php include('includes/menu.php');?>
			<div class="body videos">
				<div>
					<span>Videos</span>
                                          
                                            <?php                                                                                                     
                                                      $id = $_GET['id'];
                                                      $bu = read('videos',"where id ='$id'");                                                   
                                                               
                              
                                                                if(!$bu){
								echo'<span class="ms al">Desculpe Não Temos Nenhum video No momento</span>';

								}else{
								foreach($bu as $read):
								?>                    
					<div>
						
                                                <iframe width="680" height="380" src="<?php echo $read['nome_video']?>" frameborder="0" allowfullscreen></iframe>
						<h3></h3>
						<p>	
						</p>
					</div>
					<?php endforeach;} ?>
					<div class="section">
					
						<span>Mais Videos</span>
						<ul>
						<?php $bu = read('videos',"order by id desc limit 3");
								if(!$bu){
								echo'<span class="ms al">Desculpe Não Temos Nenhum Artigo No momento</span>';

								}else{
								foreach($bu as $read):
								?>
							<li>
							
							
								<a href="videos-single.php?id=<?php echo $read['id']?>"> <iframe width="200" height="200" src="<?php echo $read['nome_video']?>" frameborder="0" allowfullscreen></iframe>
								<h4><?php echo $read['titulo']?></h4>
								<p>
									<?php echo lmWord($read['desc_video'],0,5);?>.
								</p>
							</li>
							
							</a>
							
							
							<?php endforeach;} ?>
							
							
							
							
							
						</ul>
							<?php include('plugins/coment.php');?>
						</div>
					
					</div>
					
			<?php include('includes/side-bar.php');?>
			<?php include('includes/footer.php');?>