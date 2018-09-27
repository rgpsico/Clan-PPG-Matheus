	
            
            <div class="bloco home" style="display:block">
            	<div class="titulo">Estat�sticas do site:</div>
                
                <script type="text/javascript" src="https://www.google.com/jsapi"></script>
				<script type="text/javascript">
                  google.load("visualization", "1", {packages:["corechart"]});
                  google.setOnLoadCallback(drawChart);
                  function drawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Year');
                    data.addColumn('number', 'Visitas');
					data.addColumn('number', 'Visitantes');
                    data.addRows([
                      ['01/2012', <?php echo '2350';?>, <?php echo '1350';?>],
					  ['02/2012', <?php echo '2190';?>, <?php echo '1750';?>],
					  ['03/2012', <?php echo '1890';?>, <?php echo '1950';?>],
					  ['M�s atual', <?php echo '752';?>, <?php echo '680';?>]
                    ]);
            
                    var options = {
					  width: 554, height: 200,
                      title: 'Visitas em seu site:',
                      hAxis: {title: 'rel�torio de 3 meses', titleTextStyle: {color: 'red'}},
					  pointSize: 8,
					  focusTarget: 'category'
                    };
            
                    var chart = new google.visualization.LineChart(document.getElementById('chart_divDois'));
                    chart.draw(data, options);
                  }
                </script>
                <div id="chart_divDois" style="width:554px; height:200px; float:left; border:3px solid #CCC; margin-bottom:15px;"></div>
                
                <table width="200" border="0" class="tbdados" style="float:right;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td>Usuários cadastrados:</td>
                    <td>52</td>
                  </tr>
                  <tr>
                    <td>Usuários logados:</td>
                    <td>12</td>
                  </tr>
                  <tr class="ses">
                    <td colspan="2">Sesções:</td>
                  </tr>
                  <tr>
                    <td>Categorias:</td>
                    <td>8</td>
                  </tr>
                  <tr>
                    <td>Páginas:</td>
                    <td>2</td>
                  </tr>
                </table>
                
				<script type="text/javascript" src="https://www.google.com/jsapi"></script>
				<script type="text/javascript">
                  google.load("visualization", "1", {packages:["corechart"]});
                  google.setOnLoadCallback(drawChart);
                  function drawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Task');
                    data.addColumn('number', 'Visitas totais');
                    data.addRows([
                      ['Artigos', <?php echo '48';?>],
                      ['Visitas em artigos', <?php echo '1280';?>],
                      ['Média por artigo', <?php echo '26';?>]
                    ]);
            
                    var options = {
                      title: 'Visitas em seus artigos:'
                    };
            
                    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                  }
                </script>
				
				
		 		<div id="chart_div" style="width:345px; height:141px; float:left; border:3px solid #CCC;"></div>
                
                <div class="sub" style="margin-top:15px;">Artigos:</div>				
                <table width="270" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td>últimas atualizaçõess</td>
                    <td align="center">data</td>
                  </tr>
                  <?php $buscar = read('up_posts',"order by data desc");
				  
				  if(!$buscar){
				  
				  }else{
				  foreach($buscar as $bus):
				  
				  ?>
                  <tr>
                    <td><a href="#" title="ver"><?php echo lmWord($bus['content'],50);?></a></td>
                    <td align="center"><?php echo lmWord($bus['data'],19);?></td>
                  </tr>
                  <?php endforeach; }?>
                </table>
                
               <!-- <table width="270" border="0" class="tbdados" style="float:right;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td>artigos + vistos</td>
                    <td align="center">visitas</td>
                  </tr>
                  <?php ?>
                  <tr>
                    <td><a href="#" title="ver">Novo v�deo de Max Payne 3...</a></td>
                    <td align="center">1.280,00</td>
                  </tr>
                  <?php ?>
                </table>
            </div><!-- /bloco home -->
            
         