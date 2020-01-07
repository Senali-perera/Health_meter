<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PROGRESS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  
 .hero-image {
  background-image: url("images18.jpg");
  background-color: #cccccc;
  background-attachment:fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
div.first {
  background: rgba(0, 0, 0, 0.6);
}

div.second {
  background: rgba(0, 0, 255, 0.3);
}

div.third {
  background: rgba(255, 255, 255, 0.6);
}
div.ex1 {
 
  width: 100%;
  height: 550px;
  overflow: scroll;
}
.chartWrapper {
 position: relative;
}

.chartWrapper > canvas {
  position: absolute;
  left: 0;
  top: 0;
  pointer-events: none;
}

.chartAreaWrapper {
  width: 600px;
  overflow-x: scroll;
}
</style>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/linegraph.js"></script>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      <script src = "https://code.highcharts.com/highcharts.js"></script>  
  <script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
</head>
<body>

<div class="hero-image">
<div class="container-fluid">
<div class="row">
<div class="col-sm-4" ><br>
  <h1 style="font-weight: 900;">HEALTH METER</h1>
   </div>
 <div class="col-sm-8" >
 <h5 class="text-right"><br>Online Health Monitoring System</h5>   </div>
  </div>  
</div>  
  
 
  <nav class="navbar navbar-expand-sm">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link btn btn-light" href="account.php" role="button">HOME</a>
    </li>
	 </ul>
	 <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
	 <ul class="navbar-nav ml-auto">
    <li class="nav-right pull-sm-right align-content-end">
	     <a class="nav-link btn btn-dark" href="logout.php" role="button">LOG OUT</a>
    </li>
  </ul>
  </div> 
</nav>
 
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2" >
   <div class="third" >
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="exercise.php">Exercise</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="diet_plan.php">Diet Plan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pogress.php">Progress</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="reminder.php">Health Tips</a>
    </li>
	
  </ul>
  </div>
 </div>
  <div class="col-sm-10" > <h1 class="text-center">PROGRESS REPORT</h1>
  <h4 class="text-center" style="font-weight: bold;"><?php echo $_SESSION["username"]; ?> update the credential and view your pogress <br> </h4>
  <div class="row">
  <div class="col-sm-1" ></div>
  <div class="col-sm-5" >
  <?php
  $email= $_SESSION["email"];
  $weight=$height=$bmi="";
 include('config.php');
  
  $sql = "SELECT  weight, height FROM bmi WHERE email = '$email' ";
  
   $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  
	  $weight=$row["weight"];
	  $height=$row["height"];
	  $bmi=($weight*10000)/($height*$height +1);
	  
	  if($_SERVER["REQUEST_METHOD"] == "POST"){
	$weight=trim($_POST["weight"]);
$height = trim($_POST["height"]);


$sql = "UPDATE bmi SET weight=$weight, height=$height WHERE email='$email'";

mysqli_query($link, $sql);
$date = date("Y-m-d");
$sql = "INSERT INTO weight VALUES ('$email','$date',$weight)";

if (mysqli_query($link, $sql)) {
     header("location: pogress.php");
} 
}


  ?>
 
 
   <div class="card" style="width:350px">    
    <div class="card-body">
      <h4 class="card-title text-center">BMI Level</h4>
	  <img class="card-img-top" src="bmi.jpg" alt="Card image" height="200" style="width:300px ">
	  <h5>BMI(kg/m2) =<?php echo number_format($bmi,2)."<br>";?>
	  </h5>
      <p class="card-text"></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group ">
                <label>Weight(kg)</label>
                <input type="number_format" name="weight" class="form-control" value="<?php echo $weight; ?>">
               
            </div>    
            <div class="form-group ">
                <label>Height(cm)</label>
                <input type="number_format" name="height" class="form-control" value="<?php echo $height; ?>">
               
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Edit">
            </div>
			
        </form>  
 
      	  
    </div>
  </div>
  </div>
  
   <div class="col-sm-6" >
  <?php
 

    $query = sprintf("SELECT date, weight FROM weight WHERE email='$email'");
$result = $link->query($query);

//loop through the returned data
$dataPoints = array();
foreach ($result as $row) {
        $data2[] = $row["date"];
		 $data3[] = $row["weight"];
}

//free memory associated with result
$result->close();
 $query = sprintf("SELECT date, level FROM water WHERE email='$email'");
$result = $link->query($query);

//loop through the returned data
$dataPoints1 = array();
foreach ($result as $row) {
         $data4[] = $row["date"];
		 $data5[] = $row["level"];
}

//free memory associated with result
$result->close();

 $query = sprintf("SELECT date, time FROM sleep WHERE email='$email'");
$result = $link->query($query);

//loop through the returned data
$dataPoints2 = array();
foreach ($result as $row) {
        $time=((float)$row['time'])*1000*3600;
	$data1[] = array($time);
   
	$data[] = $row["date"];
}

//free memory associated with result
$result->close();

$query = sprintf("SELECT date, steps FROM walk WHERE email='$email'");
$result = $link->query($query);

//loop through the returned data
$dataPoints3 = array();
foreach ($result as $row) {
	$data6[] = $row["steps"];
   
	$data7[] = $row["date"];
}

//free memory associated with result
$result->close();

//close connection
$link->close();


?>


   <div style="width: 100%; overflow-x: auto;">
  <div style="width: 3000px, height: 300px">
  <div id = "container1" width="0" style = "height: 400px; margin: 0 auto"></div>
  </div>
</div>
 <script language = "JavaScript">
         $(document).ready(function() {  
            var chart = {
               type: 'line',
			   renderTo: 'container'
            };
            var title = {
               text: 'WEIGHT'   
            };
            var subtitle = {
               text: ''  
            };
            var xAxis = {
               categories: <?php echo json_encode($data2, JSON_NUMERIC_CHECK); ?>,
               title: {
                  text: 'date'
               }
            };
            var yAxis = {
               min: 0,
               title: {
                  text: 'weight (kilograms)',
                  align: 'high'
               }
              
            };
            var tooltip = {
               formatter: function() 
      {
           return '<b>'+  this.series.name + '<\/b> was  ' + this.y  + ' kg on ' + this.x;
      }
            };
            var plotOptions = {
               bar: {
                  dataLabels: {
                     enabled: true
                  }
               }
            };
            var legend = {
               layout: 'vertical',
               align: 'right',
               verticalAlign: 'top',
               x: -40,
               y: 100,
               floating: true,
               borderWidth: 1,
               
               backgroundColor: (
                  (Highcharts.theme && Highcharts.theme.legendBackgroundColor) ||
                     '#FFFFFF'),
               shadow: true
            };
            var credits = {
               enabled: false
            };
            var series = [
         
               {
                  name:'weight',
                  data:  <?php echo json_encode($data3, JSON_NUMERIC_CHECK); ?>      
               }
            ];
      
            var json = {};   
            json.chart = chart; 
            json.title = title;   
            json.subtitle = subtitle; 
            json.tooltip = tooltip;
            json.xAxis = xAxis;
            json.yAxis = yAxis;  
            json.series = series;
            json.plotOptions = plotOptions;
            json.legend = legend;
            json.credits = credits;
            $('#container1').highcharts(json);
         });
      </script>

 </div>
</div>

<div class="row">
  <div class="col-sm-6" >
  <p><br></p>
  <div style="width: 100%; overflow-x: auto;">
  <div style="width: 3000px, height: 300px">
  <div id = "container2" width="0" style = "height: 400px; margin: 0 auto"></div>
  </div>
</div>
 <script language = "JavaScript">
         $(document).ready(function() {  
            var chart = {
               type: 'column',
			   renderTo: 'container'
            };
            var title = {
               text: 'WATER INTAKE'   
            };
            var subtitle = {
               text: ''  
            };
            var xAxis = {
               categories: <?php echo json_encode($data4, JSON_NUMERIC_CHECK); ?>,
               title: {
                  text: 'date'
               }
			     
			   
            };
            var yAxis = {
               min: 0,
               title: {
                  text: 'no of glasses',
                  align: 'high'
               }
              
            };
			var scrollbar = {
            enabled: true
			};
            var tooltip = {
               formatter: function() 
      {
           return '<b>'+  this.series.name + '<\/b> was  ' + this.y  + ' glasses on ' + this.x;
      }
            };
            var plotOptions = {
               bar: {
                  dataLabels: {
                     enabled: true
                  }
               }
            };
            var legend = {
               layout: 'vertical',
               align: 'right',
               verticalAlign: 'top',
               x: -40,
               y: 100,
               floating: true,
               borderWidth: 1,
               
               backgroundColor: (
                  (Highcharts.theme && Highcharts.theme.legendBackgroundColor) ||
                     '#FFFFFF'),
               shadow: true
            };
            var credits = {
               enabled: false
            };
            var series = [
         
               {
                  name:'water intake',
                  data:  <?php echo json_encode($data5, JSON_NUMERIC_CHECK); ?>      
               }
            ];
      
            var json = {};   
            json.chart = chart; 
            json.title = title;   
            json.subtitle = subtitle; 
            json.tooltip = tooltip;
			json.scrollbar = scrollbar;
            json.xAxis = xAxis;
            json.yAxis = yAxis;  
            json.series = series;
            json.plotOptions = plotOptions;
            json.legend = legend;
            json.credits = credits;
            $('#container2').highcharts(json);
         });
      </script>
</div>

<div class="col-sm-6" >
 <p><br></p>
   <div id = "container" style = "width: 450px; height: 400px; margin: 0 auto"></div>
      <script language = "JavaScript">
         $(document).ready(function() {  
            var chart = {
               type: 'column',
			   renderTo: 'container'
            };
            var title = {
               text: 'SLEEP'   
            };
            var subtitle = {
               text: ''  
            };
            var xAxis = {
               categories: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>,
               title: {
                  text: null
               }
			    
            };
            var yAxis = {
               min: 0,
               title: {
                  text: 'time (hours)',
                  align: 'high'
               },
               type: 'datetime',
                dateTimeLabelFormats: {
                hour: '%H:%M:%S'},
				formatter: function()
                            {
                                return Highcharts.dateFormat('%H:%M:%S', this.y);
                            }
            };
            var tooltip = {
               formatter: function() 
      {
           return '<b>'+  this.series.name + '<\/b> was  ' + Highcharts.dateFormat('%H:%M:%S', this.y)  + ' hours on ' + this.x;
      }
            };
            var plotOptions = {
               bar: {
                  dataLabels: {
                     enabled: true
                  }
               }
            };
            var legend = {
               layout: 'vertical',
               align: 'right',
               verticalAlign: 'top',
               x: -40,
               y: 100,
               floating: true,
               borderWidth: 1,
               
               backgroundColor: (
                  (Highcharts.theme && Highcharts.theme.legendBackgroundColor) ||
                     '#FFFFFF'),
               shadow: true
            };
            var credits = {
               enabled: false
            };
            var series = [
         
               {
                  name:'sleep time',
                  data:  <?php echo json_encode($data1, JSON_NUMERIC_CHECK); ?>      
               }
            ];
      
            var json = {};   
            json.chart = chart; 
            json.title = title;   
            json.subtitle = subtitle; 
            json.tooltip = tooltip;
            json.xAxis = xAxis;
            json.yAxis = yAxis;  
            json.series = series;
            json.plotOptions = plotOptions;
            json.legend = legend;
            json.credits = credits;
            $('#container').highcharts(json);
         });
      </script>


</div>

 </div>
 
 <div class="row">
  <div class="col-sm-6" >
  <p><br></p>
  <div style="width: 100%; overflow-x: auto;">
  <div style="width: 3000px, height: 300px">
  <div id = "container3" width="0" style = "height: 400px; margin: 0 auto"></div>
  </div>
</div>
 <script language = "JavaScript">
         $(document).ready(function() {  
            var chart = {
               type: 'column',
			   renderTo: 'container'
            };
            var title = {
               text: 'STEPS WALK'   
            };
            var subtitle = {
               text: ''  
            };
            var xAxis = {
               categories: <?php echo json_encode($data7, JSON_NUMERIC_CHECK); ?>,
               title: {
                  text: 'date'
               }
			     
			   
            };
            var yAxis = {
               min: 0,
               title: {
                  text: 'no of steps',
                  align: 'high'
               }
              
            };
			var scrollbar = {
            enabled: true
			};
            var tooltip = {
               formatter: function() 
      {
           return '<b>'+  this.series.name + '<\/b> was  ' + this.y  + ' steps on ' + this.x;
      }
            };
            var plotOptions = {
               bar: {
                  dataLabels: {
                     enabled: true
                  }
               }
            };
            var legend = {
               layout: 'vertical',
               align: 'right',
               verticalAlign: 'top',
               x: -40,
               y: 100,
               floating: true,
               borderWidth: 1,
               
               backgroundColor: (
                  (Highcharts.theme && Highcharts.theme.legendBackgroundColor) ||
                     '#FFFFFF'),
               shadow: true
            };
            var credits = {
               enabled: false
            };
            var series = [
         
               {
                  name:'steps walk',
                  data:  <?php echo json_encode($data6, JSON_NUMERIC_CHECK); ?>      
               }
            ];
      
            var json = {};   
            json.chart = chart; 
            json.title = title;   
            json.subtitle = subtitle; 
            json.tooltip = tooltip;
			json.scrollbar = scrollbar;
            json.xAxis = xAxis;
            json.yAxis = yAxis;  
            json.series = series;
            json.plotOptions = plotOptions;
            json.legend = legend;
            json.credits = credits;
            $('#container3').highcharts(json);
         });
      </script>
</div>

 </div>
 
 
  </div>
 
  </div>
</div>
</div>
</body>
</html>
