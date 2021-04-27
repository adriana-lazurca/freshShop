<?php $title = 'Sign in'; ?>

<?php ob_start(); ?>

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>SIGN IN</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">ABOUT US</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<h1>Mon sign in !</h1>


<?php $content = ob_get_clean(); ?>

<?php require('./php/views/template.php'); ?>