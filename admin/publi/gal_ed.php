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
                    <td align="center">data:</td>
                    <td align="center">categoria:</td>
                    <td align="center"></td>
                    <td align="center" colspan="2">ações:</td>
                  </tr>
                  <?php  
				  
				  
				  if(isset($_POST['atu'])){
				  $permitido =  array('image/jpg','image/jpeg','image/pjpeg','image/png');
				  $f['nome'] = $_FILES['nome'];
				  $tmp       = $_FILES['nome']['tmp_name'];
				  $nome      = $_FILES['nome']['name'];
				  $type      = $_FILES['nome']['type'];
                  $id      = $_POST['id'];
					
				   $pasta = '../upload/publi/';
				
                  if(!in_array($type,$permitido)){

				  }else{					
		          
				  $update = mysql_query("update   publicidade set  publium='$nome' where id='$id' ");				 
				  move_uploaded_file($tmp,$pasta.$nome);
				 
				 
				  if($update){				 
				  echo '<span class="ms ok">atualisado com sucesso</span>';
				  }else{
				  echo '<span class="ms no">Não foi atualizado</span>';
				  }
				  }
				  
				  }
				  
				  if(isset($_GET['del'])){
				  $id = $_GET['del'];
				  $del =   delete('publicidade',"id='$id'");
				  if($del){
				    echo'<span class="ms ok">Deletado com sucesso</span>';
				  }else{
				   echo'<span class="ms al">Não foi deletado</span>';
				  }
				  }
				  
				  if(isset($_GET['id'])){
				  
				  	$pag  = (empty($_GET['pag']) ? '1' : $_GET['pag']);
					$maximo  = 10 ;
					$inicio  = ($pag * $maximo) - $maximo;
					
				  $id = $_GET['id'];
				  //select from galei
				   //$busca = read('up_posts',"  LIMIT  $inicio , $maximo"); 
				  $galeria = read('publicidade',"where id='$id'", "  LIMIT  $inicio , $maximo");
				  if(!$galeria){
				  echo'<span class="ms no">Não existe Fotos a serem editadas</span>';
				  }else{
				  foreach ($galeria as $gal): 				  
				  ?>
                  <tr>
                    <td><a href="#" target="_blank"><?php echo $gal['publium'];?></a></td>
                    <td align="center"><?php echo date('d/m/Y')?></td>
                    <td align="center"><image src="../upload/publi/<?php echo $gal['publium']?>" height="50" width="50"></td>
                    <form action=""method="post" enctype="multipart/form-data">                   
				    <td align="center"><input type="file" name='nome'width="" />
               				   <input type="hidden" name='id' readonly  value="<?php echo $gal['id']?> "/>
				   <input type="submit" name="atu"  >
				</form>	</td>
					
					
					
					
					
					
                  
                    <td align="center"><a href="index2.php?exe=galeria/ro_edit&id=<?php echo $gal['id_pai']?>&del=<?php echo $gal['id']?>" title="editar"><img src="ico/no.png" alt="excluir" title="excluir" /></a></td>
                    <td align="center"><a href="index2.php?exe=posts/ro_edit&publ=" title="publicar"><img src="ico/view.png" alt="publicar" title="publicar" /></a></td>
                  </tr>
                  <?php 
				  
				  
				  endforeach;
				 
				    ?>
                </table>
                <div class="paginator">
				<?php
                $link = 'index2.php?exe=publi/ro_edit&id=';
			             readPaginator('publicidade',"WHERE id" , $maximo, $link ,$pag);
 }
				  }						

						?>
                </div><!-- /paginator -->
            </div><!-- /bloco list -->