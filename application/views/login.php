<div class="wrapper style1">
				<article id="work">
								<header>
												<h2>Login!</h2>
            <?=validation_errors();?>
								</header>
								<div class="container 50%">
												<section>
																<form method="post" action="login/submit">
																				<div>
																								<div class="row">
																												<div class="6u">
																																<input type="text" name="name" id="userName" placeholder="username or email" value="<?=set_value('userName');?>"/>
																												</div>
																													<div class="6u">
																																<input type="text" name="name" id="password" placeholder="password" />
																												</div>
																								</div>
																								<div class="row">
																												<div class="12u">
																																<ul class="actions">
																																				<li><input type="submit" value="Sign in!" /></li>
																																</ul>
																												</div>
																								</div>
																				</div>
																</form>
																<footer>
																				<div>...or sign in with Facebook!</div>
																				<fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
																</footer>
												</section>
								</div>
				</article>
</div>