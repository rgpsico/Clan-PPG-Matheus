<?php if(!$_SESSION['autUser']){

header('location:../index.php');
}else{?>
  <?php

  

				if(isset($_POST['sendform'])){
				date_default_timezone_set("Brazil/East");
				
                                   $permitido =  array('image/jpg','image/jpeg','image/pjpeg','');
                                   $titulo    = htmlspecialchars($_POST['titulo']);
								  // $url       = estring($titulo);
								  
								  
								   $pro        = $_POST['pro'] ;
                                   $content    = $_POST['content'];
                                   $tags       = $_POST['tags'];
								   
								   
                                   $categoria = htmlspecialchars($_POST['categoria']);
								   $autor     = 0;                                  
								   $data      = date('Y-m-d H:i:s');
								  
                                   $public   = 0 ;
								   $foto     = $_FILES['file']['name'];
								   $pasta    =  '../upload/artigos/';
								   $pastat   = '../upload/artigos/thumb/';
								   $type     = $_FILES['file']['type'];
								   $tmp      = $_FILES['file']['tmp_name'];
	                             
								
	
if(@$titulo == '')
{
echo'<span class="ms al">titulo é obrigatorio</span>';

}
elseif(@$content =='')
{
echo'<span class="ms al">Conteudo é obrigatório</span>';
}
elseif(!in_array($type , $permitido)){
echo'<span class="ms al">imagem não e valida </span>';
}
else{



 $nome = explode('.',$foto)	;
 $ext = array_reverse($nome);
 $nom = time('m-s').$titulo.'.'.$ext[0];
$data = strTotime(date('Y-d-m h:i:s'));
 
		print_r($data);						   
$bus = mysql_query("insert into  artigos (titulo ,url, content , categoria ,data , public , autor, foto,tags) VALUES ('$titulo', '$url' , '$content','$categoria','$data','$public' ,'$autor','$nom','$tags')");
if($bus){
move_uploaded_file($tmp,$pasta.$nom);
//upload($tmp ,$nom,300,$pastat);
echo'<span class="ms ok">Artigo Cadastrado com Sucesso</span>';
}else{
echo'<span class="ms al">Nenhum Artigo Cadastrado</span>';

}

 }
}
		

		?>
		
		

<div class="bloco form" style="display:block">
            	<div class="titulo">Criar Artigo:</div>
                
                <form name="formulario" action="" method="post" enctype="multipart/form-data">
                   
                  <label class="line">
                    	<span class="data">Produtos:</span>
                       
					   <select name="pro">
						
                        	<?php
							
							$produ = read('produtos');
							if(!$produ){
							}else{
							
							foreach($produ as $pro):
							?>
							<option value="<?php echo $re['nome'];?>"><?php echo $pro['nome'];?> &nbsp;&nbsp;</option>
							<?php endforeach; 
							
							}?>
							
                        </select>
                    </label>
					
					
					<label class="line">
                    	<span class="data">Titulo:</span>
                        <input type="text" name="titulo" value="" />
                    </label>

                    
                    <label class="line">
                    	<span class="data">Conteudo:</span>
                        <textarea name="content" class="editor" rows="10">
						</textarea>
                    </label>
                    
                    <label class="line">
                    	<span class="data">categoria:</span>
                       
					   <select name="categoria">
						
                        	<?php
							
							$res = read('up_cat');
							if(!$res){
							}else{
							
							foreach($res as $re):
							?>
							<option value="<?php echo $re['nome'];?>"><?php echo $re['nome'];?> &nbsp;&nbsp;</option>
							<?php endforeach; 
							
							}?>
							
                        </select>
                    </label>
					<label class="line">
                    	<span class="data">Tags:</span>
                        <input type="text" name="tags" value="" />
                    </label>
                    
                    <label class="line">
                    	<span class="data">Imagem:</span>
                        <input type="file" class="fileinput" name="file" size="60" style="cursor:pointer; background:#FFF;" />
                    </label>
                    
                                       
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="sendform" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
			  <?php
		}
		
			 ?>