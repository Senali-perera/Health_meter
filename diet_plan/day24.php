<!DOCTYPE html>
<html lang="en">
<head>
  <title>DAY 24</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  
 .hero-image {
  background-image: url("image21.jpg");
  background-color: #cccccc;
    height: 750px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
div.  {
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
  <div class="col-sm-10" > <h1 class="text-center">DAY 24</h1>
  
  <div class="row">
  
  <div class="col-sm-6" >
  <div class="card" style="width:100%; background-color:rgb(102, 255, 102);">    
    <div class="card-body">
      <h3 class="card-title text-center"><b>BREAKFAST</b></h3>
      <p class="card-text"></p>
	  <ul style="list-style-type:circle;">
  <li style="font-size:150%;">Tea or Coffee (better if without sugar and milk)</li>
  <li style="font-size:150%;">Hash Browns</li>
</ul>   
    </div>
  </div>
   <p><br></p>
 </div>
 
 <div class="col-sm-6" >
  <div class="card" style="width:100%; background-color: rgb(255, 217, 102)">    
    <div class="card-body">
      <h3 class="card-title text-center"><b>SNACKS</b></h3>
      <p class="card-text"></p>
	  <ul style="list-style-type:circle;">
  <li style="font-size:150%;">1 to 2 Cups of Fresh Fruit</li>
  
</ul>   
    </div>
  </div>
   <p><br></p>
 </div>
 
 </div>
 
  <div class="row">
  
  <div class="col-sm-6" >
  <div class="card" style="width:100%; background-color:rgb(255, 51, 51)">    
    <div class="card-body">
      <h3 class="card-title text-center"><b>LUNCH</b></h3>
      <p class="card-text"></p>
	  <ul style="list-style-type:circle;">
  <li style="font-size:150%;">1 Orange</li>
  <li style="font-size:150%;">Yogurt</li>
</ul>   
    </div>
  </div>
   <p><br></p>
 </div>
 
 <div class="col-sm-6" >
  <div class="card" style="width:100%; background-color: rgb(102, 255, 217)">    
    <div class="card-body">
      <h3 class="card-title text-center"><b>DINNER</b></h3>
      <p class="card-text"></p>
	  <ul style="list-style-type:circle;">
  <li style="font-size:150%;">Yogurt</li>
  <li style="font-size:150%;">Any grilled or boiled seafood</li>
</ul>   
    </div>
  </div>
   <p><br></p>
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
