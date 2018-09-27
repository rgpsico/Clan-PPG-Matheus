<?php

if(isset($_POST['send'])){



 $permitido =  array('image/jpg','image/jpeg','image/pjpeg');

 $f['r_um']   =    $_FILES['img'] ['name'];  
 $foto           =    $_FILES['img'] ['name'];   
 $tmp            =    $_FILES['img']['tmp_name'];
 $type           =    $_FILES['img']['type'];
 $pasta          =    'upload/publi/';  

 

 
 if($f['r_um'] == ''){
 echo'<span class="ms al">O album em que ter nome</span>';
 }elseif(!in_array($type,$permitido)){
  echo'<span class="ms al">Imagen invalida</span>';
 }else{
 
 

//upload($tmp ,$foto,400,$pasta);

move_uploaded_file($tmp,$pasta.$foto);
create('publi_roda',$f);
echo'<span class="ms ok">Album criado com sucesso</span>';




 

//$bus = mysql_query("insert into  galeria (nome , desc)VALUES('$nome','$desc')");
}
}
?>
			
			<div class="bloco form" style="display:block">
            	<div class="titulo">Criar Anucio rodape:</div>
                
                <form name="formulario" action="" method="post" enctype="multipart/form-data" multiple />
                         <label class="line">
                    	<span class="data">Nome do Anucio:</span>
                        <input type="name" name="nome" value=""  />
                    </label>
                  


				  <label class="line">
                    	<span class="data"></span>
                        <input type="file" name="img" value=""  />
                    </label>

                    
                    <label class="line">
                    	<span class="data">Descrição:</span>
                        <textarea name="im" class="editor" rows="10"></textarea>
                    </label>
                    
                 
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form