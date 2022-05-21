<?php 
	include('header/header.php');
    include('../functions/db.php');
 ?>
 <?php 
    if (isset($_GET['nav-search'])) {
            $name = $_GET['nav-search'];
            $matches="SELECT *,(SELECT c.country_name FROM country c where cm.1st_team=c.country_id) 1st_country,(SELECT c.country_name FROM country c where cm.2nd_team=c.country_id) 2nd_country,cm.status FROM cricket_match cm  ";
            
         }
         else{
            $matches="SELECT *,(SELECT c.country_name FROM country c where cm.1st_team=c.country_id) 1st_country,(SELECT c.country_name FROM country c where cm.2nd_team=c.country_id) 2nd_country,cm.status FROM cricket_match cm ";

         }
  ?>

 <body>
 	<div class="container"><h3 style="color: gray;">Live Matches</h3></div>
     <div class="container">
    <label for="Add new Writers Name">All matches</label>
    <div class="search my-2 col-md-12">
        <form class="form-inline my-2 my-lg-1 ">
            <input class="form-control mr-sm-2" type="search" placeholder="Search by team name" aria-label="Search" name="nav-search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search </button>
        </form>
    </div>
     <table class="table table-dark"  style="border: 6px solid gray;">
 </div>

      <tr>
        <th class="col-md-8" colspan="3" style="text-align: center;">Match Between </th>
        <th class="col-md-2">Status</th>
        <th class="col-md-2">Action</th>

        
      </tr>
    
    <?php 

       
        $runsql = mysqli_query($conn, $matches);
        while ($post = mysqli_fetch_assoc($runsql)) {

        ?>
        <tr>
        <td><h5 style="color:green"><?php echo $post['1st_country']; ?> </h5><h5> <?php echo $post['1st_team_score'] ?>/<?php echo $post['1st_team_wicket']; ?> </h5> </td><td>VS</td><td><h5 style="color:red"><?php echo $post['2nd_country']; ?></h5><h5> <?php echo $post['2nd_team_score'] ?>/<?php echo $post['2nd_team_wicket']; ?> </h5> </td>

        <td><h5 style="color:green"><?php echo $post['status']; ?> </h5></td>
        
        <td>
        <a href="details.php?match=<?php echo $post['m_id'] ?>" class="btn btn-success">view</a>

        
    </td>
        
    </tr>
        <?php   
        }

     ?>
      
        
        
      
      
      
    
  </table>
 </body>
