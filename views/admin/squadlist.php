<?php 
    include('adminNav.php');
 ?>
 <div class="container">
    <label for="Add new Writers Name">Live and upcomming matches</label>
     <table class="table table-dark"  style="border: 6px solid gray;">
 </div>

      <tr>
        <th class="col-md-6">Match Between </th>
        <th class="col-md-2">Status</th>
        <th class="col-md-2">Action</th>

        
      </tr>
    
    <?php 

    	$matches="SELECT cm.m_id,cm.status,(SELECT c.country_name FROM country c where cm.1st_team=c.country_id) 1st_country,(SELECT c.country_name FROM country c where cm.2nd_team=c.country_id) 2nd_country,cm.status FROM cricket_match cm  WHERE cm.status LIKE 'up' OR cm.status LIKE 'live'";
    	$runsql = mysqli_query($conn, $matches);
  		while ($post = mysqli_fetch_assoc($runsql)) {

  		?>
  		<tr>
  		<td><h5 style="color:green"><?php echo $post['1st_country']; ?> </h5>VS <h5 style="color:red"><?php echo $post['2nd_country']; ?> </h5></td>
        <td><h5 style="color:green"><?php echo $post['status']; ?> </h5></td>
  		
  		<td>
        <a href="squadupdate.php?edit=<?php echo $post['m_id'] ?>" class="btn btn-success">Set squad & official</a>

        
  	</td>
  		
  	</tr>
  		<?php	
  		}

     ?>
      
        
        
      
      
      
    
  </table>