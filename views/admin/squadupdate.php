<?php 
    include('adminNav.php');
 ?>

 <?php 
 	if (isset($_GET['edit'])) {
 		$mid= $_GET['edit'];
 		$sql = "SELECT *,(SELECT c.country_name FROM country c where cm.1st_team=c.country_id) st_country,(SELECT c.country_name FROM country c where cm.2nd_team=c.country_id) nd_country,cm.status FROM cricket_match cm  WHERE  cm.m_id='$mid'";
 		$sql_reun = mysqli_query($conn,$sql);
 		$post = mysqli_fetch_array($sql_reun);
 		$st_team= $post['1st_team'];
 		$nd_team= $post['2nd_team'];
 		$st_country=$post['st_country'];
 		$nd_country=$post['nd_country'];
 	}

 	if(isset($_POST['add_squad'])){
      $mid=$_POST['mid'];
 		$first = $_POST['player0'];
 		$second = $_POST['player1'];
      $third = $_POST['player2'];
      foreach ($first as $i) {
         $sql_writers = "INSERT INTO player(m_id,p_id) VALUES('$mid','$i')";
         $run_sql_player = mysqli_query($conn,$sql_writers);

 	}
   foreach ($second as $j) {
         $sql_writerss = "INSERT INTO player(m_id,p_id) VALUES('$mid','$j')";
         $run_sql_player1 = mysqli_query($conn,$sql_writerss);

   }
   foreach ($third as $k) {
         $sql_writersss = "INSERT INTO match_official(m_id,u_id) VALUES('$mid','$k')";
         $run_sql_player2 = mysqli_query($conn,$sql_writersss);

   }
}
  ?>
  <div class="container mb-3">
  	<h3 style="color:gray">Playing Squad & official</h3>
 			<form class="col-md-7" style="margin: auto;" action="" enctype="multipart/form-data" method="POST" onsubmit="return true">
 				<input type="hidden" name="mid" value="<?php echo $mid ?>">
 			<div class="form-group">
               <label for="writer" style="color:black;">Selcet the squad of the <?php echo "$st_country"; ?>:</label>
                  <select class="form-control multiple-select" name="player0[]" id="" required="" style="color: black;" multiple>
                     <?php 
                        $wriQuery = "SELECT * FROM player_infos where country_id='$st_team' ";
                        $runwri = mysqli_query($conn, $wriQuery);
                        while ($row=mysqli_fetch_assoc($runwri)) {
                           $wri_id = $row['p_id'];
                           $wri_name = $row['p_name'];

                     ?>
                        <option value="<?php echo $wri_id; ?>" style="background-color:white;"><?php echo $wri_name; ?></option>
                     <?php     
                        }
                     ?>
                     
                  </select>
            </div>
            <div class="form-group">
               <label for="writer" style="color:black;">Selcet the squad of the <?php echo "$nd_country"; ?>:</label>
                  <select class="form-control multiple-select" name="player1[]" id="" required="" style="color: black;" multiple>
                     <?php 
                        $wriQuery = "SELECT * FROM player_infos where country_id='$nd_team' ";
                        $runwri = mysqli_query($conn, $wriQuery);
                        while ($row=mysqli_fetch_assoc($runwri)) {
                           $wri_id = $row['p_id'];
                           $wri_name = $row['p_name'];

                     ?>
                        <option value="<?php echo $wri_id; ?>" style="background-color:white;"><?php echo $wri_name; ?></option>
                     <?php     
                        }
                     ?>
                     
                  </select>
            </div>
            <div class="form-group">
               <label for="writer" style="color:black;">Selcet the match officials of the game:</label>
                  <select class="form-control multiple-select" name="player2[]" id="" required="" style="color: black;" multiple>
                     <?php 
                        $wriQuery = "SELECT * FROM umpire ";
                        $runwri = mysqli_query($conn, $wriQuery);
                        while ($row=mysqli_fetch_assoc($runwri)) {
                           $wri_id = $row['u_id'];
                           $wri_name = $row['u_name'];

                     ?>
                        <option value="<?php echo $wri_id; ?>" style="background-color:white;"><?php echo $wri_name; ?></option>
                     <?php     
                        }
                     ?>
                     
                  </select>
            </div>
             <button type="submit" class="btn btn-success col-md-5" name="add_squad" >Final squad</button>
 			</form>


 			<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 		<script>
 			$(".multiple-select").select2({
               maximumSelectionLength: 11
            });
 		</script>