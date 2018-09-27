
<?php
if(isset($_GET['del'])){
$del = $_GET['del'];


$delete =  delete("up_cat" ,"id=$del");
if(!$delete){
$msg ='Erro ao Excluir';
header('location:http://127.0.0.1/admin/index2.php?exe=categoria/categoria&id='.$id.'&msg='.$msg);


}else{

$msg ='Excluido com sucesso';
header('location:http://127.0.0.1/admin/index2.php?exe=categoria/categoria&id='.$id.'&erro='.$msg);



}
}








if(isset($_POST['send'])){


require('../dts/dbaSis.php');

                                    $id         = $_POST['id'];
                                    $nome       = htmlspecialchars($_POST['nome']);
								    $tags       = htmlspecialchars($_POST['tags']);
									 
									 
								     $url       = str_replace(' ','-',$nome);
									
								   
								   
								
								   
                                   
                                   $content    =   htmlspecialchars($_POST['content']);
								   $data       =   htmlspecialchars($_POST['data']);
								   $cat        =   htmlspecialchars($_POST['cat']);
                                
							       


$update = mysql_query("UPDATE up_cat SET  nome='$nome' , url='$url' , content='$content' , tags='$tags' , data='$data' where id='$id'");
if($update){
//http://127.0.0.1/passeio/admin/index2.php?exe=posts/edi&id=1

$msg ='Atualisado com Suceso';
header('location:http://127.0.0.1/admin/index2.php?exe=categoria/edica&id='.$id.'&msg='.$msg);


}else{
$msg ='Não foi atualisado ';
header('location:http://127.0.0.1/admin/index2.php?exe=categoria/edica&id='.$id.'&erro='.$msg);


}
}





if(isset($_GET['del_pai'])){
$del = $_GET['del_pai'];


$delete =  delete("up_cat" ,"id=$del");
if(!$delete){
$msg ='Erro ao Excluir';
header('location:http://127.0.0.1/admin/index2.php?exe=categoria/subcategoria&id='.$id.'&msg='.$msg);


}else{

$msg ='Excluido com sucesso';
header('location:http://127.0.0.1/admin/index2.php?exe=categoria/subcategoria&id='.$id.'&erro='.$msg);



}
}













?>





