<?php	defined('BASEPATH')	OR	exit('No direct script access allowed');	?>
<!-- Nav -->
<nav id="nav">
				<ul class="container">
								<li><a href="home">Deals</a></li>
								<? if (!$this->session->userdata("userLoggedIn")) { ?>
								<li><a href="login">Sign in</a></li>
								<li><a href="signup">Register</a></li>
								<? } else { ?>
								<li><a href="logout">Sign out</a></li>
								<? } ?>
								<li><a href="about">About</a></li>
								<li><a href="contact">Contact</a></li>
				</ul>
</nav>