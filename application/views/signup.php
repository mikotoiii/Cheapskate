<div class="wrapper style1">
    <article id="work">
        <header>
            <h2>Signup!</h2>
            <div class="alert-error">
                
                <?= validation_errors(); ?>
            </div>
            <div class="alert">
                <?php echo $message_display; ?>
            </div>
        </header>
        <div class="container 50%">
            <section>
                <form method="post" action="/signup">
                    <div>
                        <div class="row">
                            <div class="12u">
                                <input type="text" name="username" id="username" placeholder="username" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="12u">
                                <input type="text" name="email" id="email" placeholder="email" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="6u 12u(mobile)">
                                <input type="text" name="nameFirst" id="nameFirst" placeholder="first name" />
                            </div>
                            <div class="6u 12u(mobile)">
                                <input type="text" name="nameLast" id="nameLast" placeholder="last name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="6u 12u(mobile)">
                                <input type="password" name="password1" id="subject" placeholder="password" />
                            </div>
                            <div class="6u 12u(mobile)">
                                <input type="password" name="passwordconf" id="subject" placeholder="confirm password" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="6u">
                                <input type="text" name="dob" id="dob" placeholder="birth date" />
                            </div>
                            <div class="6u">
                                <label for="dob">(...helps us show you birthday-specific deals!)</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="12u">
                                <ul class="actions">
                                    <li><input type="submit" value="Sign up!" /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
                <footer>
                    <div>...or register with Facebook!</div>
                    <fb:login-button scope="public_profile,email,user_friends" onlogin="checkLoginState();"></fb:login-button>
                </footer>
            </section>
        </div>
    </article>
</div>

<script type='text/javascript'>
$(function() {
    $("#dob").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-70:-19",
        defaultDate: "-19y"
    });
});
</script>