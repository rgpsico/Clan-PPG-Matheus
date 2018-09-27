<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="pt-br">
<head>
	
	
<?php 
ob_start();
include('admin/dts/dbaSis.php');
//require('./_app/Config.inc.php');
//$Session = new Session;






                    $read = read('up_posts');
                   
                    
                        foreach ($read as $re){

?>
<!--[if !IE]><!-->


  <link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/home.css" type="text/css">
<!--<![endif]-->
  <!--[if IE]>

<link href="css/ie.css" rel="stylesheet" type="text/css"> 
<![endif]-->
	 
	<link href="upload/user/<?php echo $res['favicon']?>" rel="shortcut icon" type="image/x-icon">

	<?php }?>

	<link rel="stylesheet" href="galeria/index_files/vlb_files1/vlightbox1.css" type="text/css" />
	<link rel="stylesheet" href="galeria/index_files/vlb_files1/visuallightbox.css" type="text/css" media="screen" />
       
        <script src="galeria/index_files/vlb_engine/jquery.min.js" type="text/javascript"></script>
	<script src="galeria/index_files/vlb_engine/visuallightbox.js" type="text/javascript"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js" type="text/javascript"></script>

              

	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '243100655849107', // App ID
      channelUrl : 'http://rgpsico.comuv.com/matheus/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional initialization code here
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/pt_BR/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>



<?php


if(!isset($_GET['id'])){
echo'<title>Favela 10 </title>';

?>

<meta property="og:locale" content="pt_BR">
 
<meta property="og:url" content="<?php echo BASE ?>">
 
<meta property="og:title" content="Favela 10">
<meta property="og:site_name" content="Seu portal de noticias das favelas">
 
<meta property="og:description" content="Saiba tudo que acontece de bom nas comunidades cariocas">
 
<meta property="og:image" content="upload/artigos/<?php echo $read['foto'] ?>">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="300px"> 
<meta property="og:image:height" content="400px"> 
 

 
<meta property="og:type" content="website">

<?php

}else{
$id = $_GET['id'];


                    $post = new Read;
                    $post->ExeRead('artigos',"where id='$id'");
                    if ($post->getResult()){
                        foreach ($post->getResult() as $re){

?>
<title><?php echo $re['titulo']; ?></title> 

 
<meta property="og:type"         content="<?php echo $re['titulo']?>">
<meta property="article:author"  content="<?php echo $re['autor'] ?>">
<meta property="article:section" content="<?php echo $re['categoria']?>">
<meta property="article:tag"     content="<?php echo $re['tags']?>">
<meta property="article:published_time" content="date_time">
<meta property="og:image"        content="<?php echo BASE ?>/upload/artigos/<?php echo $re['foto'] ?>">
<meta property="og:image:type"   content="image/jpeg">
<meta property="og:image:width"  content="300px"> 
<meta property="og:image:height" content="400px"> 


<?php








}


}



					}


					
					?>



</head>
<body>
	<div class="background">
		<div class="page">
		<div id="fb-root"></div>








<?php

$id = 1;
setViews($id);
date_default_timezone_set('UTC');
$mesAtual= date('m');
$mesExt = array(
"01" =>"jan",
"02" =>"fev",
"03" =>"mar",
"04" =>"abr",
"05" =>"maio",
"06" =>"jun",
"07" =>"jul",
"08" =>"agos",
"09" =>"set",
"10" =>"out",
"11" =>"nov",
"12" =>"dez"
);

?>