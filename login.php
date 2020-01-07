<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: account.php");
exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
 $error="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT  email, username, password FROM register WHERE email = '$email' AND password = '$password'";
        
        $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  
	  $username=$row["username"];
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["email"]=$email;
                            $_SESSION["username"] = $username;       
$result->close();
			$date = date("Y-m-d");	
			$time =date("0-0-0 0:0:0");
 $sql = "SELECT  * FROM water WHERE email = '$email' AND date = '$date'";
        
        $result = mysqli_query($link,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
       $result->close();
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 0) {			
          $sql = "INSERT INTO  water VALUES ('$email', 0,'$date')";
		  mysqli_query($link,$sql);
		   $sql = "INSERT INTO  sleep VALUES ('$email', '00:00:00','$date')";
		  mysqli_query($link,$sql);
		  $sql = "INSERT INTO  walk VALUES ('$email',0,'$date')";
		  mysqli_query($link,$sql);
		  
	  }
		 
         header("location: account.php");
      }else{$error="You entered email or password is not valid";}
        
        
        // Close statement
        
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 100%; padding: 20px 400px 500px; }
    </style>
</head>
<body>
    <div class="wrapper" align = "center">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
			<p class="text-danger"><?php echo $error; ?></p>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>    
</body>
</html>