  <?php

 

				if(isset($_POST['sendform'])){
				
                          $permitido =  array('image/jpg','image/jpeg','image/pjpeg');
                               
                                  
                                  // $lingua = htmlspecialchars($_POST['lingua']);
                                 //  $template = htmlspecialchars($_POST['template']);
								   $id =    $_POST['id'];							  
                                  $titulo = $_POST['titulo'];
				              	  
								   $logo       = $_FILES['logo']['name'];
						    	   $favicon    = $_FILES['favicon']['name'];
								   $sfavicon   = $_POST['sfavicon'];
								   $logo       = $_FILES['logo']['name'];
								   $slogo      = $_POST['slogo'];

								   
					
						
								   $tmpf       = $_FILES['favicon']['tmp_name'];
								   
								   $pasta  =  '../upload/user/';
								   
								   $type   = $_FILES['logo']['type'];								   
								   $tmp    = $_FILES['logo']['tmp_name'];
                                   
								 
								   //$slogo  = $_POST['slogo'];
								   
								   


								   
							
//$update = mysql_query("UPDATE artigos SET   titulo ='$titulo' ,content='$content' ,autor='$autor' , categoria='$categoria' , foto='$nom' , data='$data'  where id='$id' ");
$bus = mysql_query("update config SET         titulo='$titulo' , logo='$logo' , favicon='$favicon' where id='$id'");
if($bus){
move_uploaded_file($tmp,$pasta.$logo);
move_uploaded_file($tmpf,$pasta.$favicon);
echo'<span class="ms ok"> Atualisado com Sucesso</span>';
}else{
echo'<span class="ms al">Erro ao enviar</span>';

}

 }


								?>
								
								
								<?php
								

								 $id   = $_GET['editar'];
								$query = mysql_query("select * from config where id = $id");															
				            while($re  = mysql_fetch_array($query)){
				  
				  ?>

                <div class="bloco form" style="display:block">
            	<div class="titulo">Config:</div>
                
                <form name="formulario" action="" method="post" enctype="multipart/form-data">
                    <label class="line">
                    <span class="data">Titulo do site:</span>
                    <input type="text" name="titulo" value="<?php echo $re['titulo']?>" />
					 <input type="hidden" name="id" value="<?php echo $re['id']?>" />
                    </label>
					

                    
                  
					
				
                    </label>
                    <label class="line">
					 <img src="../upload/user/<?php echo $re['favicon'];?> " height="50" width="50">
                    	<span class="data">favicon:</span>
                        <input type="file"  value=""  name="favicon" />
						<input type="hidden" name="sfavicon"  value="<?php echo $re['favicon'];?>">
						 
                    </label>
					
					
                    <label class="line">
	<img src="../upload/user/<?php echo $re['logo'];?>" height="150" width="150">
     <span class="data">Logo tipo:</span>
   <input type="file"  name="logo" value="<?php echo $re['logo'];?>" />
   <input type="hidden" name="slogo"  value="<?php echo $re['logo'];?>">
                    </label>
                    
                                       <?php  }?>
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="sendform" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->