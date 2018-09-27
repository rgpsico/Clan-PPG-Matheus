

    
            <div class="bloco form" style="display:block">
            	<div class="titulo">Formulario:
				<a href="index2.php?exe=categoria/categoria" class="btn"title="">voltar</a>
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
								   $f['data'] = formDate($f['date']); unset($f['date']);
								   $f['url']  = setUrl($f['nome']);
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
                        <input type="text" name="nome" value="" />
                    </label>

                    
                    <label class="line">
                    	<span class="data">Texto:</span>
                        <textarea name="content" class="editor" rows="10"></textarea>
                    </label>
					 <label class="line">
                    	<span class="data">tags:</span>
                        <input type="text" name="tags" value="" />
                    </label>

					 <label class="line">
                    	<span class="data">Data:</span>
                        <input type="text" name="data" value=""/>
                    </label>

                    
                   
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="sendform" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form  16:22-->
        </div><!-- pg -->
	