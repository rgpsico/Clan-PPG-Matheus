<?php
@require('iniSis.php');
$con  = mysql_connect('localhost', 'root' , '') or die('erro ao conectar'.mysql_error());
$dbsa = mysql_select_db('admin') or die ('erro ao selecionar'.mysql_error());

/*******************************************
função de selecionar banco
*******************************************
*/

function artigos($cond,$campo,$link){

$cat = $cate = read("artigos","$cond");			
						if(!$cate){
						echo'Não Temos Artigo';
						
						}else{
						foreach($cate as $cat){
						
						$keys = array_keys($cat);	
                        						
						
						$val     = array(
						$id      = $cat['id'],					
						$titulo  = $cat['titulo'],
						$url     = $cat['url'],
						$content = $cat['content'],
						$tags    = $cat['tags'],
						$data    = $cat['data'],
						$public  = $cat['public'],
						$autor   = $cat['autor'],
						$categoria = $cat['categoria'],
					    $foto =  $cat['foto'],
						$videos = $cat['videos']
						
						);
						
						
						print_r($$campo);
					
						
						

}
}

}
    
 //condição , campo , link 
//artigos("order by id desc limit 1",'id','link') ;
//condição string com aspas simples cond com sem aspas
// artigos("where url='$id' ",'titulo','')

//nome da tabela , codinção e ordem e nome do campo pra ser selecionado ,
//cat('up_cat','limit 1','nome','pagina para onde vai') ;



function categoria($titulo,$cond,$campo,$link){

$cat = $cate = read("$titulo","$cond");			
						if(!$cate){
						echo'Não Temos Artigo';
						
						}else{
						foreach($cate as $cat){
						
						$keys = array_keys($cat);	
                        						
						
						$val     = array(
						$idp = $cat['id'],
						$id_pai  = $cat['id_pai'],
						$nome    = $cat['nome'],
						$url     = $cat['url'],
						$content = $cat['content'],
						$tags    = $cat['tags'],
						$data    = $cat['data']
						);
						
						
						echo'<li><a href="'.$link.'">';
						print_r($$campo) ;
						 echo'</a></li> ';
						 echo'<li class="divider"></li>';
						
						

}
}

}

//nome da tabela , codinção e ordem e nome do campo pra ser selecionado ,
//cat('up_cat','limit 1','nome','pagina para onde vai') ;


?>