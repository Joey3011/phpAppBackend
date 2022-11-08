<?php
require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/reset_password.php';
?>
<?php view('header-login', ['title' => 'Password Reset Request']) ?>

<div class="form-menu">  
<?php flash() ?>  
    <?php if (isset($errors['reset_password'])) : ?>
        <div class="error alert-error">
        <small><?= $errors['reset_password'] ?></small>
        </div>
    <?php endif  ?>
    <form class="form-elements" action="reset_password" method="post">
    <h5 class="form-htag">Request Password Link</h5>
    <div>
    <label class="form-label" for="email">Email:</label>
    <input class="form-input"  type="email" name="email" id="email" placeholder="Email" value="<?= $inputs['email'] ?? '' ?>"
               class="<?= error_class($errors, 'email') ?>">
        <small><?= $errors['email'] ?? '' ?></small>
    </div>
    <section class="form-section">
        <button class="form-button" type="submit">Submit</button>
    </section><br />
    <a class="form-link" href="login">Login</a>
    </form>
</div>
<?php view('footer-content') ?>