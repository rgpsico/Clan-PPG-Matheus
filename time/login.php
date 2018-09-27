 <head>
	<meta charset="UTF-8">
	<title>PPG Clan</title>
	<link rel="stylesheet" href="css/geral.css" type="text/css">
	<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>


 <?php
require('../dts/dbaSis.php');
require('../dts/getSis.php');
require('../dts/setSis.php');
require('../dts/outSis.php');
  // nome , senha , confirma senha 

				if(isset($_POST['sendform'])){
				date_default_timezone_set("Brazil/East");
				$nome   = $_POST['nome'];
				$senha  = $_POST['senha'];
				$senha2  = $_POST['senha2'];
			
                             
	                             
								
	
if(@$nome == ''){
echo'<span class="ms al">Nome é obrigatorio</span>';

}elseif(@$senha != $senha2){
echo'<span class="ms al">Senhas são diferentes</span>';

}else{

$mysql = mysql_query("select * from ppg_play where nome='$nome' and senha='$senha'");
if($mysql == 1){
while($bus = mysql_num_rows($mysql)){
$login = $SESSION  =  $user['user'];
$senha = $SESSION  =  $user['adm'];
$data  =  $SESSION = time();
echo 'tud certo';
}
}else{
header('location:index.php');

}
}
}






								?>

<div class="bloco form" style="display:block">
            	<div class="titulo">Cadastra suario:</div>
                
                <form name="formulario" action="" method="post" enctype="multipart/form-data">
                     <label class="line">
                    	<span class="data">Nome:</span>
                        <input type="text" name="nome" value="" />
                    </label>
					
					<label class="line">
                    	<span class="data">Senha:</span>
                        <input type="text" name="senha" value="" />
						</label> 

                       <label class="line">
                    	<span class="data">Confirma-Senha:</span>
                        <input type="text" name="senha2" value="" />
						</label> 						
                                       
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="sendform" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->