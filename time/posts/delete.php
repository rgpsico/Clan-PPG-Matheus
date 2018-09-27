

<?php







if(isset($_GET['del'])){
require('../dts/dbaSis.php');
require('../dts/outSis.php');
require('../dts/getSis.php');





$id = $_GET['del'] ;
//delete($tabela,$where)
$del = delete('mensagem',"id='$id'");
if($del){

echo '
<script>
window.setTimeout("history.back(0)", 000);
</script> 



';
clearstatcache();
}else{
echo'não foi deletado';
}
}

?>





















