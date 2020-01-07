<!DOCTYPE html>
<html lang="en">
<head>
  <title>DAY 12</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  
 .hero-image {
  background-image: url("images8.jpg");
  background-color: #cccccc;
  height: 750px;
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
      <a class="nav-link btn btn-light" href="/project/account.php" role="button">HOME</a>
    </li>
	 </ul>
	 <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
	 <ul class="navbar-nav ml-auto">
    <li class="nav-right pull-sm-right align-content-end">
	     <a class="nav-link btn btn-dark" href="/project/logout.php" role="button">LOG OUT</a>
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
      <a class="nav-link" href="/project/exercise.php">Exercise</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/project/diet_plan.php">Diet Plan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/project/pogress.php">Pogress</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/project/reminder.php">Health Tips</a>
    </li>
	
  </ul>
  </div>
 </div>
  <div class="col-sm-10" > <h1 class="text-center">DAY 12<br><br></h1>
  
  <div class="row">
  
  <div class="col-sm-4" >
 
  </div>
  
  <div class="col-sm-4" >
  <div class="card" style="width:300px">
 <h1 class="text-center">REST</h1>  
  <img class="card-img-top" src="image19.jpg" alt="Card image"  height="300" style="width:300px ">
    <div class="card-body">
      <h4 class="card-title text-center"></h4>
      <p class="card-text">Your body and muscles nees to get some rest</p>
    </div>
  </div>
  <p><br></p>
  </div>
  
  <div class="col-sm-4" >
  
  </div>
   
  </div>
 
   
  <script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();   
});
</script>
   
  </div>
 
  </div>
</div>
</div>
</body>
</html>
