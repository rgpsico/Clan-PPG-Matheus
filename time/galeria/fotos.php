<?php

if(isset($_POST['send'])){
session_start();
         $perfil = $_GET['galeria'];                  
$query = mysql_query("select nome from up_users where nome='$perfil'");
while($bus = mysql_fetch_array($query)):
$nome = $bus['nome'];	
endwhile;						
$id = $_GET['id'];
$pasta  = 'upload/';

$arq = $_FILES['arq'];
$ext = '.jpeg';
$permissao = array('image/jpg','image/jpeg','image/pjpeg','image/png');

for($i =0 ; $i<count($arq['tmp_name']); $i++){
 $arqNome = '&'.md5(time().$arq['tmp_name'][$i]).$ext;
move_uploaded_file($arq['tmp_name'][$i],$pasta.$arqNome);
 //upload($arq['tmp_name'][$i],$arqNome , 500 ,$pasta);
 //upload($arq['tmp_name'][$i],$arqNome , 200 ,$pastat);
 
$inserir  = mysql_query ("insert into ppg_play (nome, foto , id_pai) values('$nome','$arqNome','$_GET[id]')");
 echo'<span class="ms ok">foto enviada com sucesso</span>';

}
}

?>


			<div class="bloco form" style="display:block">
            	<div class="titulo">Criar Galeria:</div>
                
                <form name="formulario" action="" method="post" enctype="multipart/form-data" />
                    <label class="line">
                    	<span class="data">foto:</span>
                        <input type="file" name="arq[]" value="" multiple />
                    </label>

                    
                    <label class="line">
                    	<span class="data">Descrição:</span>
						<?php 
						
						       require('../dts/dbaSis.php');
                               require('../dts/outSis.php');
                                require('../dts/getSis.php');
						
						
						$id = $_GET['id'];
						$ler = read('ppg_play',"where id='$id'");
						foreach($ler as $le):
                      echo'<input type="text" name="nome" value='.$le['nome'].' />';
						 endforeach?>
                    </label>
                    
                 
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form