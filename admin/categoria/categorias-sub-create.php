

    
            <div class="bloco form" style="display:block">
            	<div class="titulo">Formulario:
				<a href="index2.php?exe=categoria/categoria" class="btn"title="">voltar</a>
				</div>
                <?php
				
				if(isset($_POST['sendform'])){
				

                                   $nome    = htmlspecialchars($_POST['nome']);
                                   $content = htmlspecialchars($_POST['content']);
                                   $tags    = htmlspecialchars($_POST['tags']);
                                   $data    = htmlspecialchars($_POST['data']);                                   
								   
								   $id_pai   = htmlspecialchars($_POST['id_pai']);
                                    
									  
									  $read = read("up_cat","where nome like  '%$nome%'");					              
								      
							                               
                                      $array = array($nome,$content,$tags,$data,);
							          $value = array_values($array);
                               								
								
								if(in_array('',$array)){
							    	echo  'Nenhum campo pode estar vazio';
								    
								   }elseif($read){
								   echo'nome titulo ja existe';
								   
								 
								   
								   	 
						}    else{							 
								 
								  $query = mysql_query("insert into up_cat  (id_pai, nome , content , tags ,data)values('$id_pai','$nome','$content','$tags','$data')");
								  if($query){
								  echo'ok';
								  }else{
								  echo'e foda';
								  
								  }
								 
								 }
								 
								
							    
								
}



				?>
                <form name="formulario" action="" method="post">
				<label class="line">
                    	<span class="data">categoria:</span>
                       
					   <select name="id_pai">
						
                        	<?php
							
							$res = read('up_cat','where id_pai is null');
							if(!$res){
							}else{
							
							foreach($res as $re):
							$id = $res['id'];
							
							?>
							<option value="<?php echo $re['id'];?>"><?php echo $re['nome'];?> &nbsp;&nbsp;</option>
							<?php endforeach; 
							
							}?>
							
                        </select>
                    </label>
                    <label class="line">
					
                    	<span class="data">Nome:</span>
                        <input type="text" name="nome" value="" />
                    </label>

                    
                    <label class="line">
                    	<span class="data">Texto:</span>
                        <textarea name="content" class="editor" rows="10">eeeee</textarea>
                    </label>
					 <label class="line">
                    	<span class="data">tags:</span>
                        <input type="text" name="tags" value="eeee" />
                    </label>

					 <label class="line">
                    	<span class="data">Data:</span>
                        <input type="text" name="data" value="wwwww"/>
                    </label>

                    
                   
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="sendform" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form  16:22-->
        </div><!-- pg -->
	