<?php $title = 'Sign in'; ?>

<?php ob_start(); ?>


<h2 class='text-center mt-5 font-weight-bold'>SIGN IN</h2>

<div class='container'>
    <div class='row'>
        <div class='col-6 mt-5 mb-5 mx-auto'>
            <div>

                <?php if (isset($error)) { ?>
                    <div class="alert alert-danger">
                        <strong>Your email or password is incorrect.</strong>
                    </div>
                <?php
                } ?>

                <form action="?controller=myAccount&action=validateUserSignIn" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" required autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-success">Sign in</button>
                </form>
                <p class='text-center mt-4 font-italic'>You don't have an account yet? Please register <a href="?controller=myAccount&action=register"><b>here</b></a></p>
            </div>
        </div>
    </div>


    <?php $content = ob_get_clean(); ?>

    <?php require('./php/views/template.php'); ?>