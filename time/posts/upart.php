



<?php




if(isset($_POST['sendCat'])){




                                   $id         = $_POST['id'];
                                   $nome       = htmlspecialchars($_POST['nome']);
								   
								   
								   $url = str_replace('','-',$nome);
								   
                                   
                                   $content    =htmlspecialchars($_POST['content']);
								   $data       =   htmlspecialchars($_POST['data']);
								   $cat        = htmlspecialchars($_POST['cat']);
                                
							


$update = mysql_query("UPDATE up_cat SET  id='$id' , nome ='$nome' ,url='$url' , content='$content',
tags='$tags' , data ='$data' where id='$id'");
if(!$update){
//http://127.0.0.1/passeio/admin/index2.php?exe=posts/edi&id=1

$msg ='Atualisado  Suceso';
header('location:'.BASEA.$id.'&msg='.$msg);


}else{
$msg ='Não foi atualisado ';
header('location:'.BASEA.$id.'&msg='.$msg);


}
}






?>

