  <?php

 

				if(isset($_POST['sendform'])){
				
$permitido =  array('image/jpg','image/jpeg','image/pjpeg');
                                   $usuario = htmlspecialchars($_POST['usuario']);
                                   $senha = htmlspecialchars($_POST['senha']);
                                   $senha2 = htmlspecialchars($_POST['senha2']);
                                   $email = htmlspecialchars($_POST['email']);
								   							  

								   $foto   = $_FILES['file']['name'];
								   $pasta  = UPLOAD_USER;
								   $type   = $_FILES['file']['type'];
								   $tmp    = $_FILES['file']['tmp_name'];
	

if(@$usuario == ''){
echo'<span class="ms al">nome de usuario  é obrigatorio</span>';
}elseif(@$senha == '' || $senha2 == ''){
echo'<span class="ms al">Nenhum campo pode ficar em Branco </span>';
}elseif(@$senha != $senha2){
echo'<span class="ms al">Senha indiferente </span>';

}elseif($senha < 6 || $senha < 12 ){
echo'<span class="ms al">Senha tem que ter entre seis e doze caracteres</span>';

}elseif(!in_array($type , $permitido)){
echo'<span class="ms al">imagem não e valida </span>';

}else{



 $nome = explode('.',$foto)	;
 $ext = array_reverse($nome);
 $nom = time('m-s').$usuario.'.'.$ext[0];

 
								   
$bus = mysql_query("insert into  up_users (nome, email , senha , foto)VALUES('$usuario','$email','$senha','$nom')");
if($bus){
upload($tmp ,$nom,150,$pasta);
echo'<span class="ms ok">Artigo Cadastrado com Sucesso</span>';
}else{
echo'<span class="ms al">Nenhum Artigo Cadastrado</span>';

}

 }
}
								?>

<div class="bloco form" style="display:block">
            	<div class="titulo">Criar User:</div>
                
                <form name="formulario" action="" method="post" enctype="multipart/form-data">
                    <label class="line">
                    	<span class="data">Nome:</span>
                        <input type="text" name="usuario" value="" />
                    </label>

                    
                    <label class="line">
                    	<span class="data">Senha:</span>
                        <input type="text" name="senha" value="" />
                    </label>
					
					<label class="line">
                    	<span class="data">Repetir Senha:</span>
                        <input type="text" name="senha2" value="" />
                    </label>
					
					<label class="line">
                    	<span class="data">Email:</span>
                        <input type="text" name="email" value="" />
                    </label>
					
                    
                    <label class="line">
                    	<span class="data">Nivel:</span>                       
					   <select name="nivel">						
                        	
							<option value="">&nbsp;&nbsp;</option>
							
							
                        </select>
                    </label>
                    
                    <label class="line">
                    	<span class="data">Imagem:</span>
                        <input type="file" class="fileinput" name="file" size="60" style="cursor:pointer; background:#FFF;" />
                    </label>
                    
                                       
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="sendform" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->