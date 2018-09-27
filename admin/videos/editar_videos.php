<?php

require('dts/iniSis.php');


if(isset($_POST['send'])){


date_default_timezone_set("Brazil/East");
                                   $id      = $_POST['id'];
                                   $titulo  = $_POST['titulo'];
								   $autor   =  $_POST['autor'];
                                   $content = $_POST['content'];
								   $link    = $_POST['link'];
                                   $data = date('Y-m-d H:i:s');
                                  
                                  
                            
                       						
                                 $img  = $_FILES['img'];
                                 $tmp  =   $img['tmp_name'];
                                 $type =  $img['type'];
                                 $pasta  = '../upload/videos/';
								 $pastat = '../upload/videos/thumb/';
                                 $nom =   $img['name'];
								 
								
								 
                    
$read = read ('videos',"where id='$id'");
foreach($read as $re);
if($nom  == '' ? $nom = $re['foto'] : $nom = $img['name']);

//autor , titulo , desc, link_video ,desc_video , data, imagem
$update = mysql_query("UPDATE videos SET   titulo ='$titulo' , nome_video='$link', content='$content' ,autor='$autor', foto='$nom' , data='$data'  where id='$id' ");
move_uploaded_file($tmp,$pasta.$nom);
upload($tmp ,$nom,400,$pastat);
if(!$update){

$msg ='Artigo não foi atualisado';
header('location:'.BASEV.$id.'&msg='.$msg);


}else{

$msg = 'atualisado com Sucesso ';
header('location:'.BASEV.$id.'&msg='.$msg);


}
}





?>

<div class="bloco form" style="display:block">
            	<div class="titulo">Descrição video:</div>
				
				
                <?php 
				
				$id = $_GET['id'];
				
				
				$busca = read('videos',"where id=$id ");
                          if($busca){
                         foreach($busca as $bus):

                                 ?>	
                <form name="formulario" action="" method="post" enctype="multipart/form-data">
				<?php if(isset($_GET['msg'])){
				
				echo'<span class="ms ok">'.$_GET['msg'].'</span>';
				}
				?>
				<label class="line">
                    	<span class="data">Fonte:</span>
                        <input type="text" name="autor" value="<?php echo $bus['autor']?>" />
                    </label>
                    <label class="line">
					 <input type="hidden" readonly name="id" value="<?php echo $bus['id']?>" />
                    	<span class="data">Titulo:</span>
                        <input type="text" name="titulo" value="<?php echo $bus['titulo']?>" />
						
                    </label>
					
					 <label class="line">
					 <input type="hidden" readonly name="id" value="<?php echo $bus['id']?>" />
                    	<span class="data">Link- video:</span>
                        <input type="text" name="link" value="<?php echo $bus['nome_video']?>" />
						
                    </label>

                    
                    <label class="line">
                    	<span class="data">conteudo:</span>
                        <textarea name="content" class="editor"><?php echo $bus['content']?></textarea>
                    </label>
					
					

                    
                  
                   
                    
                    <label class="line">
                    	<span class="data">Imagem videos:</span>
				
				<iframe width="200" height="150" src="<?php echo $bus['nome_video']; ?>" frameborder="0" allowfullscreen></iframe>
                        
						<img src="../upload/videos/<?php echo $bus['foto']; ?>"    width="200" height="150">
						<input type="file" class="fileinput" name="img" value="" size="60" style="cursor:pointer; background:#FFF;" />
                    </label>
					<?php
					
                     endforeach;
}			   ?>
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="send" class="btn" />
                 
                </form>
                	
            </div><!-- /bloco form -->