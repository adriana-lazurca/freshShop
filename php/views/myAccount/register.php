<?php $title = 'Register'; ?>

<?php ob_start(); ?>

<h2 class='text-center mt-5 font-weight-bold'>REGISTER</h2>

<div class='container'>
    <div class='row'>
        <div class='col-6 mt-5 mb-5 mx-auto'>

            <?php if (isset($message)) { ?>
                <div class="alert alert-danger">
                    <strong><?= $message ?></strong>
                </div>
            <?php
            } ?>

            <form action="?controller=myAccount&action=validateUserRegistration" method="post">
                <div class="form-group">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" name="firstName" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="lastName">Last name</label>
                    <input type="text" class="form-control" name="lastName" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password">Retype Password</label>
                    <input type="password" class="form-control" name="rePassword" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-success">Register</button>
            </form>
            <p class='text-center mt-4 font-italic'>You already have an account? Please sign in <a href="?controller=myAccount&action=signIn"><b>here</b></a></p>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('./php/views/template.php'); ?>