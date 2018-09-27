<div class="bloco form" style="display:block">
         
				<?php
				if(isset($_POST['send'])){
				
			
			    $f['nome']     = mysql_real_escape_string($_POST['nome']);
				$f['email']    = mysql_real_escape_string($_POST['email']);
				$f['endereco'] = mysql_real_escape_string($_POST['endereco']);
				
				
			    $f['telefone']  = mysql_real_escape_string($_POST['telefone']);
				$f['telefone2'] = mysql_real_escape_string($_POST['telefone2']);
				$f['cel']       = mysql_real_escape_string($_POST['cel']);
				$f['contato']   = mysql_real_escape_string($_POST['contato']);
				
				
				
				
				
				
				
				$create = update('contato',$f," id=1");
				
			
			
					
				
				?>
				
			
            	  <div class="titulo">Nosso Contato:</div> 	
           
               
				
				<?php if(!$create){
				echo'<span class="ms no">Erro ao Atualisar</span>';
				}else{
				echo'<span class="ms ok">Atualisado Com Sucesso</span>';
				
				}
					}
				
				?>
				 <form name="formulario" action="" method="post">
				
				     <?php $read = read ('contato')?>
                    <label class="line">
					<?php
					$busca = read('contato');
                          if($busca){
                         foreach($busca as $bus):
						 ?>
                    	<span class="data">nome:</span>
                        <input type="text" name="nome" value="<?php echo $bus['nome']?>" />
                    </label>

                    
                     <label class="line">
                    	<span class="data">Email:</span>
                        <input type="text" name="email" value="<?php echo $bus['email']?>" />
                    </label>          
					
					
                        <label class="line">
                    	<span class="data">Endereco:</span>
                        <input type="text" name="endereco" value="<?php echo $bus['endereco']?>" />
                    </label>   

                        <label class="line">
                    	<span class="data">Telefone:</span>
                        <input type="text" name="telefone" value="<?php echo $bus['telefone']?>" />
                    </label>   	

                        <label class="line">
                    	<span class="data">Telefone2:</span>
                        <input type="text" name="telefone2" value="<?php echo $bus['telefone2']?>" />
                    </label>   

                         <label class="line">
                    	<span class="data">Cel:</span>
                        <input type="text" name="cel" value="<?php echo $bus['cel']?>" />
                    </label>   						
                    
					<label class="line">
                    	<span class="data">Contato:</span>
                        <textarea name="contato" class="editor">
						<?php echo $bus['contato']?>
						</textarea>
                    </label>
                    
                   <?php endforeach; }?>
                    
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->