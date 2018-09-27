<?php if(!$_SESSION['autUser']){

header('location:../index.php');
}else{?>
<?php

if(isset($_POST['send'])){

date_default_timezone_set("Brazil/East");

 $permitido    =        array('image/jpg','image/jpeg','image/pjpeg');
  $f['nome']   =        mysql_real_escape_string($_POST['nome']); 
 $f['content'] =        mysql_real_escape_string($_POST['desc']); 
 
  $f['foto']      =    $_FILES['img'] ['name'];  
  $foto           =    $_FILES['img'] ['name'];   
  $tmp            =    $_FILES['img']['tmp_name'];
  $type           =    $_FILES['img']['type'];
  
 

 $pasta   = '../upload/galeria/' ;
 $pastat  = '../upload/galeria/thumb/';
 $f['data'] = date('Y-d-m H:i:s');
 
 if($f['nome'] == ''){
 echo'<span class="ms al">O galeria em que ter nome</span>';
 }elseif(!in_array($type,$permitido)){
  echo'<span class="ms al">Imagen invalida</span>';
 }else{
 
move_uploaded_file($tmp,$pasta.$foto);

create('galeria',$f);
echo'<span class="ms ok">galeria criado com sucesso</span>';




 

//$bus = mysql_query("insert into  galeria (nome , desc)VALUES('$nome','$desc')");
}
}
?>
			
			<div class="bloco form" style="display:block">
            	<div class="titulo">Criar Galeria:</div>
                
                <form name="formulario" action="" method="post" enctype="multipart/form-data" multiple />
                         <label class="line">
                    	<span class="data">Nome da Galeria:</span>
                        <input type="name" name="nome" value=""  />
                    </label>
                  


				  <label class="line">
                    	<span class="data">Nome da Galeria:</span>
                        <input type="file" name="img" value=""  />
                    </label>

                    
                    <label class="line">
                    	<span class="data">Descrição:</span>
                        <textarea name="desc" class="editor" rows="10"></textarea>
                    </label>
                    
                 
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form
			<?php
		}
		
			 ?>