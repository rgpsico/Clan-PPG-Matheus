<?php if(!$_SESSION['autUser']){

header('location:../index.php');
}else{?>
<?php

require('dts/iniSis.php');


if(isset($_POST['send'])){


date_default_timezone_set("Brazil/East");
                                   $id      = $_POST['id'];
                                   $titulo  = $_POST['titulo'];
								   $url  = setUrl($_POST['url']);
								   $autor   = $_POST['autor'];
                                   $content = $_POST['content'];
								   $categoria = $_POST['categoria'];
                                   $data      = date('Y-m-d H:i:s');
                                   $cat     = htmlspecialchars($_POST['cat']);
                                   $pro        = $_POST['pro'] ;
                            
                       						
                                 $img    = $_FILES['img'];
                                 $tmp    =   $img['tmp_name'];
                                 $type   =  $img['type'];
                                 $pasta  = '../upload/artigos/';
								 $pastat = '../upload/artigos/thumb/';
                                 $nom    = $img['name'];
								 
								
								 
                    
$read = read ('artigos',"where id='$id'");
foreach($read as $re);
if($nom  == '' ? $nom = $re['foto'] : $nom = $img['name']);



$update = mysql_query("UPDATE artigos SET   titulo ='$titulo' , url='$url' , content='$content' ,autor='$autor' , categoria='$categoria' , foto='$nom' , data='$data' , pro='$pro', tags='$tags'  where id='$id' ");
move_uploaded_file($tmp,$pasta.$nom);
upload($tmp ,$nom,400,$pastat);
if(!$update){

$msg ='Artigo não foi atualisado';
header('location:'.BASEA.$id.'&msg='.$msg);


}else{

$msg = 'atualisado com Sucesso ';
header('location:'.BASEA.$id.'&msg='.$msg);


}
}





?>

<div class="bloco form" style="display:block">
            	<div class="titulo">Editar Artigo:</div>
				
				
                <?php 
				
				$id = $_GET['id'];
				
				
				$busca = read('artigos',"where id=$id ");
                          if($busca){
                         foreach($busca as $bus):
                        $categoria =  $bus['categoria'];
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
                    	<span class="data">Fonte:</span>
                        <input type="text" name="autor" value="<?php echo $bus['pro']?>" />
                    </label>
                    <label class="line">
					 <input type="hidden" readonly name="id" value="<?php echo $bus['id']?>" />
                    	<span class="data">Titulo:</span>
                        <input type="text" name="titulo" value="<?php echo $bus['titulo']?>" />
						
                    </label>
					 <label class="line">
					
                    	<span class="data">url:</span>
                        <input type="text" name="url" value="<?php echo $bus['url']?>" />
						
                    </label>

                    
                    <label class="line">
                    	<span class="data">conteudo:</span>
                        <textarea name="content" class="editor"><?php echo $bus['content']?></textarea>
                    </label>
					
					

                    
                    <label class="line">
                    	<span class="data">Categoria:</span>
                      <select name="categoria">
					  <?php 
					  $buscar = read('up_cat',"where nome ='$categoria'");
					  if(!$buscar){
					  echo'<>';
					  }else{
					  foreach($buscar as $buss){  
					  
					  ?>
	
  <option value="<?php echo $buss['nome']?>"><?php echo $buss['nome']?></option>
  <?php }}?>
</select>
                    </label>
                    
                    <label class="line">
                    	<span class="data">Arquivo:</span>
				
						<img src="../upload/artigos/<?php echo $bus['foto']; ?>" height="150" width="150">
						      
                        <input type="file" class="fileinput" name="img" value="../upload/artigos/<?php echo $bus['foto']; ?>" size="60" style="cursor:pointer; background:#FFF;" />
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