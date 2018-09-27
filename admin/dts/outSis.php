<?php
/*
*******************************************
função resulmo de texto
*******************************************
*/
function lmWord($string, $word= '200'){
$string = strip_tags($string);
$count = strlen($string);
if($count<= $word){
return $string;

}else{
$strpos = strrpos(substr($string,0,$word),100);
return substr($string,0,$strpos).'...';

}

}

/*
*******************************************
função de validar cpf
*******************************************
*/




function valCPF($cpf){
$cpf = preg_replace('/[^0-9]/','',$cpf);
$digitoA = 0;
$digitoB = 0;

for($i = 0, $x = 10;  $i <= 8 ; $i++ , $x--){
$digitoA += $cpf[$i] * $x ;

}
for($i = 0, $x = 11; $i <= 9; $i++, $x--){
if(str_repeat($i, 11)==$cpf){
return false;
}
$digitoB += $cpf[$i] * $x;
}
$somaA = (($digitoA%11<2)) ? 0 : 11-($digitoA%11);
$somaB = (($digitoB%11<2)) ? 0 : 11-($digitoB%11);
if($somaA != $cpf[9] || $somaB != $cpf[10]){
return false;


}else{
return true;
}

}





/*
*******************************************
Valida Email
*******************************************



function valMail($email){
if(preg_match('/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/',$email)){
return true;
}else{
return false;
}
}
*/
function valMail($email){
if(preg_match('/^[a-z0-9\_\.\-]+@[a-z0-9\_\.\-]*[a-z0-9\_\.\-]+\.[a-z]{2,4}$/',$email)){
return true;
}else{
return false;
}
}


/*
*******************************************
Get Home
*******************************************

function setUrl($string){
$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
$b = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr ';     
$string = utf8_decode($string);
$string = strtr($string,$utf8_decode($a));
}
*/




/*
*******************************************
validando email
*******************************************
*/

 function sendMail($assunto,$mensagem,$remetente,$nomeRemetente,$destino,$nomeDestino,$reply=NULL,$replyNome=NULL){
 
require_once('mail/class.phpmailer.php'); //Include pasta/classe do PHPMailer

$mail = new PHPMailer(); //INICIA A CLASSE
$mail->IsSMTP(); //Habilita envio SMPT
$mail->SMTPAuth = true; //Ativa email autenticado
$mail->IsHTML(true);


$mail->Host = MAILHOST; //Servidor de envio
$mail->Port = MAILPORT; //Porta de envio
$mail->Username = MAILUSER; //email para smtp autenticado
$mail->Password = MAILPASS; //seleciona a porta de envio


$mail->From = utf8_decode($remetente); //remtente
$mail->FromName = utf8_decode($nomeRemetente); //remtetene nome
if($reply != NULL){
$email->addReplyto(utf8_decode($reply),utf8_decode($replyNome));
}
//7,27

$mail->Subject = utf8_decode($assunto); //assunto
$mail->Body = utf8_decode($mensagem); //mensagem
$mail->AddAddress(utf8_decode($destino),utf8_decode($nomeDestino)); //email e nome do destino
if($mail->Send()){
return true;
}else{
return false;
}
}
/*
*******************************************
função formata data em timestamp
*******************************************
*/

function formDate($data){
$timestamp = explode(" ",$data);
$getData = $timestamp[0];
$getTime = $timestamp[1];

$setData = explode('/',$getData);
$dia = $setData[0];
$mes = $setData[1];
$ano = $setData[2];
if(!$getTime):
$getTime = date('H:i:s');
endif;
$resultado = $ano.'-'.$mes.'-'.$dia;
return $resultado ;
print_r($timestamp);
}

/*
*******************************************
Monage estatisticas
*******************************************
*/


