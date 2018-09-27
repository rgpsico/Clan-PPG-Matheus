		<?php
	if(function_exists(getUser)){
	if(!getUser($_SESSION['autUser']['id'],'1')){
	echo'<span class="ms al">desculpe vc no tem permisso pra gerencia categoria</span>';
	}else{
	$urlpai = $_GET['idpai'];
	$prefix = $_GET['uri'];
	$read = read('up_cat',"WHERE id='$urlpai'");
	if(!$readPai){
	
	header('location:index2.php?exe=posts/categorias');
	}else{
	foreach($readPai as $catPai);
	}
	
	
	
	?>
    
            <div class="bloco cat" style="display:block">
            	<div class="titulo">Categorias:
				<a href="index2.php?exe=posts/categoria-create" class="btn"title=""> Criar categoria
				 para <strong style color="red"><?php echo $catpai['nome']?></strong></a>
				</div>  
                <?php
				
				if(isset($_POST['sendform'])){
				

                                   $f['nome'] = htmlspecialchars($_POST['nome']);
                                   $f['content'] = htmlspecialchars($_POST['content']);
                                   $f['tags'] = htmlspecialchars($_POST['tags']);
                                   $f['date'] = htmlspecialchars($_POST['data']);

								   
								   if(in_array('',$f)){
								   echo'<span class="ms in">Para uma boa alimentação prencha todos os campos</span>';
								   }else{
								   $f['id_pai'] = $urlpai;
								   $f['data'] = formDate($f['date']); unset($f['date']);
								   $f['url']  = $prefix.'-'.setUrl($f['nome']);
								   $readCatUri = read('up_cat',"WHERE url LIKE '%$f[url]%'");
								   if($readCatUri){
								   $f['url'] = $f['url'].'-'.count($readCatUri);
								 

								 $readCatUri = read('up_cat',"WHERE url = '$f[url]'");
								   if($readCatUri){
								   $f['url'] = $f['url'].'_'.time();
								   
								   }
								   }
								   create('up_cat',$f);
								   echo'<span class="ms ok">Categoria Criada com Sucesso</span>';
								   }


}

				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Nome:</span>
                        <input type="text" name="nome" value="<?php if($f['nome']) echo $f['nome']?>" />
                    </label>

                    
                    <label class="line">
                    	<span class="data">Texto:</span>
                        <textarea name="content"  rows="10"><?php if($f['content']) echo $f['content']?></textarea>
                    </label>
					 <label class="line">
                    	<span class="data">tags:</span>
                        <input type="text" name="tags" value="<?php if($f['tags']) echo $f['tags']?>" />
                    </label>

					 <label class="line">
                    	<span class="data">Data:</span>
                        <input type="text" name="data" value="<?php if($f['date']){ echo $f['date']; }else{
						echo date('d/m/Y H:i:s');}?>" />
                    </label>

                    
                   
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="sendform" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form  16:22-->
        </div><!-- pg -->
		<?php
		}
		}else{
		header('location:.../index2.php');
			} ?>
           