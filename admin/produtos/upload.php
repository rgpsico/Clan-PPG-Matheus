if(isset($_POST['send'])){

<?php
require('../dts/dbaSis.php');

                                    $id         =   $_POST['id'];
                                    $nome       =   htmlspecialchars($_POST['nome']);
								  //$tags       =   htmlspecialchars($_POST['tags']);			 
								    $link       =   htmlspecialchars($_POST['link']);
                                    
								    $foto   =   $_FILES['img']['name'];
								     $pasta     =   '../upload/produtos/';
								  // $pastat    =   '../upload/artigos/thumb/';
								     $type      =   $_FILES['img']    ['type'];
								     $tmp       =   $_FILES['img']['tmp_name'];
									
									
									
									
							       


$update =move_uploaded_file($tmp,$pasta.$fotoName); // mysql_query("UPDATE produtos SET  nome='$nome' , link='$link' ,  foto='$foto' where id='$id'");
if($update){
//http://127.0.0.1/passeio/admin/index2.php?exe=posts/edi&id=1

$msg ='Atualisado com Suceso';

header('location:'.BASE.'/admin/index2.php?exe=produtos/ed-produtos&id='.$id.'&msg='.$msg);


}else{
$msg ='Não foi atualisado ';
header('location:'.BASE.'index2.php?exe=produtos/ed-produtos&id='.$id.'&erro='.$msg);


}
}
?>