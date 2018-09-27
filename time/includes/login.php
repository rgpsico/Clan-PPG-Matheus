

<?php
	
	$mysql = mysql_connect('localhost','root','');
	$select = mysql_select_db('pro_php');
	
	
	                     if(isset($_POST['sendLogin'])){
        $email   = mysql_real_escape_string($_POST['email']);
	    $senha  = md5(mysql_real_escape_string($_POST['senha']));

	
                  $res = mysql_query("select * from up_users where email='$email' and senha='$senha'");
                  if($con =  mysql_num_rows($res) == 1 ){
                  $bus = mysql_fetch_array($res);    
                  $nem = $_COOKIE = $bus['nome'] ;
				  
    session_start();
$user =      $_SESSION  ['user']   =   $bus['nome'];
$id   =      $_SESSION  ['id']    =   $bus['id'];



          $_SESSION  ['login']  =   $bus['nome'];
$email =  $_SESSION  ['email']  =   $bus['email'];
$time  =  $_SESSION  ['tempo']  =   time();
    
	$msg="bem vindo".$nome;
	
  header('location:../index2.php?perfil='.$user.'&galeria='.$user.'&session='.$user.'&email='.$email);  
}else{
    $msg='<span class=error>erro ao logar</span>';
    header('location:../../index.php?msg=').$msg;
    
    
}
}
?>
	

