<?php
if(isset($_POST['send'])){

$quem = htmlspecialchars($_POST['nosso']);
$insert = mysql_query("update  contato  set quem='$quem'");

if(!$insert){
echo'<span class="ms no">erro ao cadastra</span>';
}else{

echo'<span class="ms ok">sucesso ao cadastra</span>';
}






}


?>
<?php

?>
<div class="bloco form" style="display:block">
            	<div class="titulo">Quem Somos:</div>
                
                <form name="formulario"  action="" method="post"enctype="multpart/form-data">
                                       
                                       
                    <label class="line">
					<?php 
					
					$bus = read("contato");
					if(!$bus){
					
					}else{
					foreach($bus as $buscar){
					
					
					?>
                    	<span class="data"></span>
                        <textarea name="nosso" class="editor" rows="10">
						<?php echo $buscar['quem']; ?>
						
						</textarea>
                    </label>
				<?php 
				
				}}?>
				
                    
                   
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->