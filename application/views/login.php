<div class="wrapper style1">
				<article id="work">
								<header>
												<h2>Login!</h2>
            <div class="alert-error">
                <?= validation_errors(); ?>
            </div>
								</header>
								<div class="container 50%">
												<section>
																<form method="post" action="/login">
																				<div>
																								<div class="row">
																												<div class="6u">
																																<input type="text" name="username" id="username" placeholder="username or email" value="<?= set_value('username'); ?>"/>
																												</div>
                            <div class="6u">
																																<input type="password" name="password" id="password" placeholder="password" />
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