<div id="side-news">
<h3>Publicidade</h3>
	<?php 
					$id = $_GET['id'];				
					
					$reas = read('produtos',"where id_pai='$id'");
					if(!$reas){
				
	     
					}else{				
					
					foreach($reas as $re){
					?>
<p><a href="<?php echo $re['link'] ?>">
  <img src="<?php echo BASE ?>/upload/produtos/<?php echo $re['foto'] ?>" border="0" width="160" height="600" class="side-news-foto" /></a></p>
  <p><a href="<?php echo $re['link'] ?>">
<?php }}?>




<br/>
<br/>
<p>

<?php 
								
					
					$reas = read('produtos',"where id_pai != '$id' ");
					if(!$reas){
				
	     
					}else{				
					
					foreach($reas as $re){
					?>



<a href="">
<img src="<?php echo BASE?>/upload/produtos/<?php echo $re['foto']?>" height="" width="200" class="side-news-img-2" ></p></a>


<?php }}?>
</div>