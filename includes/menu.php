
	<div class="header">
	
				<a href="index.php" id="logo">
					<?php
					
$config = read('config');
foreach($config as $con){
?>
				<img src="upload/user/<?php echo $con['logo']?> " alt="<?php echo $con['logo']?>" title="<?php echo $con['logo']?>">    </a>
				<?php  }?>
				<ul>
				<li>
						<a href="index.php">home</a>
					</li>
					<?php
					
$read = read('up_cat');
foreach($read as $re){
?>
					<li>
						<a href="news.php?cat=<?php echo $re['nome']?>"><?php echo $re['nome']?></a>
						
					</li>
					<?php }?>
					
					
				</ul>
			</div>
			<?php  ?>
			