<?php 
	include('adminNav.php');
 ?>
 <?php 
	if (isset($_POST['add_player'])) {
		$playerName = mysqli_real_escape_string($conn,$_POST['playerName']);
		$playerPosition = mysqli_real_escape_string($conn,$_POST['playerPosition']);
		$country = mysqli_real_escape_string($conn,$_POST['country']);
		
		
		
      $sql_player="INSERT INTO player_infos (p_name,position,country_id) VALUES('$playerName','$playerPosition','$country')";
      $run_sql_player = mysqli_query($conn,$sql_player);
  		
  	
}

		
	
 ?>

<html>
 	<body>
 		<div class="container mb-3">
 			<form class="col-md-7" style="margin: auto;" action="addplayer.php" enctype="multipart/form-data" method="POST" onsubmit="return true">
<!-- player name input field -->
            <div class="form-group mt-1">
               <label for="bookName" style="color:black;">Enter player name</label>
                <input class="form-control" type="text" name="playerName" id="bookName"  onfocus="this.placeholder=''" onblur="this.placeholder=''" placeholder="" required="" style=" color: black;">
            </div>
<!--  input field -->

            <div class="form-group mt-1">
               <label for="bookName" style="color:black;">Enter player position</label>
                <input class="form-control" type="text" name="playerPosition" id="bookName"  onfocus="this.placeholder=''" onblur="this.placeholder=''" placeholder="" required="" style=" color: black;">
            </div>

           
<!-- country field -->
            <div class="form-group">
               <label for="genres" style="color:black;">Selcet country:</label>
                  <select class="form-control" name="country" id="" required="" style="color: black;">
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
<!-- book writer field -->  

            <button type="submit" class="btn btn-success col-md-5" name="add_player" >Add New Player</button>
            
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