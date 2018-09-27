
<?php
if(isset($_GET['del'])){
$del =  $_GET['del'];


$delete =  delete("produtos" ,"id=$del");
if(!$delete){
$msg ='Erro ao Excluir';
header('location:http://127.0.0.1/admin/index2.php?exe=produtos/ed-produtos&id='.$id.'&msg='.$msg);


}else{

$msg ='Excluido com sucesso';
header('location:http://127.0.0.1/admin/index2.php?exe=produtos/ed-produtos&id='.$id.'&erro='.$msg);



}
}








if(isset($_POST['send'])){


require('../dts/dbaSis.php');

                                    $id         =   $_POST['id'];
                                    $nome       =   htmlspecialchars($_POST['nome']);
								  //$tags       =   htmlspecialchars($_POST['tags']);			 
								    $link       =   htmlspecialchars($_POST['link']);
 
									$file = $_FILES['img'];
									$name = $file['name'];
									$type = $file['type'];
									$tmp  = $file['tmp_name'];
									
								   $pasta    =  '../upload/produtos/';
							       


$update = mysql_query("UPDATE produtos SET  nome='$nome' , link='$link' ,  foto='$name' where id='$id'");
if($update){
//http://127.0.0.1/passeio/admin/index2.php?exe=posts/edi&id=1
move_uploaded_file($tmp,$pasta.$nom);
$msg ='Atualisado com Suceso';

header('location:'.BASE.'/admin/index2.php?exe=produtos/ed-produtos&id='.$id.'&msg='.$msg);


}else{
$msg ='Não foi atualisado ';
header('location:'.BASE.'index2.php?exe=produtos/ed-produtos&id='.$id.'&erro='.$msg);
move_uploaded_file($tmp,$pasta.$nom);


}

}



if(isset($_GET['del_pai'])){
$del = $_GET['del_pai'];


$delete =  delete("produtos" ,"id=$del");
if(!$delete){
$msg ='Erro ao Excluir';
header('location:'.BASE.'/admin/index2.php?exe=categoria/subcategoria&id='.$id.'&msg='.$msg);


}else{

$msg ='Excluido com sucesso';
header('location:'.BASE.'/admin/index2.php?exe=categoria/subcategoria&id='.$id.'&erro='.$msg);



}
}













?>





