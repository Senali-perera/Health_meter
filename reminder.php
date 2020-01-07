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
  <style>
  
 .hero-image {
  background-image: url("images15.jpg");
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

</style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
  
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
      <a class="nav-link" href="pogress.php">Pogress</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="reminder.php">Health Tips</a>
    </li>
  </ul>
  </div>
 </div>
  <div class="col-sm-10" >
  

      <h1 class="text-center">Health Tips </h1> 
      <?php
  $email= $_SESSION["email"];
  $glasses=$steps="";
 include('config.php');
  
  $date = date("Y-m-d");
  
  $sql = "SELECT  level FROM water WHERE email = '$email' AND date='$date'";
  
   $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  
	  $glasses=$row["level"];
	  
	  
	  if($_SERVER["REQUEST_METHOD"] == "POST"){
	$glasses=$glasses+1;


$sql = "UPDATE water SET level=$glasses WHERE email='$email'  AND date='$date'";


if (mysqli_query($link, $sql)) {
     header("location: reminder.php");
} 
}
 
  $sql = "SELECT  time FROM sleep WHERE email = '$email' AND date='$date'";
  
   $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  
	  $sleep=$row["time"];
	  $result->close();
	  
	   $sql = "SELECT  steps FROM walk WHERE email = '$email' AND date='$date'";
  
   $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  
	  $steps=$row["steps"];
	  

  ?>
 
 <div class="row">
  <div class="col-sm-5" >
   <div class="card" style="width:350px">    
    <div class="card-body">
      <h3 class="card-title text-center">WATER</h3>
	   <h6 class="card-title text-center">You should drink eight 8-ounce glasses of water per day.</h6>
	  <img class="card-img-top" src="water.gif" alt="Card image" height="200" style="width:300px ">
      <p class="card-text">A glass of water will help you concentrate and refreshed.</p>
	  <h5><?php echo $glasses?> glasses</h5>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="ADD">
            </div>
			
        </form>  
 
      	  
    </div>
  </div>
   </div>
   
 <div class="col-sm-5" >
   <div class="card" style="width:350px">    
    <div class="card-body">
      <h3 class="card-title text-center">SLEEP</h3>
	   <h6 class="card-title text-center">You should sleep 7-9 hours per day.</h6>
	  <img class="card-img-top" src="images17.jpg" alt="Card image" height="200" style="width:300px ">
      <p class="card-text">The quality of your sleep directly affects your mental and physical health and the quality of your waking life. </p>
<form action="sleep.php" method="post">
 <div class="form-group">
 <input type="time string" id="time" name="time" value="<?php echo $sleep?>"> Enter Time
</div>
 <div class="form-group">
 <input type="submit" class="btn btn-info" value="EDIT">
 </div>
			
   </form> 
 </div>
  </div>

</div>

</div>

<div class="row">
  <div class="col-sm-5" >
   <div class="card" style="width:350px">    
    <div class="card-body">
      <h3 class="card-title text-center">WALK</h3>
	   <h6 class="card-title text-center">You need to walk 10000 steps or 5 miles per day.</h6>
	  <img class="card-img-top" src="image5.jpg" alt="Card image" height="200" style="width:300px ">
      <p class="card-text"> Walking a mile burns about 80 calories for a 150-pound person.<br><br>Enter no of miles walk today</p>
	 
        <form  action="walk.php" method="post">
		<div class="form-group">
 <input type="number" min="0" id="mile" name="mile" value=""> 
</div>
 <h5><?php echo $steps?> STEPS WALKED TODAY</h5>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="EDIT">
            </div>
			
        </form>  
 
      	  
    </div>
  </div>
   </div>

</div>

</div>

  </div>
</div>
</div>
</body>
</html>
