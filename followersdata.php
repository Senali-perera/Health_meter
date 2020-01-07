<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$email= $_SESSION["email"];
include('config.php');

$query = sprintf("SELECT date, weight FROM weight WHERE email='$email'");
$result = $link->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$link->close();

//now print the data
print json_encode($data);
?>
