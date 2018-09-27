  <?php

  // nome , senha , confirma senha 

				if(isset($_POST['sendform'])){
				date_default_timezone_set("Brazil/East");
				
                                   
                                   $f   = htmlspecialchars($_POST['nome']);
                                   $f   = $_POST['senha'];
                                   $f = htmlspecialchars($_POST['senha-confirma']);
								  
	                             
								
	
if(@$nome == ''){
echo'<span class="ms al">Nome é obrigatorio</span>';

}elseif(@$nome != $confirmasenha){
echo'<span class="ms al">Senhas são diferentes</span>';

}else{

$create = create('',$f);
if($create){
echo"Cadastrado com sucesso";
}else{

echo" nada Cadastrado ";
}


}
								?>

