<?php include('includes/header.php');?>
		<?php include('includes/menu.php');?>
		
			<div class="body news-single">
		<?php include("includes/news-single/side-news.php")?>
			<div id="artigos">
	
					
					<?php 
					
					             $id = $_GET['id'];
					 // visitas($id);
					            $bu = read('artigos',"where id='$id'");
								if(!$bu){
								echo'<span class="ms al">Desculpe Não Temos Nenhum Artigo No momento</span>';

								}else{
								foreach($bu as $read):
								
								$data = explode('-',$read['data']);
								$ano =  $data[0];								
								$diad =  $data[2];
								$mesp =  $data[1];
								
								
								$explode = explode(' ',$mesp);
								$mes = $explode[0];
								
								$explodedia = explode(' ',$diad);
								$dia = $explodedia[0];
								
							
								
								
								
								
								?>
					
					<div>					
						
						<h4><?php echo $read['categoria']?> || <span> <?php echo $dia ?> de <?php echo $mesExt[$mes] ; ?>	<?php echo $ano ;?>				
						
						</span> </h4>
						
						<h1><?php echo $read['titulo']?></h1>
						
						<!--<div id="loja-single">
						<ul class="loja">
						
						<li><img src="http://mlb-d1-p.mlstatic.com/15194-MLB20097308079_052014-Y.webp" height="150" width="158px">
						<div class="loja-nome">Camisa Ed Hardy Original - Preço De Custo<div class="loja-preco">R$ 95,<b class="00">00</b></div></div>
					
						
						
						
						</li>
				
						</ul>
						</div>loja-single-->
						<p><img src="<?php echo BASE?>/upload/artigos/<?php echo $read['foto'] ?> " height="200" width="200" hidden ></p>
						
						
						
						
						<?php echo $read['content']; ?>
						
						<br/>
						
						
						<div id="plugins">	
						<?php include('plugins/compartilha.php');?>
						<?php include('plugins/rede-social.php');?>
						
						
					</div>
					
					
					
					
					</div>
				

					<?php endforeach;} ?>
						
				
						<ul class="veja-tambem">
					<h4>Veja Também</h4>
					
					<?php 
				     $time = date('s'); 
					 
					 if($time  <= 10 ){
					 $bu = read('artigos',"where id!='$id' and public = 1 order by id desc  limit 3 ,9");
					 
					 }elseif($time <= 20){					 
					 $bu = read('artigos',"where id!='$id' and public = 1 order by id asc limit 6, 12");
					 
					 
					 }else{
					  
					  $bu = read('artigos',"where id!='$id' and public = 1 order by id desc  limit 1 ,9");
					 
					 }
					
					 $id = $_GET['id'];
					
					
					if(!$bu){
								echo'<span class="ms al">Desculpe Nį Temos Nenhum Artigo No momento</span>';

								}else{
								foreach($bu as $read){
								$titulo = $read['titulo'] ;
					
					?>
		<li><a href="news-single.php?id=<?php echo $read['id']?>" title="<?php echo $read['titulo']?>" rel="">
		<p><img src="upload/artigos/<?php echo $read['foto'] ?>" height="150" width="150" alt="<?php echo $read['titulo']?>" rel="" title="<?php echo $read['titulo']?>"></p>
		
		<span><?php echo limitar($titulo,40); ?> </span>	</a>		
	</li>
		
					<?php }}?>
	
			     
					 
					 </ul>	
					
					

<?php include('plugins/coment.php');?>





					<!--<div class="section">
						<h5>Comments</h5>
						<h4>Reader 1</h4>
						<span>Commented on 26th July 2023</span>
						<p>
							Please feel free to remove some 
							or all the text and links of this
							page and replace it with your own
							About content. Join the discussion 
							and meet other people in the community
							who share the same inetersts with you.
						</p>
					</div>


					<form action="index.php">
						<span>Add A Comment</span>
						<label for="name">
							<input type="text" id="name">
							Name</label>
						<label for="email">
							<input type="text" id="email">
							Email</label>
						<textarea name="message" id="message" cols="30" rows="10"></textarea>
						<input type="submit" value="Submit Comment">
					</form>--->
	
	
	
			       </div>
				   
				   </div>
				

				
			
			<?php include('includes/footer.php');?>