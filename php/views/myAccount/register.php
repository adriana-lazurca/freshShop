<?php $title = 'Register'; ?>

<?php ob_start(); ?>

<h1>Mon register !</h1>


<?php $content = ob_get_clean(); ?>

<?php require('./php/views/template.php'); ?>