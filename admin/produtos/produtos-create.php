<?php if(!$_SESSION['autUser']){

header('location:../index.php');
}else{?>
  <?php

  

				if(isset($_POST['sendform'])){
				date_default_timezone_set("Brazil/East");
				
                                   $permitido =  array('image/jpg','image/jpeg','image/pjpeg','');
                                
								  
								  
								   $titulo        = $_POST['nome'] ;
                                   $link    = $_POST['link'];
                                   
								   
								   
                                                                
								    $data      = date('Y-m-d H:i:s');
								  
                                   //$public   = 0 ;
								  $foto     = $_FILES['file']['name'];
								   $pasta    =  '../upload/artigos/';
								   $pastat   = '../upload/artigos/thumb/';
								   $type     = $_FILES['file']['type'];
								   $tmp      = $_FILES['file']['tmp_name'];
	                             
								
	
if(@$titulo == '')
{
echo'<span class="ms al">titulo é obrigatorio</span>';

}
elseif(@$link =='')
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
$bus = mysql_query("insert into  produtos (foto , nome , link) VALUES ('$nom' , '$titulo' , '$link')");
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
                    	<span class="data">Nome:</span>
                        <input type="text" name="nome" value="" />
                    </label>

                    
                    <label class="line">
                    	<span class="data">Link:</span>
                        <input type="text" name="link" value="" />
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