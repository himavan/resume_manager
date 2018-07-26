<?php include('check_session.php') ?>
<?php include('header.php') ?>
<?php include('operations.php') ?>



<?php

$username = $_SESSION['username'];
$query1='';$query2='';
if(!empty($_GET['jobid'])){
    $_SESSION['editid'] = $_GET['jobid'];
}
$query1 = "SELECT * FROM jobs WHERE jobid='".$_SESSION['editid']."'";
$result = mysqli_query( $db,$query1);

if(! $db ) {
   die('Could not connect: ' . mysqli_error($db));
}


?>

<div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px;">
    <div  class="card-header" style="background:#00b9d8;width:1000px">Job Details</div>
    <div class="mdl-cell--12-col mdl-card__supporting-text">
    <?php
        if(mysqli_num_rows($result)>0 ) {
        $row = mysqli_fetch_assoc($result);
        ?>   
        <div class="lbl_text">
            <label class="lbl_bold" >Job Title:</label>
            <label  ><?php echo "{$row['job_title']}"?></label>
        </div>
        <div class="lbl_text" style="max-width:1000px">
            <label class="lbl_bold" >Job Role:</label>
            <label ><?php echo "{$row['role']}"?></label>
        </div>
        <div class="lbl_text" style="max-width:1000px">
            <label  class="lbl_bold">Comapany Details:</label>
            <label  ><?php echo "{$row['company']}"?></label>
        </div>
        <div class="lbl_text">
            <label class="lbl_bold" >Required Skills:</label>
            <label  ><?php echo "{$row['skills']}"?></label>
        </div>
        <div class="lbl_text" style="max-width:1000px">
            <label class="lbl_bold" >Job Description:</label>
            <label ><?php echo "{$row['desc']}"?></label>
        </div>
        <div class="lbl_text" style="max-width:1000px">
            <label  class="lbl_bold">Job Salary:</label>
            <label  ><?php echo "{$row['salary']}"?></label>
        </div>
         <?php  } ?>
   </div>
</div>

<?php 

$query2 = "SELECT resumeid,title FROM resumes WHERE username='".$_SESSION['username']."'";
$result2 = mysqli_query( $db,$query2);
$row1 = null;
$row2 = null;
            if(!empty($_GET['appid'])){
                $query3 = "SELECT resumeid FROM applicants WHERE appid='".$_GET['appid']."'";
                $result3 = mysqli_query( $db,$query3);
                if(mysqli_num_rows($result3)>0 ) {
                    $row2 = mysqli_fetch_assoc($result3);
                }
            }

?>

<div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px;height:290px">
    <div  class="card-header" style="background:#00b9d8;">Select Resume</div>
    <div class="mdl-cell--12-col mdl-card__supporting-text">
    <form method="post" action="app_edit.php">
    <?php include('errors.php'); ?>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <select class="mdl-textfield__input" id="resume" name="resume">
        <option value="Select">Select</option>
        <?php   
         if(mysqli_num_rows($result2)>0 ) {
         while($row1 = mysqli_fetch_array($result2, MYSQL_NUM)) {
               ?>
          <option value="<?php echo "$row1[0]"?>" 
          <?php if($row2['resumeid']==$row1[0]) {echo "selected";} ?>
          >
          <?php echo "{$row1[1]}";?></option>
          <?php }} ?>
        </select>
        <label class="mdl-textfield__label" for="resume">Resume</label>
      </div>
        
            <div>
			<button class="mdl-button mdl-button--colored mdl-button--raised" type="submit" name="app_edit">Submit</button>
            </div>
    </form>
   </div>
</div>


<?php include('footer.php') ?>