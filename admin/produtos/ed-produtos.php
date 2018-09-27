<?php if(!$_SESSION['autUser']){

header('location:../index.php');
}else{?>
<?php

require('dts/iniSis.php');


if(isset($_POST['send'])){


date_default_timezone_set("Brazil/East");
                                   $id      = $_POST['id'];
                                   $nome    = $_POST['nome'];
								   $link    = $_POST['link'];
								   $autor   = $_POST['autor'];
                                   $content = $_POST['content'];
								   $categoria = $_POST['categoria'];
                                   $data      = date('Y-m-d H:i:s');
                                   $cat     = htmlspecialchars($_POST['cat']);
                                   $pro        = $_POST['pro'] ;
                            
                       						
                                 $img    = $_FILES['img'];
                                 $tmp    =   $img['tmp_name'];
                                 $type   =  $img['type'];
                                 $pasta  = '../upload/produtos/';
								 $pastat = '../upload/produtos/thumb/';
                                 $nom    = $img['name'];
								 
								
								 
                    
$read = read ('produtos',"where id='$id'");
foreach($read as $re);
if($nom  == '' ? $nom = $re['foto'] : $nom = $img['name']);



$update = mysql_query("UPDATE produtos SET   nome ='$nome' , link='$link'  , foto='$nom'  where id='$id' ");
move_uploaded_file($tmp,$pasta.$nom);
upload($tmp ,$nom,400,$pastat);
if(!$update){

$msg ='Artigo não foi atualisado';
header('location:'.BASEP.$id.'&msg='.$msg);


}else{

$msg = 'atualisado com Sucesso ';
header('location:'.BASEP.$id.'&msg='.$msg);


}
}





?>

<div class="bloco form" style="display:block">
            	<div class="titulo">Editar Artigo:</div>
				
				
                <?php 
				
				$id = $_GET['id'];
				
			
				$busca = read('produtos',"where id=$id ");
                          if($busca){
                         foreach($busca as $bus):
                      
                                 ?>	
                <form name="formulario" action="" method="post" enctype="multipart/form-data">
				<?php if(isset($_GET['msg'])){
				
				echo'<span class="ms ok">'.$_GET['msg'].'</span>';
				}
				?>
				<label class="line">
                    	<span class="data">Nome:</span>
                        <input type="text" name="nome" value="<?php echo $bus['nome']?>" />
                    </label>
					 <input type="hidden" readonly name="id" value="<?php echo $bus['id']?>" />
					 <label class="line">
                    	<span class="data">Link:</span>
                        <input type="text" name="link" value="<?php echo $bus['link']?>" />
                    </label>
                   
					<label class="line">
                    	<span class="data">Arquivo:</span>
				
						<img src="../upload/produtos/<?php echo $bus['foto']; ?>" height="150" width="150">
						      
                        <input type="file" class="fileinput" name="img" value="../upload/produtos/<?php echo $bus['foto']; ?>" size="60" style="cursor:pointer; background:#FFF;" />
                    </label>
					<?php
					
                     endforeach;
}			   ?>
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="send" class="btn" />
                 
                </form>
                	
            </div><!-- /bloco form -->
			
			  <?php
		}
		
			 ?>