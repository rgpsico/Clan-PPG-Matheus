<?php include"conexao/config.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript">
  /// FUNÇÃO POPUP ALTERAR FOTO
  $(document).ready(function() {
	  $(".img_2").click(function() {
			  var tabBox_1 = (".box_popup");
		  $(tabBox_1).fadeIn(300);
			  var popMargTop = ($(tabBox_1).height() + 24) / 2; 
			  var popMargLeft = ($(tabBox_1).width() + 24) / 2; 
		  $(tabBox_1).css({ 
			  'margin-top' : -popMargTop,
			  'margin-left' : -popMargLeft
		  });
			  $("body").append('<div id="mask"></div>');
			  $("#mask").fadeIn(300);
			  		$.post("ajax/imagefile.php", function(img){
		  		    complete:$(".bp_load").fadeIn(0).html(img);
				});
		  return false;
	  });
	  $(".bp_fechar").live('click', function() { 
		  $("#mask , #box_popup").fadeOut(300 , function(){
			  $("#mask").remove();
			  $("#box_popup").remove();
			  $("body").append('<div id="box_popup" class="box_popup"></div>');
			  $("#box_popup").append('<div class="bp_titulo"><div class="bp_titulo_1">Alterar Foto</div><span class="bp_fechar"><img src="img/fechar.png" alt="" /></span></div>');
			  $("#box_popup").append('<div class="bp_load"><div class="bp_load_1"><img src="img/loader.gif" alt="" />Carregando...</div></div>');
		  }); 
		  return false;
	  });
  });
  
  /// ENVIA A IMAGEM
  $(document).ready(function(){ 
	$('#photoimg').live('change', function(){ 
	  $(".preview").html('');
	  $(".fileinput_button").hide(0);
	  $(".fileinput_load").fadeIn(0);
	  $(".fileinput_load").html('<img src="img/loader-2.gif" alt="" />');
	  $("#imageform").ajaxForm({
		target: '.preview'
	  }).submit();
	});
  }); 
</script>
</head>

<body>
<?php
/// ID SESSÃO
$id_session = $_GET['id'];

$sql = mysql_query("SELECT * FROM tab_upload WHERE id = '$id_session'") or die("Erro ao selecionar");
	   $res = mysql_fetch_array($sql);
?>
<div id="box_popup" class="box_popup">
    <div class="bp_titulo">
        <div class="bp_titulo_1">Alterar Foto</div><!--bp_titulo_1-->
        <span class="bp_fechar"><img src="img/fechar.png" alt="" /></span>  
    </div>
    
    <div class="bp_load">
        <div class="bp_load_1"><img src="img/loader.gif" alt="" /> Carregando...</div><!--bp_load_1-->
    </div>
</div><!--box_popup-->
  
<div id="conteudo">
  <div class="titulo"></div>
  <div class="bloco">
      <div class="img"><img class="img_1" src="<?php echo "upload/thumb/".$res['img'];?>" alt="" /></div>    
      <img class="img_2" src="img/alterar-foto.png" alt="" />
  </div>
</div><!--conteudo--> 
</body>
</html>