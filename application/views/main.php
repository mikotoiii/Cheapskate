<?php	defined('BASEPATH')	OR	exit('No direct script access allowed');	?><!DOCTYPE HTML>
<html>
				<head>
								<title>Cheapskate</title>
								<meta charset="utf-8" />
								<meta name="viewport" content="width=device-width, initial-scale=1" />
								<link rel="stylesheet" href="css/flexslider.css" type="text/css">
								<link rel="stylesheet" href="css/main.css">
								<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
				</head>
				<body>

								<!-- Nav -->
								<nav id="nav">
												<ul class="container">
																<li><a href="#top">Sign in</a></li>
																<li><a href="#work">Register</a></li>
																<li><a href="#portfolio">About</a></li>
																<li><a href="#contact">Contact</a></li>
												</ul>
								</nav>

								<?=$childOutput;?>

								<!-- Contact -->
								<div class="wrapper style4">
												<article id="contact" class="container 75%">
																<header>
																				<h2>Have me make stuff for you.</h2>
																				<p>Ornare nulla proin odio consequat sapien vestibulum ipsum sed lorem.</p>
																</header>
																<div>
																				<div class="row">
																								<div class="12u">
																												<form method="post" action="#">
																																<div>
																																				<div class="row">
																																								<div class="6u 12u(mobile)">
																																												<input type="text" name="name" id="name" placeholder="Name" />
																																								</div>
																																								<div class="6u 12u(mobile)">
																																												<input type="text" name="email" id="email" placeholder="Email" />
																																								</div>
																																				</div>
																																				<div class="row">
																																								<div class="12u">
																																												<input type="text" name="subject" id="subject" placeholder="Subject" />
																																								</div>
																																				</div>
																																				<div class="row">
																																								<div class="12u">
																																												<textarea name="message" id="message" placeholder="Message"></textarea>
																																								</div>
																																				</div>
																																				<div class="row 200%">
																																								<div class="12u">
																																												<ul class="actions">
																																																<li><input type="submit" value="Send Message" /></li>
																																																<li><input type="reset" value="Clear Form" class="alt" /></li>
																																												</ul>
																																								</div>
																																				</div>
																																</div>
																												</form>
																								</div>
																				</div>
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
								<script src="js/vendor/jquery-1.9.1.min.js"></script>
								<script src="js/vendor/skel.min.js"></script>
								<script src="js/vendor/skel-viewport.min.js"></script>
								<script src="js/util.js"></script>
								<script src="js/main.js"></script>

								<script src="js/plugins.js"></script>
								<script src="js/testData.js"></script>

								<script src="js/vendor/jquery.flexslider.js"></script>
								<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
								<!--<script type="text/javascript" src="js/maps.js"></script>-->
								<script type="text/javascript" src="js/directions.js"></script>
								<script type="text/javascript" src="js/vendor/jquery.starRating.js"></script>
								
				</body>
</html>