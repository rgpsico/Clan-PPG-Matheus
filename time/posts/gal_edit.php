<div class="bloco list" style="display:block">
            	<div class="titulo">Artigos:
                
                	<form name="filtro" action="" method="post">
                    	<label>
                        	<input type="text" name="id" class="radius" size="30" value="Titulo:" 
                            onclick="if(this.value=='Titulo:')this.value=''" 
                            onblur="if(this.value=='')this.value='Titulo:'"
                            />
                        </label>
                        <input type="submit" value="filtrar resultados" name="sendFiltro" class="btn" />
                    </form>
                
                </div><!-- /titulo -->
                                             
                <table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                                   <td>Nome:</td>
                    <td align="center">Foto da capa</td>
                    <td align="center">visitas:</td>
                    <td align="center" colspan="4">ações:</td>
                  </tr>
                  <?php  
				 if(isset($_POST['atu'])){
				  $id   =   $_POST['id'];				 
				  $no   =   $_POST['no'];
				 

				  $permitido =  array('image/jpg','image/jpeg','image/pjpeg','image/png');
				 
 				  $tmp  = $_FILES['nome']['tmp_name'];
				  $nome = $_FILES['nome']['name'];
				  $type = $_FILES['nome']['type'];
                
				
				  $pasta =  'upload/album/';
                  if(!in_array($type,$permitido)){
				  }else{					
                  
				  
				  $update = mysql_query("update   galeria set  nome='$no' , foto='$nome' where id='$id' ");
				    move_uploaded_file($tmp,$pasta.$nome);
                    
				  if($update){
				  
				  echo'<span class="ms ok">atualisado com sucesso</span>';
				  }else{
				  echo'<span class="ms no">Erro ao atualisar</span> ';
				  }
				  }
				  }
				   
				   
				   
				   
				  if(isset($_GET['del'])){
				  $id = $_GET['del'];
				  $del =   delete('galeria',"id='$id'");
				  if($del){
				  echo'<span class="ms ok">Deletado com sucesso</span>';
				  }else{
				  echo'<span class="ms no">Erro ao Deletar</span> ';
				  }
				  }
				  
				  
				  $galeria = read('galeria','where id_pai is  null');
				  if(!$galeria){
				  echo'<span class="ms no">Não existe Albuns a serem editado</span>';
				  }else{
				  foreach ($galeria as $gal): 				  
				  ?>
                  <tr>
				  <form action="" method="post" enctype="multipart/form-data">
				  <input type="hidden" readonly  name="id"value="<?php echo $gal['id']?>">
                                     
					 <td align="center"> <input type="text"   name="no"    value="<?php echo $gal['nome']?>" >
					 <img src="upload/album/<?php echo $gal['foto']?>" height="80" width="80"></a>
					 </td>
                    <td align="center">  <input type="file" name='nome'width="" />
					<input type="submit" name="atu">
					</td>  
                  			   

				  
					
					
					</form>
					
                    <td align="center"><a href="index2.php?exe=posts/fotos&id=<?php echo $gal['id']?>" title="editar"><img src="ico/edit.png" alt="Enviar imagem" title="editar" /></a></td>
                    <td align="center"><a href="index2.php?exe=posts/gal_edit&del=<?php echo $gal['id']?>" title="editar"><img src="ico/no.png" alt="excluir" title="excluir" /></a></td>
                    <td align="center"><a href="index2.php?exe=galeria/gal_ed&id=<?php echo $gal['id']?>" title="visualisar fotos"><img src="ico/view.png" alt="visualisar fotos" title="visualisar fotos" /></a></td>
                  </tr>
                  <?php 
				  
				  
				  endforeach;
				  }
				    ?>
                </table>
                <div class="paginator">
                	<a href="#">primeira</a>
                    <span class="selected">1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a>
                    <a href="#">última</a>
                </div><!-- /paginator -->
            </div><!-- /bloco list -->