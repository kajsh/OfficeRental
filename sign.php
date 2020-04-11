<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$Email = $Password = "";
$Email_err = $Password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if Email is empty
    if(empty(trim($_POST["Email"]))){
        $Email_err = "Please enter your Email";
    } else{
        $Email = trim($_POST["Email"]);
    }
    
    // Check if upass is empty
    if(empty(trim($_POST["Password"]))){
        $Password_err = "Please enter your Password";
    } else{
        $Password = trim($_POST["Password"]);
    }
    
    // Validate credentials
    if(empty($Email_err) && empty($Password_err)){
        $sql = "SELECT Email, Password FROM users WHERE Email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_Email);
            
            // Set parameters
            $param_Email = $Email;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                // Check if Email exists, if yes then verify upass
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $Email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        //if(password_verify($upass, $hashed_password)){
                            // Password is correct, so start a new session
                        if($Password == $hashed_password){
                            session_start();                                                    
                           // Redirect user to dashboard page
                            header("location: dashboard.php");
                        } else{
                            // Display an error message if upass is not valid
                            $Password_err = "Password not valid.";
                        }
                    }
                } else{
                    // Display an error message if Email doesn't exist
                    $Email_err = "Email does not exist.";
                }
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    
    // Close connection
    mysqli_close($link);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="sign.css">
 <script src="https://kit.fontawesome.com/3aad245445.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="register.php" method="post">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span class="info">or use your email for registration</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<select>
			  <option class="hidden"  selected disabled>Are you a rentee or a renter?</option>
			  <option>Rentee</option>
			  <option>Renter</option>
			</select>
			<br>
			
			
			
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span class="info">or use your account</span>
                <input type="text" name="Email" placeholder="Email" value="<?php echo $Email;?>">
                <span class="help-block"><?php echo $Email_err; ?></span>

                <input type="password" name="Password" placeholder="Password" value="<?php echo $Password;?>">
                <span class="help-block"><?php echo $Password_err; ?></span>
            
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<script>const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');
     
    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });
    
    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });</script>
</body>
</html>


