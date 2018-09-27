<?php include('includes/header.php');?>
			<?php include('includes/menu.php');?>
			<div class="body team">
				<div>
				
					<div class="section">
						<span>Amigos</span>
						<br/>
						
						<ul>
					
 
 
						
						<?php
/*
SELECT * 
FROM up_users
INNER JOIN tab_upload ON img = up_users.nome
WHERE up_users.nome =  'fabiane'
LIMIT 0 , 30*/

						$bu = mysql_query("select * from up_users inner join tab_upload  on up_users.nome = tab_upload.nome");
								if(!$bu){
								echo'<span class="ms al">Ainda não temos membros</span>';

								}else{
								while($read = mysql_fetch_array($bu)){
								// se nao tiver foto entao sera foto padrão
								$foto = ($read['img']  ==  '' ?  'avatar.jpg'   : $read['img'] );
								$nome = ($read['nome'] ==  '' ?  'Soldado'      : $read['nome'] );
								
								
								?>
				<li>
								<a href="team-single.php?perfil=<?php echo $read['nome']?>
								&galeria=<?php echo $read['nome']?>&email=<?php echo $read['email']?>">
                                                                <img src="time/uploadfoto/upload/thumb/<?php echo $foto ;?>"  height="50" width="80"> 
                                                               <?php echo lmWord($nome,10);?> </a>
							</li>
							<?php }} ?>
							
							
							
							
						</ul>
					</div>
				</div>
				</div>
				
		<?php include('includes/footer.php');?>