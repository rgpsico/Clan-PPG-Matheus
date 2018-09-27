

                        <div id="sidebar"><!---sidebar-->
<div class="sidetitulo">
Veja também
</div>
	<ul>
	<?php  $bu = read('artigos',"where public = 1 order by id desc limit 4");
	if(!$bu){
								echo'<span class="ms al">Desculpe Não Temos Nenhum Artigo No momento</span>';

								}else{
								foreach($bu as $read){
	$titulo = $read['titulo'];
	?>
	<a href="news-single.php?id=<?php echo $read['id']?>"><li><label id="sidebartexto"><?php echo limitar($titulo,30);?></label><img src="upload/artigos/<?php echo $read['foto'] ?>" height="60" width="60"></li>

	</a>
	
	<?php }} ?>
	</ul>				  
					
			
			
			
			
			
		                     
		




		</div>