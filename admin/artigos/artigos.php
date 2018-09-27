<?php if(!$_SESSION['autUser']){

header('location:../index.php');
}else{?>
<div class="bloco list" style="display:block">
            	<?php
								
			   if(isset($_GET['update'])){
				
				$atu = $_GET['update'] ;
				if($atu){
				$public = read('artigos',"where id = $atu");
				foreach($public as $publ):
				$pu = ($publ['public'] == 1 ? 0 : 1);			
				
				endforeach;
				
				
				
                $update = mysql_query("update  artigos set  public='$pu' where id='$atu' ");
				if(!$update){
				echo'não foi atualisado';
				
				}else{
				
						$msg = ($publ['public'] == '0' ? '<span class="ms ok">publicado</span>' : '
						<span class="ms al">Despublicado com sucesso</span>' );
						
						echo $msg;
						header('location:index2.php?exe=artigos/artigos');
						
						
				}
				}
				
				
				}
				
				
			
								
			   if(isset($_GET['visitas'])){
				$visitas = $_GET['visitas'];
				$zero=0 ;
				
                $update = mysql_query("update  artigos set  visitas ='$zero'  where id='$visitas' ");
				if(!$update){
				echo'não foi atualisado';
				
				}else{			
					
						
						echo $msg;
						header('location:index2.php?exe=artigos/artigos');
						
						
				}
				}
				
				
				
				
				
				
				
				
				
				
				if(isset($_GET['del'])){
				$id = $_GET['del']; 
				
				$excluir = delete('artigos'," id='$id'");
				if($excluir){				
				echo'<span class="ms ok"> sucesso ao excluir</span>';
				}
				}
				
				
				?>
				
				<div class="titulo">Artigos:               
                	<form name="filtro" action="" method="post">
                    	<label>
                        	<input type="text" name="titulo" class="radius" size="30" value="" />
                        </label>
                        <input type="submit"  name="buscar" class="btn" />
                    </form>
                
                </div><!-- /titulo -->
                                             
                <table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td>clique no link p/ pre-visualisar:</td>
                    <td align="center">data:</td>
                    <td align="center">visitas:</td>
                    <td align="center">Categoria:</td>
                    <td align="center" colspan="3">acoes:</td>
                  </tr>
                 	  <?php


                 
					$pag  = (empty($_GET['pag']) ? '1' : $_GET['pag']);
					$maximo  = 8 ;
					$inicio  = ($pag * $maximo) - $maximo;
					
				  
				  if(!isset($_POST['buscar']))
				  {
				 
					  $busca = read('artigos',"order by id desc LIMIT  $inicio , $maximo"); 
				
				  }else{
				  $titulo = $_POST['titulo'];
                    
				 	  $busca = read('artigos',"where titulo like '%$titulo%' "); 
				  
				  
				  header('refresh:5');
				  }
				  
			
				  
               









			   if(!$busca){
				  echo'<span class="ms al">NÃ£o exitem artigos a serem editados<span/>';

}else{
                     foreach($busca as $bus): 
					$img = ($bus['public'] == '0' ? 'alert.png' : 'ok.png' );
                    $ale = ($bus['public'] == '0' ? 'Publicar'  : 'Nao Publica' );
					 ?>
					 
                  <tr>
				
                    <td><a href="http://favela10.comyr.com/news-single.php?id=<?php echo $bus['id'] ?>" target="_blank"><?php echo $bus['titulo'] ?>...</a></td>
                    <td align="center"><?php echo $bus['data'] ?></td>					
                    <td align="center"><a href="index2.php?exe=artigos/artigos&visitas=<?php echo $bus['id'] ?> " alt="Clique para zerar as vizitas" title="visitas"/><?php echo $bus['visitas']; ?></a></td>


                    <td align="center"><?php echo $bus['categoria']; ?></td>
                    <td align="center"><a href="index2.php?exe=artigos/edi&id=<?php echo $bus['id'] ?>" title="editar"><img src="ico/edit.png" alt="editar" title="editar" /></a></td>
                    <td align="center"><a href="index2.php?exe=artigos/artigos&del=<?php echo $bus['id'] ?>" title="editar"><img src="ico/no.png" alt="editar" title="excluir" /></a></td>
                    <td align="center"><a href="index2.php?exe=artigos/artigos&update=<?php echo $bus['id'] ?>" title="publicar"><img src="ico/<?php echo $img ?>" alt="<?php echo $ale ?>" title="<?php echo $ale ?>" /></a></td>
                

                  
				</tr>
				
                  <?php endforeach;
				  }
				  ?>
                </table>
                 <div class="paginator">
                	<?php
					
					     $link = 'index2.php?exe=artigos/artigos&pag=';
			             readPaginator('artigos',"WHERE id" , $maximo, $link ,$pag);
					?>
                </div><!-- /paginator -->
            </div><!-- /bloco list -->
            <?php
		}
		
			 ?>