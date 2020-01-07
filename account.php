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
  <title>Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  
 .hero-image {
  background-image: url("images7.jpg");
  background-color: #cccccc;
  background-attachment:fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
div.first {
  background: rgba(255, 255, 255, 0.1);
}

div.second {
  background: rgba(255, 255, 255, 0.8);
}

div.third {
  background: rgba(255, 255, 255, 0.6);
}
</style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
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
  

      <h1 class="text-center">Welcome <?php echo htmlspecialchars($_SESSION["username"]); ?> </h1> 
      
 <div class="row">
   <div class="col-sm-3" >
   <div class="card second" style="width:100%; height:400px">    
    <div class="card-body">
      <h4 class="card-title text-center"><b>Exercise Plan</b></h4>
      <p class="card-text"></p>
	  <ul >
  <li style="font-size:100%;"> Make You Feel Happier</li>
  <li style="font-size:100%;"> Help With Weight Loss</li>
    <li style="font-size:100%;"> Good for Your Muscles and Bones</li>
	 <li style="font-size:100%;"> Increase Your Energy Levels</li> 
	   <li style="font-size:100%;">Help Skin Health</li>
	    <li style="font-size:100%;">Help Your Brain Health and Memory</li>
</ul>   
    </div>
  </div>
   </div>
   
   
   <div class="col-sm-3" >
   <div class="card second" style="width:100%; height:400px">    
    <div class="card-body">
      <h4 class="card-title text-center"><b>Diet Plan</b></h4>
      <p class="card-text"></p>
	  <ul >
  <li style="font-size:100%;"> Provide energy you need to keep active throughout the day</li>
  <li style="font-size:100%;"> Provide nutrients you need for growth and repair, helping you to stay strong and healthy 
  and help to prevent diet-related illness, such as some cancers</li>
    
</ul>   
    </div>
  </div>
    </div>
	
	
   <div class="col-sm-3" >
    <div class="card second" style="width:100%; height:400px">    
    <div class="card-body">
      <h4 class="card-title text-center"><b>Progress Report</b></h4>
      <p class="card-text"></p>
	  <ul >
	  <li style="font-size:100%;"> Show the the personal bmi value and its status</li>
  <li style="font-size:100%;"> Plot the weight</li>
  <li style="font-size:100%;"> Report the daily water intake</li>
   <li style="font-size:100%;">Examine daily sleep hours</li>
    <li style="font-size:100%;">View no of steps daily walk</li>
    
</ul>   
    </div>
  </div>
  </div>
  
   <div class="col-sm-3" >
   <div class="card second" style="width:100%; height:400px">    
    <div class="card-body">
      <h4 class="card-title text-center"><b>Heath Tips</b></h4>
      <p class="card-text"></p>
	  <ul >
  <li style="font-size:100%;"> Guideness of how much need to be drunk water per day</li>
  <li style="font-size:100%;"> No of hours need to be slept per day for healthy life</li>
   <li style="font-size:100%;">No of steps need to be walk for fitnees of the body</li>
</ul>   
    </div>
  </div>
  </div>
  
  </div>
    <div class="row"><p><br></p>
	</div>
</div>
  </div>
</div>
</div>
</body>
</html>
