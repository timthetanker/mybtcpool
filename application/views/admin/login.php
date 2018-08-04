<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>


</head>

<body>
<div class="container">

    <?php echo form_open('admin/login', '', ''); ?>
    <h2 class="form-signin-heading">Please sign in</h2>

    <input type="username" name="username" class="form-control" placeholder="Username" required autofocus>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in">
    <?php
    var_dump($_POST);
    ?>
    <?php echo form_close(); ?>
</div> <!-- /container -->



</body>

</html>
