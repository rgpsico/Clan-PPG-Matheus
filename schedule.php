<?php include('includes/header.php');?>
			<?php include('includes/menu.php');?>
			<div class="body schedule">
				<div>
					<span></span>
					<div>
						<div class="section">
							<span>Galeria</span>
							<div>
								<p>
								
								</p>
							</div>
						</div>
						<span></span>
						<ul>
						<?php 
						
						
						
  $gal = mysql_query("select *  from galeria where id_pai is null ");

  while($ga = mysql_fetch_array($gal)){
  
$ga['data'];
$ex = explode(' ',$ga['data']);
$tes = explode('-',$ex[0]);
$dia = $tes[2];
$mes = $tes[1];
$ano = $tes[0];

$tempo = explode(':',$ex[1]);

$hora    =  $tempo[0];
$minuto  =  $tempo[1];
$segundo =  $tempo[2];

$desc = ($ga['desc'] == '' ? 'isso ai' : $ga['desc'] );



?>
							<li>
								<span><a href="schedule-single.php?id=<?php echo $ga['id']?>">
								<img src="admin/upload/album/<?php echo $ga['foto']?>" height="150" width="200" alt="description"  /></a>
								</span>
								<div>
								
									<span><?php echo $ga['nome']?>
									</span> 
									<span>   <?php echo $dia  ?>  <?php echo $mesExt[$mes];  ?>  <?php echo $ano;  ?>    |    <?php echo $hora;  ?>    Horas   </span>
									
									<p>
									<?php echo $desc?>
										<?php //echo $ga['nome']?></
									</p>
								</div>
							</li>
							<?php }?>
						</ul>
					</div>
					
				</div>
				
			<?php include('plugins/like.php');?>
			
				
			</div>
			<?php include('includes/footer.php');?>