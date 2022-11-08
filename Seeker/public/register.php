<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/register.php';
require_login();
?>
<?php view('header-content', ['title' => 'Sign Up']) ?>
<br /><br />
<div class="form-menu">
<?php flash() ?>
<form class="form-elements" action="register" method="post">
<h4 class="form-htag">Create Account</h4>
    <div>
        <label class="form-label" for="username">Username:</label>
        <input class="form-input" type="text" name="username" id="username" placeholder="Username" value="<?= $inputs['username'] ?? '' ?>"
               class="<?= error_class($errors, 'username') ?>" >
        <small><?= $errors['username'] ?? '' ?></small>
    </div>
    <div>
        <label class="form-label" for="email">Email:</label>
        <input class="form-input" type="email" name="email" id="email" placeholder="Email" value="<?= $inputs['email'] ?? '' ?>"
               class="<?= error_class($errors, 'email') ?>" >
        <small><?= $errors['email'] ?? '' ?></small>
    </div>
    <div>
        <label class="form-label" for="password">Password:</label>
        <input class="form-input" type="password" name="password" id="password" placeholder="Password" value="<?= $inputs['password'] ?? '' ?>"
               class="<?= error_class($errors, 'password') ?>" >
        <small><?= $errors['password'] ?? '' ?></small>
    </div>
    <div>
        <label class="form-label" for="password2">Re-type Password:</label>
        <input class="form-input" type="password" name="password2" id="password2" placeholder="Re-type Password" value="<?= $inputs['password2'] ?? '' ?>"
               class="<?= error_class($errors, 'password2') ?>">
        <small><?= $errors['password2'] ?? '' ?></small>
    </div>
    <div>
        <label class="form-label"  for="agree">
            <input class="form-input_type" type="checkbox" name="agree" id="agree" value="checked" <?= $inputs['agree'] ?? '' ?> /> I
            agree
            with the
            <a class="form-link" href="#" title="term of services">term of services</a>
        </label>
        <small><?= $errors['agree'] ?? '' ?></small>
    </div>
    <button class="form-button" type="submit">Register</button>
    <footer class="form-footer">Already a member? <a class="form-link" href="login">Login here</a></footer>
</form>
</div>
<?php view('footer-content') ?>
