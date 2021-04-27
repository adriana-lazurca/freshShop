<?php $title = 'Sign in'; ?>

<?php ob_start(); ?>


<h2 class='text-center mt-5'>SIGN IN</h2>

<div class='container'>
    <div class='row'>
        <div class='col-6 mt-5 mb-5 mx-auto'>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
            <p class='text-center mt-4'>You don't have an account yet? Please register <a href="?controller=myAccount&action=register"><b>here</b></a></p>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('./php/views/template.php'); ?>