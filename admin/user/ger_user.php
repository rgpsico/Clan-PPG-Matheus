 <?php
 
 if(isset($_GET['excluir'])){
 $id = $_GET['excluir']; 
$del =  delete('up_users'," id='$id'");
if(!$del){
echo'<span class="ms al">Erro ao Deletar</span>';

}else{

}
 }
 ?>
 
 <div class="bloco user" style="display:block">
            	<div class="titulo">Usuários:
                
                	<form name="filtro" action="" method="post">
                    	<label>
                        	<input type="text" name="id" class="radius" size="30" value="Nome:" 
                            onclick="if(this.value=='Nome:')this.value=''" 
                            onblur="if(this.value=='')this.value='Nome:'"
                            />
                        </label>
                        <input type="submit" value="filtrar resultados" name="sendFiltro" class="btn" />
                    </form>
                
                </div>   
                                             
                <table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td align="center">#id</td>
                    <td>nome:</td>
                    <td>email:</td>
                    <td align="center">nível:</td>
                    <td align="center" colspan="3">ações:</td>
                  </tr>
                  <?php
                    $pag  = (empty($_GET['pag']) ? '1' : $_GET['pag']);
					$maximo  = 5 ;
					$inicio  = ($pag * $maximo) - $maximo;


				 $read = read('up_users',"  LIMIT  $inicio , $maximo"); 
				  if(!$read){
				  
				  }else{
				  foreach($read as $re):
				  ?>
                  <tr>
                    <td align="center"><a href="#" title="usuário"></a><?php echo $re['id']?></td>
                    <td><?php echo $re['nome']?></td>
                    <td><?php echo $re['email']?></td>
                    <td align="center"><?php echo $re['nivel']?></td>
                    <td align="center"><a href="index2.php?exe=user/editar_user&editar=<?php echo $re['id']?>" title="editar"><img src="ico/edit.png" alt="editar" title="editar" /></a></td>
                    <td align="center"><a href="index2.php?exe=user/ger_user&excluir=<?php echo $re['id']?>" title="editar"><img src="ico/no.png" alt="editar" title="excluir" /></a></td>
                  </tr>
                  <?php endforeach; }?>
                </table>
                <div class="paginator">
                	 <?php $link = 'index2.php?exe=user/ger_user&pag=';
			             readPaginator('up_users',"WHERE id" , $maximo, $link ,$pag);
						 ?>
                </div><!-- /paginator -->
            </div><!-- /bloco user -->