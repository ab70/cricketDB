<?php 
	include('header/header.php');
    include('../functions/db.php');
 ?>
 <?php 
    if (isset($_GET['match'])) {
        $match_id = $_GET['match'];

        $match="SELECT *,(SELECT c.country_name FROM country c where cm.1st_team=c.country_id) 1st_country,(SELECT c.country_name FROM country c where cm.2nd_team=c.country_id) 2nd_country,cm.status FROM cricket_match cm  WHERE cm.m_id='$match_id'";

        $runsql = mysqli_query($conn, $match);
        ?>
        <div class="container"><h3 style="color: gray;">Live Match Details</h3></div>
     <div class="container">
        
        <table class="table table-dark"  style="border: 6px solid gray;">
 </div>

      <tr>
        <th class="col-md-8" colspan="3" style="text-align: center;">Match Between </th>
        <th class="col-md-2">Status</th>
        

        
      </tr>
        <?php
        while ($post = mysqli_fetch_assoc($runsql)) {
            $st_team = $post['1st_team'];
            $name1 = $post['1st_country'];
            $name2 = $post['2nd_country'];
            $nd_team = $post['2nd_team'];
        ?>
        <tr>
        <td><h5 style="color:green"><?php echo $post['1st_country']; ?> </h5><h5> <?php echo $post['1st_team_score'] ?>/<?php echo $post['1st_team_wicket']; ?> </h5> </td><td>VS</td><td><h5 style="color:red"><?php echo $post['2nd_country']; ?></h5><h5> <?php echo $post['2nd_team_score'] ?>/<?php echo $post['2nd_team_wicket']; ?> </h5> </td>

        <td><h5 style="color:green"><?php echo $post['status']; ?> </h5></td>
        
        <td>
        

        
    </td>
        
    </tr>
        <?php   
        }
    }

     ?>
      
        
        
      
      
      
    
  </table>
  <div class="row">
      <div class="column col-md-4">
          <table class="table table-dark"  style="border: 6px solid gray;">
            <tr>
                <th style="color: green;"><?php echo $name1; ?> Squad</th>

                
            </tr>
              <?php 
                $st_squad = "SELECT * FROM player_infos pi INNER JOIN player p ON pi.p_id=          p.p_id WHERE p.m_id = '$match_id' AND pi.country_id ='$st_team' ";
                $sqlst_team =mysqli_query($conn,$st_squad);
                while ($row1=mysqli_fetch_assoc($sqlst_team)) {
                    
                
                 ?>
                 <tr>
                     <td> <?php echo $row1['p_name']; ?> </td>
                 </tr>
<?php 
}
 ?>
          </table>
      </div>
      <div class="column col-md-4">
          <table class="table table-dark"  style="border: 6px solid gray;">
            <tr>
                <th style="color: red;"><?php echo $name1; ?> Squad</th>
            </tr>
              <?php 
                $nd_squad = "SELECT * FROM player_infos pi INNER JOIN player p ON pi.p_id=          p.p_id WHERE p.m_id = '$match_id' AND pi.country_id ='$nd_team' ";
                $sqlnd_team =mysqli_query($conn,$nd_squad);
                while ($row2=mysqli_fetch_assoc($sqlnd_team)) {
                    
                
                 ?>
                 <tr>
                     <td> <?php echo $row2['p_name']; ?> </td>
                 </tr>
<?php 
}
 ?>
          </table>
      </div>
      <div class="column col-md-4">
          <table class="table table-dark"  style="border: 6px solid gray;">
            <tr>
                <th style="color: dimgray;">Officials</th>
            </tr>
             <?php 
                $official_squad = "SELECT * FROM umpire u INNER JOIN match_official m ON u.u_id=m.u_id WHERE m.m_id='$match_id'";
                $official =mysqli_query($conn,$official_squad);
                while ($row3=mysqli_fetch_assoc($official)) {
                    
                
                 ?>
                 <tr>
                     <td> <?php echo $row3['u_name']; ?> </td>
                 </tr>
<?php 
}
 ?>
              
          </table>
      </div>
  </div>
   