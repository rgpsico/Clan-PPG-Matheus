<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>rg</title>
<!-- CSS -->
<style type="text/css" media="screen">

</style>
<!-- JavaScripts-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="slider/s3Slider.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#slider').s3Slider({
            timeOut: 9000
        });
    });
</script>
</head>

<body>
  
    <div id="slider">
        <ul id="sliderContent">
           <?php $bu = read('artigos','where public =1 order by id desc  ');
								if(!$bu){
								echo'<span class="ms al">Desculpe Não Temos Nenhum Artigo No momento</span>';

								}else{
								foreach($bu as $read):
								?>
		   <li class="sliderImage">
           <a href="news-single.php?id=<?php echo $read['id']?>"><img src="upload/artigos/<?php echo $read['foto'] ?>" height="400" width="650"alt="1" /></a>
                <span class="top">
				<strong> <?php echo lmWord($read['titulo'],100);?></strong>				
				<p> <?php echo lmWord($read['content'],100);?></p>
				</span>
            </li>
			
			<?php endforeach;}?>
            
            <div class="clear sliderImage"></div>
        </ul>
    </div>
    <!-- // slider -->

</body>
</html>
