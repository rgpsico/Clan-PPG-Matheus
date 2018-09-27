<ul class="nav">
        	<!--<li class="tt"><span>Artigos</span>
            	<ul class="sub">
                	<li><a href="index2.php?exe=posts/create" title="Criar artigo">Criar artigo</a></li>
                    <li><a href="index2.php?exe=posts/artigos" title="Editar artigo">Editar artigos</a></li>
                    <li><a href="index2.php?exe=posts/categoria" title="Categorias">Categorias</a></li>
                </ul>
            </li>-->
            <li class="tt"><span>Paginas</span>
            	<ul class="sub">
                <li><a href="index2.php?exe=includes/quem"     title="Home"> Quem somos</a></li>
                <li><a href="index2.php?exe=posts/contato"     title="Contato">Contato</a></li>
				<li><a href="index2.php?exe=galeria/galcreate" title="Galeria">Criar Galeria</a></li>
				<li><a href="index2.php?exe=galeria/gal_edit"  title="Galeria">Editar Galeria</a></li>
				
				<li><a href="index2.php?exe=config/config&editar=1"     title="Galeria">Config do site</a></li>
						
                </ul>
				
				  <li class="tt"><span>Videos</span>
            	<ul class="sub">
                		<li><a href="index2.php?exe=videos/create_videos" title="Enviar Videos">Enviar Video</a></li>
                        <li><a href="index2.php?exe=videos/listas_video"     title="Editar Videos">Editar Videos</a></li>                
                  
						
                </ul>
				
				
				
				
				  <li class="tt"><span>publicidade Home</span>
            	<ul class="sub">
                	<li><a href="index2.php?exe=publi/publi_create" title="criar anucio na pagina home">Criar Anucio Home</a></li>
                    <li><a href="index2.php?exe=publi/pu_edit" title="troque anucios , esclua anucios">Editar Home</a></li>
					  </ul>
					

					</li>
                  
                   <li class="tt"><span>publicidade rodape</span>
					<ul class="sub">
					
					
					
					<li><a href="index2.php?exe=publi/ro_create" title="criar anucio para o rodape">Criar Anucio rodape</a></li>                  
				    <li><a href="index2.php?exe=publi/ro_edit" title="edite anucio rodape">Editar An Rodape</a></li>
				  	<li><a href="index2.php?exe=publi/ro_create_down" title="criar anucio para o rodape">Criar An rodape baixo</a></li>
					 <li><a href="index2.php?exe=publi/ro_edit_down" title="edite anucio rodape">Editar abaixo Rodape</a></li>
					
					   
						
                </ul>
            </li>
			
			
			
            <li class="tt"><span>Usuarios</span>
            	<ul class="sub">
				
                	<li><a href="index2.php?exe=user/editar_user&editar=<?php echo $_SESSION['autUser']['id']?>" title="Perfil">Meu perfil</a></li>
                    <li><a href="index2.php?exe=user/create_user" title="Criar Usuário">Criar usuario</a></li>
                    <li><a href="index2.php?exe=user/ger_user" title="Gerenciar Usuário">Gerenciar usuarios</a></li>
                </ul>
            </li>
        </ul><!-- /nav -->