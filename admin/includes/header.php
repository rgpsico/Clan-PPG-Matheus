<div id="header">
<?php
$config = read("config");

if(!$config){
echo'Erro ao conectar';
}else{
 foreach($config as $conf){?>
    	<img src="../upload/user/<?php echo $conf['logo']?>"  height="100" width="100"alt="Site Admin" title="Site Admin" />
        <?php }}?>
        	<div class="coom">
                <a href="index2.php" title="painel home" class="btnalt">painel home</a>
                <a href="../" title="ver site" target="_blank" class="btnalt">ver site</a>
                <a href="index2.php?basico=1" title="ver site"  class="btnalt">Menu Avançado</a>
                <a href="logoff.php" title="deslogar" class="btnalt">deslogar</a>
        	</div><!-- /comm -->
    </div><!-- /header -->