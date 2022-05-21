<?php 
	include('adminNav.php');
 ?>
 <?php 
	if (isset($_POST['add_match'])) {
		$venue = mysqli_real_escape_string($conn,$_POST['venue']);
		$country1 = mysqli_real_escape_string($conn,$_POST['country1']);
		$country2 = mysqli_real_escape_string($conn,$_POST['country2']);
		$status = mysqli_real_escape_string($conn,$_POST['status']);
		
		
      $sql_match="INSERT INTO cricket_match (1st_team,2nd_team,status) VALUES('$country1','$country2','$status')";
      $run_sql_match = mysqli_query($conn,$sql_match);
      $match_id = mysqli_insert_id($conn);
      $sql_related ="INSERT INTO match_info(m_id,venue) VALUES('$match_id','$venue')";
      $runsql = mysqli_query($conn,$sql_related);
  		
  	
}

		
	
 ?>

<html>
 	<body>

 		<div class="container mb-3">
         <div class="container mt-2"><h3 style="color:gray;">Add new match details</h3></div>
 			<form class="col-md-7" style="margin: auto;" action="" enctype="multipart/form-data" method="POST" onsubmit="return true">

            

           
<!-- country field -->
            <div class="form-group">
               <!-- vanue -->
                <div class="form-group mt-1">
               <label for="bookName" style="color:black;">Enter venue name</label>
                <input class="form-control" type="text" name="venue" id="bookName"  onfocus="this.placeholder=''" onblur="this.placeholder=''" placeholder="" required="" style=" color: black;">
               <label for="genres" style="color:black;">Selcet 1st country:</label>
                  <select class="form-control" name="country1" id="" required="" style="color: black;">
                     <?php 
                        $genQuery = "SELECT * FROM country";
                        $rungen = mysqli_query($conn, $genQuery);
                        while ($row=mysqli_fetch_assoc($rungen)) {
                           $con_id = $row['country_id'];
                           $con_name = $row['country_name'];

                     ?>
                        <option value="<?php echo $con_id; ?>" style="background-color:white;"><?php echo $con_name; ?></option>
                     <?php     
                        }
                     ?>
                     
                  </select>
            </div>
<!-- opponent -->
            <div class="form-group">
               <label for="genres" style="color:black;">Selcet 2nd country:</label>
                  <select class="form-control" name="country2" id="" required="" style="color: black;">
                     <?php 
                        $genQuery = "SELECT * FROM country";
                        $rungen = mysqli_query($conn, $genQuery);
                        while ($row=mysqli_fetch_assoc($rungen)) {
                           $con_id = $row['country_id'];
                           $con_name = $row['country_name'];

                     ?>
                        <option value="<?php echo $con_id; ?>" style="background-color:white;"><?php echo $con_name; ?></option>
                     <?php     
                        }
                     ?>
                     
                  </select>
            </div>
            <!-- match status -->
            <div class="form-group">
               <label for="genres" style="color:black;">Selcet match status:</label>
                  <select class="form-control" name="status" id="" required="" style="color: black;">
                     
                        <option value="live" style="background-color:white;">Live</option>
                        <option value="finished" style="background-color:white;">Finished</option>
                        <option value="up" style="background-color:white;">upcomming</option>
                  </select>
            </div>
            <button type="submit" class="btn btn-success col-md-5" name="add_match" >Add New match</button>
            
        </form>
        
 		</div>
 		
 		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 		<script>
 			$(".multiple-select").select2({
               //maximumSelectionLength: 2
            });
 		</script>
 	</body>
 </html>