<?php include('includes/header.php');?>
		<?php include('includes/menu.php');?>
		
		
		<script>
		$("document").ready(function()){
		$("form").validade()
		}
		 </script>
		

<?php
                  
				  
			/*	  
if(isset($_POST['send'])){





$nome  = $_POST['nome'];
//$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmasenha = $_POST['confirmasenha'];
$nivel = 2 ;



$tmp  = $_FILES['file']['tmp_name'];
$foto = $_FILES['file']['name'];
$type = $_FILES['file']['type'];	
$pasta =  'time/upload/';

$permitido =  array('image/jpg','image/jpeg','image/pjpeg','image/png');
if(!in_array($type,$permitido)){

}else{
if($nome == ''){
echo"erro o nome é obrigatorio"; 



}elseif($senha  == '' && $senha != $confirmasenha){
echo 'campo senha vazio ou as senhas não conferem'; 

}else{
move_uploaded_file($tmp,$pasta.$foto);

$mysql = mysql_query("insert into up_users (nome , email , senha ,foto, nivel)Values('$nome','111','$senha','$foto','$nivel')");
if(!$mysql){
echo'não foi cadastrado ';
}else{
echo'cadastrado com sucesso';

}

}


}
}
*/
?>			

<div class="body about">
				<div>
					<span>PPG</span>
			

<script>




</script>
		
<div id="cadastro">			
		   <form name="" method="post"  enctype="multipart/form-data">	
           <label class="cadastro-nome">nome</label>
           <input type="text" name="nome" id="nome" class="required">
  <br>
           <label class="cadastro-senha" id="senha">Senha</label>
            <input type="text" name="senha">
<br>
             <label class="cadastro-c-senha">confirmaSenha</label>
               <input type="text" name="confirmasenha"><br>
           
             
            <input type="submit" id="bt-cadastro" name="send">
           </form>
  </div>


				</div>
				
				
				<?php include('includes/side-bar.php');?>
			<?php include('includes/footer.php');?>