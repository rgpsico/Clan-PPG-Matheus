<?php if(!$_SESSION['autUser']){

header('location:../index.php');
}else{?>
<div class="bloco list" style="display:block">
            	<div class="titulo">Enviae as fotos p/ o galeria:
                
                <!--	<form name="filtro" action="" method="post">
                    	<label>
                        	<input type="text" name="id" class="radius" size="30" value="Titulo:" 
                            onclick="if(this.value=='Titulo:')this.value=''" 
                            onblur="if(this.value=='')this.value='Titulo:'"
                            />
                        </label>
                        <input type="submit" value="filtrar resultados" name="sendFiltro" class="btn" />
                    </form>-->
                
                </div><!-- /titulo -->
                                             
                <table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                                 
                    <td align="center">Foto da capa</td>                 
                    <td align="center" colspan="">Enviar foto da capa</td>
					<td align="center" colspan="3">Ações</td>
                  </tr>
                  <?php  
				   if(isset($_POST['atu'])){
				   $id   =   $_POST['id'];				 
				   $no   =   $_POST['no'];
				 

				  $permitido =  array('image/jpg','image/jpeg','image/pjpeg','image/png');
				  
				  
				 
 				  $tmp  = $_FILES['nome']['tmp_name'];
				  $nome = $_FILES['nome']['name'];
				  $type = $_FILES['nome']['type'];
                
				
				  $pasta =  '../upload/galeria/';
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
				  $foto = $_GET['foto'];
				  $id = $_GET['del'];
				  $del =   delete('galeria',"id='$id'");
				  if($del){
			     	unlink("../upload/galeria/".$foto); 
				  echo'<span class="ms ok">Deletado com sucesso</span>';
				  }else{
				  echo'<span class="ms no">Erro ao Deletar</span> ';
				  }
				  }
				  
				    $pag  = (empty($_GET['pag']) ? '1' : $_GET['pag']);
					$maximo  = 5 ;
					$inicio  = ($pag * $maximo) - $maximo;		
					 //$galeria = read('galeria','where id_pai is  null LIMIT  '$inicio' , '$maximo'');
				  
				  $galeria = mysql_query("select * from galeria where id_pai is null limit $inicio , $maximo");
				  if(!$galeria){
				  echo'<span class="ms no">Não existe Albuns a serem editado</span>';
				  }else{
				  //paginação maximo e a primeira pagia
				    
							        
				    while ($gal = mysql_fetch_array($galeria)):
					
				  ?>
                  <tr>
				  <form action="" method="post" enctype="multipart/form-data">
				  <input type="hidden" readonly  name="id"value="<?php echo $gal['id']?>">
                                     
					 <td align="center"> <input type="text"   name="no"    value="<?php echo $gal['nome']?>" >
					 <img src="../upload/galeria/<?php echo $gal['foto']?>" height="80" width="80"></a>
					
					 </td>
                    <td align="center">  <input type="file" name='nome'width="" />
					<input type="submit" name="atu">
					</td>  
                  			   

				  
					
					
					</form>
					
                    <td align="center"><a href="index2.php?exe=galeria/fotos&id=<?php echo $gal['id']?>" title="editar"><img src="ico/edit.png" alt="Enviar imagem" title="editar" /></a></td>
                    <td align="center"><a href="index2.php?exe=galeria/gal_edit&del=<?php echo $gal['id']?>&foto=<?php echo $gal['foto']?>" title="editar"><img src="ico/no.png" alt="excluir" title="excluir" /></a></td>
                    <td align="center"><a href="index2.php?exe=galeria/gal_ed&id=<?php echo $gal['id']?>&foto=<?php echo $gal['foto'] ?>" title="visualisar fotos"><img src="ico/view.png" alt="visualisar fotos" title="visualisar fotos" /></a></td>
                  </tr>
                  <?php 
				  
				  
				  endwhile;
				  }
				    ?>
                </table>
                <div class="paginator">
                	<div class="paginator">
                	 <?php 
					     
					     $link = 'index2.php?exe=galeria/gal_edit&pag=';
			             readPaginator('galeria',"WHERE id" , $maximo, $link ,$pag);
						 ?>
                </div>
                </div><!-- /paginator  readPaginator($tabela, $cond , $maximos , $link , $pag ,$width=NULL , $maxlinks = 2 ) -->
            </div><!-- /bloco list -->
			<?php
		}
		
			 ?>