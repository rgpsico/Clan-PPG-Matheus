<?php if(!$_SESSION['autUser']){

header('location:../index.php');
}else{?>
<?php

if(isset($_POST['send'])){
$id = $_GET['id'];
$pasta   =  '../upload/album/';
$pastat  = '../upload/album/';
$arq = $_FILES['arq'];
$ext = '.jpeg';
$permissao = array('image/jpg','image/jpeg','image/pjpeg','image/png');

for($i =0 ; $i<count($arq['tmp_name']); $i++){
 $arqNome = md5(time().$arq['tmp_name'][$i]).$ext;
move_uploaded_file($arq['tmp_name'][$i],$pastat.$arqNome);
 //upload($arq['tmp_name'][$i],$arqNome , 500 ,$pasta);
 //upload($arq['tmp_name'][$i],$arqNome , 200 ,$pastat);
$inserir  = mysql_query ("insert into galeria (foto , id_pai) values('$arqNome','$_GET[id]')");


}
 echo'<span class="ms ok">fotos enviadas com sucesso</span>';
}

?>


			<div class="bloco form" style="display:block">
            	<div class="titulo">Envie imagens para o Album</div>
                
                <form name="formulario" action="" method="post" enctype="multipart/form-data" />
                    <label class="line">
                    	<span class="data">Enviar foto p/ o Album:</span>
                        <input type="file" name="arq[]" value="" multiple />
                    </label>

                    
                    <label class="line">
                    	<span class="data">Descrição:</span>
						<?php 
						$id = $_GET['id'];
						$ler = read('galeria',"where id='$id'");
						foreach($ler as $le):
                      echo'<input type="text" name="nome" value='.$le['nome'].' />';
						 endforeach?>
                    </label>
                    
                 
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form
			<?php
		}
		
			 ?>