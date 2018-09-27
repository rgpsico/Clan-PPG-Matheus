<div class="bloco list" style="display:block">
            	<div class="titulo">publi_roda parceiros:
                
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
                    <td align="center">Foto da capa</td>
                    <td align="center">visitas:</td>
                    <td align="center" colspan="3">ações:</td>
                  </tr>
                  <?php  
				  if(isset($_GET['del'])){
				  $id = $_GET['del'];
				  $del =   delete('publi_roda',"id='$id'");
				  if($del){
				  echo'Deletado com sucesso';
				  }else{
				  echo'nada deletado ';
				  }
				  }
				  $pag  = (empty($_GET['pag']) ? '1' : $_GET['pag']);
				  $maximo  = 5 ;
				  $inicio  = ($pag * $maximo) - $maximo;
				  $galeria = read('publi_roda', "  LIMIT  $inicio , $maximo");
				   if(!$galeria){
				  echo'<span class="ms no">Não existe Albuns a serem editado</span>';
				  }else{
				  foreach ($galeria as $gal): 				  
				  ?>
                  <tr>
                    <td><a href="#" target="_blank"><?php echo $gal['r_dois']?></a></td>
                    <td align="center"><?php echo date('d/m/Y')?></td>
                    <td align="center"><img src="upload/publi/<?php echo $gal['r_dois']?>" height="80" width="80"></a></td>
                    <td align="center"><<?php echo $gal['r_dois']?></td>
					
					
					
                    <td align="center"><a href="index2.php?exe=publi/ro_edit_down&id=<?php echo $gal['id']?>" title="editar"><img src="ico/edit.png" alt="Enviar imagem" title="editar" /></a></td>
                    <td align="center"><a href="index2.php?exe=publi/ro_edit_down&del=<?php echo $gal['id']?>" title="editar"><img src="ico/no.png" alt="excluir" title="excluir" /></a></td>
                    <td align="center"><a href="index2.php?exe=publi/edit_ro_update&id=<?php echo $gal['id']?>" title="visualisar fotos"><img src="ico/view.png" alt="visualisar fotos" title="visualisar fotos" /></a></td>
                  </tr>
				  
				  
                  <?php 
				  
				  
				  endforeach;
				  }
				    ?>
                </table>
                <div class="paginator">
                	<?php
                $link = 'index2.php?exe=publi/ro_edit_down&id=';
			            readPaginator('publi_roda',"WHERE id" , $maximo, $link ,$pag);
 
				  					

						?>
                </div><!-- /paginator -->
            </div><!-- /bloco list -->