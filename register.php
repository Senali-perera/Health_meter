<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$username = $password = $email= "";
$username_err = $password_err = "";
 $error="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$email=trim($_POST["email"]);
$username = trim($_POST["username"]);

$password = trim($_POST["password"]);

$sql = "INSERT INTO register (email, username, password) VALUES ('$email', '$username', '$password')";

if (mysqli_query($conn, $sql)) {
	$sql = "INSERT INTO bmi (email, weight,height) VALUES ('$email', 0, 0)";
	mysqli_query($conn, $sql);
     header("location: home.php");
} else {
    $error= mysqli_error($conn);
}

mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>REGISTER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center">REGISTER</h2>
  <p class="text-center">Register below to access our online service for registered members<br></p>
  <p class="text-center help-block"><?php echo $error?></p>
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
	<div class="form-group">
      <label for="text">Username:</label>
      <input type="text" class="form-control" id="text" placeholder="Enter username" name="username" required>
    </div>
    <div class="form-group">
      <label  for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
	<div class="row">
    <button type="submit" class="btn btn-primary">Submit</button> 
	<p>Have an account?</p><a href="login.php" class="btn btn-link" role="button">SIGN IN</a> 
	</div>
  </form>
</div>

</body>
</html>
