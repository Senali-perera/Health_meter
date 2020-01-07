 <?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 <html>
   <head>
      <title>Highcharts Tutorial</title>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      <script src = "https://code.highcharts.com/highcharts.js"></script>  
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
	$time=((float)$row['time'])*1000*3600;
	$data1[] = array($time);
   
	$data[] = $row["date"];
		
}
$result->close();
mysqli_close($link);


?>
     <script type="text/javascript" src="http://code.highcharts.com/stock/highstock.js"></script>

<div id="container" style="height: 300px"></div>

      <script language = "JavaScript">
      var chart = new Highcharts.Chart({

    chart: {
        renderTo: 'container'
    },

    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        min: 6
    },
    
    legend: {
        verticalAlign: 'top',
        y: 100,
        align: 'right'
    },
    
    scrollbar: {
        enabled: true
    },

    series: [{
        data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
    }]
});

      </script>
   </body>
   
</html>