<?php

if(isset($_POST['send'])){
require('dts/iniSis.php');
require('dts/dbaSis.php');


 $nome['nome'] = htmlspecialchars($_POST['nome']);
  $des['des'] =  htmlspecialchars($_POST['des']);

$res = mysql_query("insert into galeria  nome , desc values ('$nome','$des')");
}
?>
			
			<div class="bloco form" style="display:block">
            	<div class="titulo">Criar Galeria:</div>
                
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Nome da Galeria:</span>
                        <input type="text" name="nome" value="" />
                    </label>

                    
                    <label class="line">
                    	<span class="data">Descrição:</span>
                        <textarea name="des" class="editor" rows="10"></textarea>
                    </label>
                    
                 
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form