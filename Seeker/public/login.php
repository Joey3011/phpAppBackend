<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/login.php';
if (is_user_logged_in()) {
    redirect_to('index');
  }
?>
<?php view('header-login', ['title' => 'Login']) ?>
<div class="form-menu">
    <?php flash() ?>
    <?php if (isset($errors['login'])) : ?>
        <div class="error alert-error">
        <small><?= $errors['login'] ?></small>
        </div>  
    <?php endif  ?>
    <form class="form-elements" action="login" method="post">
    <h4 class="form-htag">Login</h4>
        <div>
            <label class="form-label" for="username">Username:</label>
            <input class="form-input" type="text" name="username" id="username" value="<?= $inputs['username'] ?? '' ?>" placeholder="Username or Email" autocomplete="on">
            <small><?= $errors['username'] ?? '' ?></small>
        </div>
        <div>
            <label class="form-label" for="password">Password:</label>
            <input class="form-input" type="password" name="password" id="password" placeholder="Password" >
            <small><?= $errors['password'] ?? '' ?></small>
        </div>
        <section class="form-section">
            <button class="form-button" type="submit">Login</button>
        </section><br />
        <a class="form-link" href="reset_password">Forgot Password?</a>
    </form>
</div>
<?php view('footer-content') ?>