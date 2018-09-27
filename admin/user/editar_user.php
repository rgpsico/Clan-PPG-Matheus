  <?php

 

				if(isset($_POST['sendform'])){
				
$permitido =  array('image/jpg','image/jpeg','image/pjpeg');
                                   $usuario = htmlspecialchars($_POST['usuario']);
                                   $senha = htmlspecialchars($_POST['senha']);
                                   $senha2 = htmlspecialchars($_POST['senha2']);
                                   $email = htmlspecialchars($_POST['email']);
								   							  
                                   $sfoto   = $_POST['sfoto'];
								   $foto   =  $_FILES['file']['name'];
								   $pasta  =  UPLOAD_USER;
								   $type   =  $_FILES['file']['type'];
								   $tmp    =  $_FILES['file']['tmp_name'];
	

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

}elseif($foto == '' ){
$foto = $sfoto ;
}else{

$senh = md5($senha);
 
 $nome = explode('.',$foto)	;
 $ext = array_reverse($nome);
 $nom = time('s').$usuario.'.'.$ext[0];

 
								   
$bus = mysql_query("update up_users set nome='$usuario', email='$email' , senha='$senh' , foto='$nom'");
if($bus){
move_uploaded_file($tmp,$pasta.$nom);

echo'<span class="ms ok">Atualizado com Sucesso</span>';
}else{
echo'<span class="ms al">Nenhum Artigo Cadastrado</span>';

}

 }
}
								?>
								
								
								<?php
								
								if(isset($_GET['editar'])){
								 $id = $_GET['editar'];
								 $read = read('up_users'," where id='$id'"); 
				  if(!$read){
				  
				  }else{
				  foreach($read as $re):
				  ?>

                <div class="bloco form" style="display:block">
            	<div class="titulo">Criar User:</div>
                
                <form name="formulario" action="" method="post" enctype="multipart/form-data">
                    <label class="line">
                    	<span class="data">Nome:</span>
                        <input type="text" name="usuario" value="<?php echo $re['nome']?>" />
                    </label>

                    
                  
					
					<label class="line">
                    	<span class="data">Email:</span>
                        <input type="text" name="email" value="<?php echo $re['email']?>" />
                    </label>
						<label class="line">
                    	<span class="data">Senha:</span>
                        <input type="password" name="senha" value="<?php echo md5($re['senha'])?>" />
                    </label>
					
						<label class="line">
                    	<span class="data">Repetir a senha:</span>
                        <input type="password" name="senha2" value="<?php echo $re['senha']?>" />
                    </label>
					
					
                    
                    <label class="line">
                    	<span class="data">Nivel:</span>                       
					   <select name="nivel">						
                        	
							<option value="">&nbsp;&nbsp;<?php echo $re['nivel']?></option>
							
							
                        </select>
                    </label>
                    
                    <label class="line">
					 <img src="../upload/user/<?php echo $re['foto'];?> " height="150" width="150">
                    	<span class="data">Imagem:</span>
                        <input type="file" class="fileinput" name="file" value="<?php echo $re['foto']?>" size="60" style="cursor:pointer; background:#FFF;" />
                        <input type="hidden" name="sfoto" value="<?php echo $re['foto']?>" />                   
				   </label>
                    
                                       <?php endforeach; }} ?>
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="sendform" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->