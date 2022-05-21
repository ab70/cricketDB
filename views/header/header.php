<?php 
  $path = "/cricketDB/";
  session_start();
  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href=" <?php echo $path ?>/assets/css/custom.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous" ></script>

</head>
<body>

	<!-- Nav bar  -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo $path ?>/views/" >CricketDB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $path ?>/views/home.php">Live Score</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $path ?>/views/allmatches.php">All matches</a>
      </li>
      
      
      
   </ul>

    <ul class="navbar-nav mr-4">
      <li class="nav-item dropdown usernav">

        <a class="nav-link dropdown-toggle" class="nav-link dropdown-toggle"  id="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href=""><img src="<?php echo $path ?>assets/img/user.png" >
          <?php if(isset($_SESSION['username'])){
            echo $_SESSION['username'];
            ?>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/cse411/project/views/user/userProfile.php">User Profile</a>
          <a class="dropdown-item" href="<?php echo $path ?>views/logout.php">Log out</a>
        </div>
          <?php } 
          else{
            echo "Login";
            ?>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        
          <a class="dropdown-item" href="<?php echo $path ?>views/admin/adminLogin.php">Admin</a>
          
          
        </div>

          <?php } ?>
            
          
        </a>
        
      </li>
    </ul>
    
    
  </div>
</nav>


</body>
</html>