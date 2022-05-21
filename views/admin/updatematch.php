<?php 
    include('adminNav.php');
?>
<?php 
    if (isset($_GET['edit'])) {
        $match_id = $_GET['edit'];

        $retive_match = "SELECT *, (SELECT c.country_name FROM country c where cm.1st_team=c.country_id) 1st_country,(SELECT c.country_name FROM country c where cm.2nd_team=c.country_id) 2nd_country,cm.status FROM cricket_match cm WHERE cm.m_id = '$match_id'";
        $sqlrun = mysqli_query($conn,$retive_match);
        $post = mysqli_fetch_assoc($sqlrun);

    }

?>
    <?php
    if (isset($_POST['update'])){
        $mid = $_POST['mid'];
        $status = $_POST['status'];
        $st_team_score = $_POST['1st_team_score'];
        $st_team_wicket = $_POST['1st_team_wicket'];
        $nd_team_score = $_POST['2nd_team_score'];
        $nd_team_wicket = $_POST['2nd_team_wicket'];

        $updatesql = "UPDATE cricket_match c SET c.1st_team_score='$st_team_score', c.1st_team_wicket='$st_team_wicket', c.2nd_team_score='$nd_team_score', c.2nd_team_wicket='$nd_team_wicket', c.status='$status' WHERE c.m_id='$mid'";
        $runsqll = mysqli_query($conn,$updatesql);
    }
 ?>
<div class="container">
    <h3>Update score of this match</h3>
    <form action="" method="POST">
    <div class="form-group">
               <label for="genres" class="mt-2 mb-2" style="color:black;">1st country:</label>
                  <select class="form-control"  id=""  style="color: black;">
                     
                        <option value="" disabled selected><?php echo $post['1st_country']; ?></option>
                  </select>
                  <label for="genres" style="color:black;">2nd country:</label>
                  <select class="form-control"  id=""  style="color: black;">
                     
                        <option value="" disabled selected><?php echo $post['2nd_country']; ?></option>
                  </select>

            </div>
            <input type="hidden" name="mid" value="<?php echo $post['m_id'] ?>" >
            <div class="form-group mt-1">
               <label for="bookPrice" style="color:green">Enter <?php echo $post['1st_country']; ?>'s score</label>
                <input class="form-control" type="number" name="1st_team_score" id="bookPrice"  onfocus="this.placeholder=''" onblur="this.placeholder='Enter score!'" placeholder="Enter the score."  style=" color: black;" value="<?php echo $post['1st_team_score'] ?>" min='0'>
            </div>

            <div class="form-group mt-1">
               <label for="bookPrice" style="color:green">Enter <?php echo $post['1st_country']; ?>'s wicket</label>
                <input class="form-control" type="number" name="1st_team_wicket" id="bookPrice"  onfocus="this.placeholder=''" onblur="this.placeholder='Enter wicket!'" placeholder="Enter the wicket"  style=" color: black;" value="<?php echo $post['1st_team_wicket'] ?>" min='0'>
            </div>
            <div class="form-group mt-1">
               <label for="bookPrice" style="color:red">Enter <?php echo $post['2nd_country']; ?>'s score</label>
                <input class="form-control" type="number" name="2nd_team_score" id="bookPrice"  onfocus="this.placeholder=''" onblur="this.placeholder='Enter score!'" placeholder="Enter the score."  style=" color: black;" value="<?php echo $post['2nd_team_score'] ?>" min='0'>
            </div>
            <div class="form-group mt-1">
               <label for="bookPrice" style="color:red">Enter <?php echo $post['2nd_country']; ?>'s wicket</label>
                <input class="form-control" type="number" name="2nd_team_wicket" id="bookPrice"  onfocus="this.placeholder=''" onblur="this.placeholder='Enter wicket!'" placeholder="Enter the wicket"  style=" color: black;" value="<?php echo $post['2nd_team_wicket'] ?>" min='0'>
            </div>
            <!-- match status -->
            <div class="form-group">
               <label for="genres" style="color:black;">Selcet match status:</label>
                  <select class="form-control" name="status" id=""  style="color: black;">
                        <option value="<?php echo $post['status'] ?>" selected style="background-color:white;"><?php echo $post['status']; ?></option>
                        <option value="live" style="background-color:white;">Live</option>
                        <option value="finished" style="background-color:white;">Finished</option>
                        <option value="up" style="background-color:white;">upcomming</option>
                  </select>
            </div>
            <button type="submit" class="btn btn-success col-md-5" name="update" >Update!</button>
        </form>
    
</div>