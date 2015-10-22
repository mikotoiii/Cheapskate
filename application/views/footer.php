<?php	defined('BASEPATH')	OR	exit('No direct script access allowed');	?>
<!-- Contact -->
				<div class="wrapper style4">
								<article id="contact" class="container 75%">
												<header>
																<h2>We get cool online.</h2>
																<p>I swear to GOD we will go on social media one day.</p>
												</header>
												<div>
																<div class="row">
																				<div class="12u">
																								<hr />
																								<h3>Find me on ...</h3>
																								<ul class="social">
																												<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
																												<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
																												<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
																												<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
																												<li><a href="#" class="icon fa-tumblr"><span class="label">Tumblr</span></a></li>
																												<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
																												<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
																								</ul>
																								<hr />
																				</div>
																</div>
												</div>
												<footer>
																<ul id="copyright">
																				<li>&copy; Studio Boytimes. All rights reserved.</li><li>Design: <a href="http://suck.net">Sean Boyer</a></li>
																</ul>
												</footer>
								</article>
				</div>
				<!-- Scripts -->
				<script src="assets/js/vendor/jquery-1.9.1.min.js"></script>
				<script src="assets/js/vendor/skel.min.js"></script>
				<script src="assets/js/vendor/skel-viewport.min.js"></script>
				<script src="assets/js/util.js"></script>
				
				<? foreach ($javascripts as $js) {
								$external = (stripos($js, '//') !== false);
				?>
				<script type="text/javascript" src="<?=($external ? '' : 'assets/js/') . $js . ($external ? '' : '.js');?>"></script>
				<? } ?>
</body>
</html>