function viewManage($times = 600){

$selMes = date('m');
$selAno = date('Y');
  if(empty($_SESSION['startView']['sessao'])){
   $_SESSION['startView']['sessao'] = session_id();
   $_SESSION['startView']['ip']  =  $_SERVER['REMOTE_ADDR'];
   $_SESSION['startView']['url'] =  $_SERVER['PHP_SELF'];
   $_SESSION['startView']['time_end'] =  time() + $times;
   create('up_views_online',$_SESSION['startView']);
   
   $readViews = read('up_views', " WHERE mes = '$selMes' AND ano='$selAno'");
   if(!$readViews){
   $createViews = array('mes'=>$selMes,'ano' =>$selAno,"visitas"=>'1');
   create('up_views',$createViews);
   }else{
   foreach($readViews as $views);
   if(empty($_COOKIE['startView'])){
   $updateViews = array(
   'visitas'=>$views['visitas']+1,
   'visitantes'=>$views['visitantes']+1
   );
   update('up_views',$updateViews,"mes = '$selMes' AND ano ='$selAno'");
   setcookie('startView',time(),time()+60*60*24,'/');
   }else{
   $updateVisitas = array('visitas'=>$views['visitas']+1);
   update('up_views',$updateVisitas,"mes = '$selMes' AND ano ='$selAno'");
   
       }
   }
}else{
$readPageViews = read('up_views',"WHERE mes = '$selMes' AND ano = '$selAno'");
if($readPageViews){
foreach($readPageViews as $rpgv);
$updatePageViews = array('pageviews' => $rpgv['pageviews']+1);
  update('up_views',$updatePageViews,"mes = '$selMes' AND ano ='$selAno'");

}


$id_sessao = $_SESSION['startView']['sessao'];
if($_SESSION['startView']['time_end'] <= time()){
delete('up_views_online' , "sessao = '$id_sessao' OR time_end <= time(NOW())");
unset($_SESSION['startView']);

      }else{
  $_SESSION['startView']['time_end'] =  time() + $times;
  $timeEnd = array('time_end' => $_SESSION['startView']['time_end']);
  update('up_views_online',$timeEnd,"sessao = '$id_sessao'");
       }
	 


   }
 
}

/*
function readPaginator($tabela, $cond , $maximos , $link , $pag , $width=  NULL , $maxlinks = 4 ){
$readPaginator = read("$tabela", "$cond");
$total = count($readPaginator);
if($total > $maximos){
$paginas = ceil($total/$maximos);
if($width){
echo'<div class="paginator" style"width='.$width.'">';
}else{
echo'<div class="paginator">';
}
echo '<a href="'.$link.'1">primeira Pagina</a>';
for($i = $pag - $maxlinks; $i <= $pag-1;$i++){
if($i >=1){
echo'<a href="'.$link.$i.'">'.$i.'</a>';

}

}
echo '<span class="atv">'.$pag.'</span>';
for($i = $pag + 1; $i <= $pag + $maxlinks; $i++){
if($i <= $paginas){
echo'<a href="'.$link.$i.'">'.$i.'</a>';

}

}

echo'<a href="'.$link.$paginas.'/">Ultima Pagina</a>';

echo '</div><!--/paginator -->';
}

} */
function readPaginator($tabela, $cond , $maximos , $link , $pag ,$width=NULL , $maxlinks = 2 ){
$readPaginator = read("$tabela", "$cond");
$total = count($readPaginator);
if($total > $maximos){
$paginas = ceil($total/$maximos);
if($width){
echo'<div class="paginator" style"width='.$width.'">';
}else{
echo'<div class="paginator">';
}
echo '<a href="'.$link.'1">primeira Pagina </a>' ;
for($i = $pag - $maxlinks; $i <= $pag-1;$i++){
if($i >=1){
echo'<a href="'.$link.$i.'">'. $i.'</a>';

}

}
'<span class="atv">'.$pag.'</span>';


for($i = $pag + 1; $i <= $pag + $maxlinks; $i++){
if($i <= $paginas){
echo'  <a href="'.$link.$i.'">'.$i.'</a>';

}

}

echo'<a href="'.$link.$paginas.'">Ultima Pagina</a>';

echo '</div><!--/paginator -->';
}

}


?>

