
	<?php
	if(function_exists(getUser)){
	if(!getUser($_SESSION['autUser']['id'],'1')){
	echo'<span class="ms al">desculpe vc no tem permisso pra gerencia categoria</span>';
	}else{
	
	
	
	?>
            
            <div class="bloco cat" style="display:block">
            	<div class="titulo">Categorias:
				<a href="index2.php?exe=posts/categoria-create" class="btn"title=""> Criar categoria
				  <strong style color="red"><?php echo $catpai['nome']?></strong></a>
				</div>   
                    <?php 
					if(!empty($_GET['del'])){
					$idDel = mysql_real_escape_string($_GET['del']);
					delete('up_cat',"id = '$idDel'");
					echo '<span class="ms ok">categoria removida com sucesso</span>';
					
					}
					
					
					
					
					
					$pag = (empty($_GET['pag']) ? '1' : $_GET['pag']);
					$maximo = 5 ;
					$inicio = ($pag * $maximo) - $maximo;
					$readCat = read('up_cat'," WHERE id_pai IS null LIMIT $inicio,$maximo"); 			 
if(!$readCat){
echo'<span class="ms in">Não existe registro categorias ainda</span>';
}else{

				echo'

					              
                <table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td>categoria:</td>
                    <td>resumo:</td>
                    <td align="center">tags:</td>
                    <td align="center">criada:</td>
                    <td align="center" colspan="5">ações:</td>
					
                  </tr>';
				  
                foreach($readCat as $cat):
				$catTags = ($cat['tags'] != '' ? 'ok.png': 'no.png'	);
				  echo'<tr>';
				  echo'<td>'.$cat['nome'].'</td>';
				  echo'<td>'.lmWord($cat['content'],'40').'</td>';
				  echo'<td align="center"><img src="ico/'.$catTags.'" alt="3 Tags" title="3 Tags" /></td>';
				  echo'<td align="center">'.date('d/m/Y H:i',strtotime($cat['data'])).'</td>';
				  echo' <td align="center" colspan="2"><a href="index2.php?exe=posts/categoria&edit='.$cat['id'].'" title="editar categoria'.$cat['nome'].'"><img src="ico/edit.png" alt="editar" title="editar" /></a></td>';
				   echo' <td align="center" colspan="2"><a href="index2.php?exe=posts/categoria&new='.$cat['id'].'" title="editar categoria'.$cat['nome'].'"><img src="ico/new.png" alt="editar" title="novo titu" /></a></td>';
				 echo' <td align="center" colspan="2"><a href="index2.php?exe=posts/categoria&delsub='.$cat['id'].'" title="editar categoria'.$cat['nome'].'"><img src="ico/no.png" alt="editar" title="editar" /></a></td>';
				 
                 echo'</tr>';
				
				
				$readSubCat = read('up_cat' ,"WHERE id_pai = '$cat[id]'");
				if($readSubCat){
				foreach($readSubCat as $catSub):
				            echo'<tr class="subcat">';
					        echo'<td>&raquo;&raquo;'.$cat['nome'].'</td>';
						    echo' <td>'.lmWord($cat['content'],35).'</td>';
							echo' <td align="center"><img src="ico/ok.png" alt="3 Tags" title="3 Tags" /></td>';
							echo'  <td align="center">'.date('d/m/Y H:i',strtotime($cat['data'])).'</td>';
                    	    echo '<td align="center">
							<a href="index2.php?exe=posts/categoria&edit='.$cat['id'].'" title="editar">
							<img src="ico/edit.png" alt="editar" title="editar" /></a>
							</td>';
												
							
				endforeach;
				}
				
			 endforeach;
			 echo'</tr>';
			  echo'</table>';
			  
			  
			  
			  
			 $link = 'index2.php?exe=posts/categoria&pag=';
			 readPaginator('up_cat',"WHERE id_pai IS null" , $maximo, $link ,$pag);
			 }
			 ?>
               
			
               <!-- <div class="paginator">
                	<a href="#">primeira</a>
                    <span class="selected">1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a>
                    <a href="#">ultima</a>
                </div> /paginator -->
            </div><!-- /bloco cat -->
            <?php
			}
			}else{
			echo'<h1>Desculpe acesso negado</h1>';
			} ?>
           