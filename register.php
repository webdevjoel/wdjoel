<?php
include_once 'inc/registerx.php';
include_once 'inc/func.php';
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
   <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
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
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <form class="form-signin" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
        method="post" 
        name="registration_form">
 
		<input placeholder="Username" type='text' name='username' id='username' class="form-control" />
        <input placeholder="Email Address" type="text" name="email" id="email" class="form-control" /> </br>
        <input placeholder="Password" type="password" name="password" id="password" class="form-control"/>
		<input placeholder="Confirm Password" type="password" name="confirmpwd" id="confirmpwd" class="form-control"/>
		<input class="btn btn-lg btn-primary btn-block"
			   type="button" 
               value="Register" 
               onclick="return regformhash(this.form,
               this.form.username,
               this.form.email,
               this.form.password,
               this.form.confirmpwd);" /> 
        </form>
	</div>
    <p>Return to the <a href="index.php">login page</a>.</p>
  </div>
 </div>
</div>
</body>
</html>