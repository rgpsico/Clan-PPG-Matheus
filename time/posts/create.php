
<?php
if(isset($_POST['sendform'])){
$id      = $_POST['id'];

$foto            = $_FILES['foto'];
$tmp             = $_FILES['foto']['tmp_name'];
$pasta           = 'time/upload/perfil';
$nome            = $_FILES['foto']['name'];

$f['nome']       = $_POST['nome'];
$f['facebook']   = $_POST['facebook'];
$f['tagname']    = $_POST['tagname'];


// update($tabela, array $datas, $where)

print_r($f);

}




$perfil = $_GET['perfil'];
$query = mysql_query("select * from up_users where nome='$perfil'");
while($bus = mysql_fetch_array($query)):
$nome = $bus['nome'];	
						

 ?>
<div class="bloco form" style="display:block">
            	<div class="titulo">Editar Perfil:</div>


                <form name="formulario" action="" method="post" enctype="multipart/form-data">
                     
					                   

					<label class="line">
                    	<span class="data">nome</span>
                        <input type="text" name="nome" value="<?php echo $bus['nome'];?>" />
                    </label>				

					<label class="line">
                    	<span class="data">Tagname</span>
                        <input type="text" name="tagname" value="<?php  //$bus['facebook'];?>" />
                    </label>
					
					<label class="line">
                    	<span class="data">Facebook</span>
                        <input type="text" name="facebook" value="<?php  //$bus['facebook'];?>" />
                    </label>


                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="sendform" class="btn" />
<?php 
endwhile;
?>
                </form>

            </div><!-- /bloco form -->