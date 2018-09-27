<?php require('includes/header.php');?>
		<?php include('includes/menu.php');?>
			<div class="body home">
		
					<?php include('includes/side-bar.php');?>
					
					
					<!--conteudo-index-->
				<div id="page-home">
				
				<?php include('slider/slider.php');?>
			
				<div id="clear">
				</div>
				 <?php $categoria = read('up_cat');
								if(!$categoria){
								echo'<span class="ms al">Desculpe Não Temos Nenhum Artigo No momento</span>';

								}else{
								foreach($categoria as $cat){
								$titulo_cat = $cat['nome'];
								?>
			
			<h1 class="noticias-titulo"><?php  echo $titulo_cat ?></h1>
				<div id="noticias">
				<ul>
				 <?php $bu = read('artigos',"where categoria = '$titulo_cat' and  public = 1 order by  artigos ");
								if(!$bu){
								echo'<span class="ms al">Desculpe Não Temos Nenhum Artigo No momento</span>';

								}else{
								foreach($bu as $read){
								$titulo = $read['titulo'];
								?>
				<li>
				<a href="news-single.php?id=<?php echo $read['id']?>">
<img src="upload/artigos/<?php echo $read['foto'] ?> "  title="<?php echo $read['titulo'] ?>" alt="<?php echo $read['titulo'] ?>" height="160" width="190" id="image-noticias">
<span><?php echo $titulo  ?></span>				
		</a>		
</li>
				
				
				
				
			<?php }}?>
				

				</ul>
				
				</div>
				
				<?php }}?>
				
				</div>
				
				
				
			<?php include('includes/footer.php');?>