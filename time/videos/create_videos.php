  <?php

$con = mysql_connect('mysql6.000webhost.com','a4914894_root','um57121214');
$s = mysql_select_db('a4914894_pousada',$con);


				if(isset($_POST['sendform'])){
				date_default_timezone_set("Brazil/East");
				
                                   $permitido =  array('image/jpg','image/jpeg','image/pjpeg');
								   $link    = htmlspecialchars($_POST['link']);
                                   $titulo    = htmlspecialchars($_POST['titulo']);
                                   $content   = $_POST['content'];                                  
								   $autor = htmlspecialchars($_POST['autor']);                                  
								   $data = date('d/m/Y');
								  

								   $foto   = $_FILES['file']['name'];
								   $pasta  =  'upload/video/';
								   $pastat  = 'upload/video/thumb/';
								   $type   = $_FILES['file']['type'];
								   $tmp    = $_FILES['file']['tmp_name'];
								   
								   
	                             
								
	
if(@$titulo == '')
{
echo'<span class="ms al">titulo é obrigatorio</span>';
}elseif(@$content ==''){
echo'<span class="ms al">conteudo tem que ter </span>';
}
elseif(!in_array($type , $permitido))
{
echo'<span class="ms al">imagem não e valida </span>';
}
elseif($link == ''){
echo'<span class="ms al">Link é obrigatório </span>';

}
else{



 $nome = explode('.',$foto)	;
 $ext = array_reverse($nome);
 $nom = time('m-s').$titulo.'.'.$ext[0];
 $data = strTotime(date('Y-d-m h:i:s'));
 
		//autor , titulo video , descrição videos , link videos , imagem videos	
		
$bus = mysql_query("insert into  videos (autor , titulo , nome_video , desc_video  , imagem)
                                 VALUES ('eeee' , 'eee' , '$link', '$content'  , '$nom' )");
if($bus){
move_uploaded_file($tmp,$pasta.$nom);

//upload($tmp ,$nom,300,$pastat);
echo'<span class="ms ok">Video enviado com sucesso</span>';
}else{
echo'<span class="ms al">Nenhum video Cadastrado</span>';

}

 }
}
								?>

<div class="bloco form" style="display:block">
            	<div class="titulo">enviar videos:</div>
                
                <form name="formulario" action="" method="post" enctype="multipart/form-data">
                     <label class="line">
                    	<span class="data">Autor:</span>
                        <input type="text" name="autor" value="" />
                    </label>
					
					<label class="line">
                    	<span class="data">Titulo do videos:</span>
                        <input type="text" name="titulo" value="" />
                    </label>

                    
                    <label class="line">
                    	<span class="data">Descrição do video:</span>
                        <textarea name="content" class="editor" rows="10"></textarea>
                    </label>
                    
					<label class="line">
                    	<span class="data">Link do videos:</span>
                        <input type="text" name="link" value="" />
                    </label>

                    
                    
                    <label class="line">
                    	<span class="data">Imagem do videos:</span>
                        <input type="file" class="fileinput" name="file" size="60" style="cursor:pointer; background:#FFF;" />
                    </label>
                    
                                       
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="sendform" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->