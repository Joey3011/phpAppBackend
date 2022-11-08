<?php
require __DIR__ . '/../src/bootstrap.php';
require_login();
?>
<?php view('header-content', ['title' => 'User Record']) ?>
<span class="main-container"> 
    <div class="container">
        <div class="row">
            <div class="cols-xs-1">
                    <div class="col-md-12 mainholder" style="color: royalblue; font-size: 19px; font-weight: 600; border-bottom: 2px solid royalblue">
                        <i class="fa fa-address-book" aria-hidden="true">&nbsp;User Record</i>
                    </div>
                <div class="table-responsive" id="table-responsive_user"><br /></div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="/../DiYer/Seeker/js/user.js"></script>
</span>
<?php view('footer-content') ?>  