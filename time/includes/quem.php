<?php
if(isset($_POST['send'])){

$f['nosso'] = htmlspecialchars($_POST['nosso']);


echo'<pre>';
print_r($f);
echo'</pre>';


create('quem',$f);
/*
$creat = create('quem',$f);
if(!$creat){
echo'<span class="ms no">erro ao cadastra</span>';

}else{
echo'<span class="ms ok">sucesso ao cadastra</span>';

}
*/
}

?>
<?php

?>
<div class="bloco form" style="display:block">
            	<div class="titulo">Quem Somos:</div>
                
                <form name="formulario"  action="" method="post"enctype="multpart/form-data">
                                       
                                       
                    <label class="line">
                    	<span class="data">Nossos Serviços:</span>
                        <textarea name="nosso" class="editor" rows="10"></textarea>
                    </label>
				
				
                    
                   
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->