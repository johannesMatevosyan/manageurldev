</header>

<div id="login_form">
    <h1>Login</h1>
<?php echo form_open('login/validate_credentials'); ?>
    <label>Username</label>&nbsp;&nbsp;
    <input type="text" name="username" id="login_username"><br>
    <label>Password</label>&nbsp;&nbsp;
    <input type="password" name="password" id="login_password"><br><br>
    <input type="submit" id="login_submit" class="yellowButton" value="Login">&nbsp;&nbsp;&nbsp;
<?php echo form_close(); ?>
    <br>
<?php echo anchor('login/signup', 'Create Account'); ?>
</div>