<div id="clear">
</div>
</div>
<div class="footer">
				<div>
					<ul>
						<li class="selected">
							<a href="index.php">Home</a>|
						</li>
						<?php
					
$read = read('up_cat');
foreach($read as $re){
?>
					<li>
						<a href="news.php?cat=<?php echo $re['nome']?>"><?php echo $re['nome']?></a>
						
					</li>
					<?php }?>
					</ul>
					<p>
						&#169; PPG 2015. All Rights Reserved
					</p>
				</div>
				<div class="connect">
					<span>Follow Us</span> <a href="" id="fb">fb</a> <a href="" id="twitter">twitter</a> <a href="" id="googleplus">google+</a> <a href="" id="contact">contact</a>
				</div>
			</div>
		</div>
	</div>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51844904-2', 'comyr.com');
  ga('send', 'pageview');

</script>
</body>

