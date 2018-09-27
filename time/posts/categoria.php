     
            <div class="bloco cat" style="display:block">
            	<div class="titulo">Categorias:</div>   
                                             
                <table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
              
				 <tr class="ses">
                    <td>categoria:</td>
                    <td>resumo:</td>
                    <td align="center">tags:</td>
                    <td align="center">criada:</td>
                    <td align="center" colspan="3">ações:</td>
                  </tr>
                 
				 
				 
				 
				 
                  <tr>
				  <?php 
				  
				       $pag  = (empty($_GET['pag']) ? '1' : $_GET['pag']);
					$maximo  = 5 ;
					$inicio  = ($pag * $maximo) - $maximo;
					
				  
				 $busca = read('up_cat'," WHERE id_pai IS null LIMIT $inicio,$maximo"); 
                          if(!$busca){
						  echo'<spann class="ms al">Não existem registro qui</span>';
                        }else{

						foreach($busca as $bus):
                      $ico = ($bus['tags'] == '' ? 'no.png' : 'ok.png');
                                 ?>				  
                    <td><?php echo $bus['nome'] ?></td>
                    <td><?php echo $bus['nome']?>...</td>
                    <td align="center"><img src="ico/<?php echo $ico ?>" alt="3 Tags" title="3 Tags" /></td>
                    <td align="center"><?php echo $bus['nome'];?></td>
                    <td align="center"><a href="index2.php?exe=posts/edica&id=<?php echo $bus['id'] ?>" title="editar"><img src="ico/edit.png" alt="editar" title="editar" /></a></td>
                    <td align="center"><a href="index2.php?exe=posts/form&id=<?php echo $bus['id'] ?>" title="editar"><img src="ico/no.png" alt="editar" title="excluir" /></a></td>
                  </tr>
                  <?php 
				  
				 
				  endforeach;
				  
				   }?>
                </table>
				
                <div class="paginator">
                	<?php
					
					     $link = 'index2.php?exe=posts/categoria&pag=';
			             readPaginator('up_cat',"WHERE id_pai IS null" , $maximo, $link ,$pag);
					?>
                </div><!-- /paginator -->
            </div><!-- /bloco cat -->