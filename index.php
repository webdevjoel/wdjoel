<?php
include_once 'inc/db_connect.php';
include_once 'inc/func.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="http://getbootstrap.com/favicon.ico">
   <title>JoelMcCauley - Demo Portfolio</title>
   <link href="inc/styles.css" rel="stylesheet">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
   <script type="text/JavaScript" src="inc/sha512.js"></script> 
   <script type="text/JavaScript" src="inc/hash.js"></script> 
  </head>
  <body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
                <img class="profile-img" src="img/logo_login.png"
                    alt="">
<?php
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  The email or password you entered was incorrect.
</div>';
        }
        if (isset($_GET['loggedout'])) {
            echo '<div class="alert alert-info" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Warning:</span>
  You have been logged out.
</div>';
        }
        if (isset($_GET['registered'])) {
            echo '<div class="alert alert-success" role="alert">
  <span class="sr-only">Warning:</span>
  Account created successfully. Login to continue.
</div>';
        }
?> 
                <form action="inc/login.php" method="post" name="login_form" class="form-signin">
                <input name="email" type="text" class="form-control" placeholder="Email" required autofocus>
                <input name="password" type="password" id="password" class="form-control" placeholder="Password">
                <button class="btn btn-lg btn-primary btn-block" value="Login" onclick="formhash(this.form, this.form.password);">
                    Sign in</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="register.php" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>