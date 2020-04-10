<?php
session_start();

// connect to the database
$db = mysqli_connect('localhost', 'root', '93251', 'rental');

// initializing variables
$ufname="";
$ulname="";
$username = "";
$umail    = "";
$errors = array(); 



// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $ufname=mysqli_real_escape_string($db, $_POST['ufname']);
  $ulname=mysqli_real_escape_string($db, $_POST['ulname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $umail = mysqli_real_escape_string($db, $_POST['umail']);
  $upass = mysqli_real_escape_string($db, $_POST['upass']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($ufname)) { array_push($errors, "First name is required"); }
  if (empty($ulname)) { array_push($errors, "Lastname is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($umail)) { array_push($errors, "Email is required"); }
  if (empty($upass)) { array_push($errors, "Password is required"); }
  if ($upass != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or umail
  $user_check_query = "SELECT * FROM user WHERE username='$username' OR umail='$umail' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['umail'] === $umail) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$upass = md5($password_2);//encrypt the password before saving in the database

  	$query = "INSERT INTO user (ufname, ulname, username, umail, upass) 
  			  VALUES('$ufname','$ulname', '$username', '$umail', '$upass')";
  	$result = mysqli_query($db, $query);
    if($result){
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: dashboard.php');
  }
  else
    array_push($errors, "Insert unsuccessful");
  }
}
?>