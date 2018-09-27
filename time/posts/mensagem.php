


<div class="bloco form" style="display:block">
            	<div class="titulo">Mensagem:</div>
				<div id="mensagem">
				
				<ul>
				
<?php

$perfil = $_GET['perfil'];
$email =   $_GET['email'];
$query = mysql_query("select * from mensagem where para='$email' order by id desc");

while($bus = mysql_fetch_array($query)):
$nome = $bus['nome'];						

 ?>
				<li><b>Nome: </b><a href=""><?php echo $bus['de'];?></a></li>
				<li><b>Mensagem:</b> <?php echo $bus['mensagem'];?></li>
				<li><a href="posts/delete.php?del=<?php echo $bus['id']; ?>"><img src="ico/no.png" alt="excluir" title="Excluir" /></a></li>
				<hr/>
				 <?php 
endwhile;

?>
				
				</ul>
				
				</div>


               

                </form>

            </div><!-- /bloco form -->