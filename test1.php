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
header('Content-Type: application/json');
require_once("test.php");
 $email= $_SESSION["email"];
 include('config.php');
  
  $date = date("Y-m-d");
 
	  $query = sprintf("SELECT date, time FROM sleep WHERE email='$email'");
$result = $link->query($query);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
$result->close();
mysqli_close($link);

echo json_encode($data);
?>
