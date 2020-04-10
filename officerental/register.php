<?php include('server.php') ?>
<<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  
</head>
<body>

  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php') ?>
	  <div class="form-group">
  	  <label>First name</label>
		<br>
  	  <input type="text" name="ufname" value="<?php echo $ufname; ?>">
  	</div>
	  <div class="form-group">
  	  <label>Last name</label>
		<br>
  	  <input type="text" name="ulname" value="<?php echo $ulname; ?>">

  	</div>

  	<div class="form-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="form-group">
  	  <label>Email</label>
  	  <input type="email" name="umail" value="<?php echo $umail; ?>">
  	</div>
  	<div class="form-group">
  	  <label>Password</label>
  	  <input type="password" name="upass">
  	</div>
  	<div class="form-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="form-group">
	  <br>
  	  <input type="submit" class="btn btn-primary" name="reg_user" value="sign up">


		
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>