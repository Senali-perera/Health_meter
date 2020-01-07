<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

      <?php
  $email= $_SESSION["email"];
 
  
 include('config.php');
  
  $date = date("Y-m-d");
 
	  if($_SERVER["REQUEST_METHOD"] == "POST"){
	 $miles = trim($_POST["mile"]);
	 $steps=2000*$miles;
$sql = "UPDATE walk SET steps='$steps' WHERE email='$email'  AND date='$date'";


if (mysqli_query($link, $sql)) {
     header("location: reminder.php");
} 
}


  ?>