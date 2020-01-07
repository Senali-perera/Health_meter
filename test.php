   
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

     
  <!DOCTYPE html>
<html lang="en">
<head>
  <title>Health Tips</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="Chart.js"></script>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	 <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script type="text/javascript" src="js/linegraph.js"></script>
        </head>
<body>
<?php

 $email= $_SESSION["email"];
 include('config.php');
  
  $date = date("Y-m-d");
 
	  $query = sprintf("SELECT date, time FROM sleep WHERE email='$email'");
$result = $link->query($query);

$data = array();
foreach ($result as $row) {
	$data[] = $row["date"];
		$data1[]=$row["time"];
}
$result->close();
mysqli_close($link);


?>
 <div>
<canvas id="income" width="400" height="400"></canvas>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
  </div>

<script>
             var barData = {
                labels : <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>,
                datasets : [
                    {
                        fillColor : "rgba(73,188,170,0.4)",
                        strokeColor : "rgba(72,174,209,0.4)",
                        data : [40,50,60]
                    }
                ]
            }
			 var barOptions = {
               scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true
            }]
        }
    }
            
			
            // get bar chart canvas
            var income = document.getElementById("income").getContext("2d");
            // draw bar chart
            new Chart(income).Bar(barData,barOptions);
</script>
 
 </body>
 </html>