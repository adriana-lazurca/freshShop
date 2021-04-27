<?php $title = 'Register'; ?>

<?php ob_start(); ?>

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>REGISTER</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">REGISTER</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<h1>Mon register !</h1>


<?php $content = ob_get_clean(); ?>

<?php require('./php/views/template.php'); ?>