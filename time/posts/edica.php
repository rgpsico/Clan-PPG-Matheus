<div class="bloco form" style="display:block">
            	<div class="titulo">Categoria:</div>
				
				
                <?php 
				
				$id = $_GET['id'];
				
				
				$busca = read('up_cat' , "where id= $id ");
                          if($busca){
                         foreach($busca as $bus):

                                 ?>	
                <form name="formulario" action="posts/apartcat.php" method="post">
			<?php if(isset($_GET['msg'])){
				
				echo'<span class="ms ok">'.$_GET['msg'].'</span>';
				}elseif(isset($_GET['erro'])){		
				
				echo'<span class="ms no">'.$_GET['erro'].'</span>';
				}
				?>
				<input type="hidden" readonly name="id" value="<?php echo $bus['id']?>" />
                    <label class="line">
                    	<span class="data">Nome:</span>
                        <input type="text" name="nome" value="<?php echo $bus['nome']?>" />
                    </label>

                    
                    <label class="line">
                    	<span class="data">Url:</span>
                        <input type="text" name="url" value="<?php echo $bus['url']?>" />
                    </label>
					
					
					<label class="line">
                    	<span class="data">content:</span>
                        <input type="text" name="content" value="content" />
                    </label>
                    
                   
						
                       
                        </select>
                    </label>
                    
					<label class="line">
                    	<span class="data">tags:</span>
                        <input type="text" name="tags" value="<?php echo $bus['tags']?>" />
                    </label>
					
					<label class="line">
                    	<span class="data">data:</span>
                        <input type="text" name="data" value="<?php echo $bus['data']?>" />
                    </label>
                  
					<?php
					
                     endforeach;
				  }	 
		   ?>
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="sendCat" name="send" class="btn" />
                </form>
                	
            </div><!-- /bloco form -->