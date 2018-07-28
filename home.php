<?php include('check_session.php') ?>
<?php include('header.php') ?>
<?php include('db.php') ?>



<?php

$username = $_SESSION['username'];
if(! $db ) {
   die('Could not connect: ' . mysqli_error($db));
}

$query = "SELECT * FROM resumes WHERE username='".$username."'";

$result = mysqli_query( $db,$query);
?>

   <div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
   <div  class="card-header" style="background:#00b9d8;">My Resumes</div>
   <div class="mdl-cell--12-col">

    <table class="mdl-data-table mdl-js-data-table" style="width:1000px">
    <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Resume Title</th>
            <th class="mdl-data-table__cell--non-numeric">Resume Purpose</th>
            <th class="mdl-data-table__cell--non-numeric">Created by</th>
            <th class="mdl-data-table__cell--non-numeric">Edit Title/Purpose</th>
            <th class="mdl-data-table__cell--non-numeric">View Resume Details</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if(mysqli_num_rows($result)==0 ) {
        ?>
        <tr class="mdl-data-table__cell--non-numeric">
            <td>No Resumes Availble</td>
        </tr>
        
        <?php
     }
    ?>

         <?php   while($row1 = mysqli_fetch_array($result, MYSQL_NUM)) {
               ?>

       <tr>
            <!--Each table column is echoed in to a td cell-->
            <td class="mdl-data-table__cell--non-numeric"><?php echo $row1[2]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $row1[3]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $row1[1]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><a class="mdl-button" href="create_resume.php?resumeid=<?php echo $row1[0]; ?>"><i class="material-icons">edit</i> </a></td>
            <td class="mdl-data-table__cell--non-numeric"><a class="mdl-button" href="resume.php?resumeid=<?php  echo $row1[0]; ?>"><i class="material-icons">open_in_new</i> </a></td>
        </tr>
   
<?php
}
?>
 </tbody>
</table>

<?php
if(mysqli_num_rows($result)==0 ) {
        ?>
<div class="lbl_text" style="margin:20px 0 10px 20px"> 
            <a class="mdl-button mdl-button--raised mdl-button--colored rm-btn"   href="apply_jobs.php">Apply</a>
            </div>
               
        <?php
     }
    ?>
   </div>
</div>
<?php

if(! $db ) {
   die('Could not connect: ' . mysqli_error($db));
}

$query2 = "SELECT * FROM applicants WHERE username='".$username."'";

$result2 = mysqli_query( $db,$query2);
?>

 <div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
   <div  class="card-header" style="background:#00b9d8;">Applied Jobs</div>
   <div class="mdl-cell--12-col">

    <table class="mdl-data-table mdl-js-data-table" style="width:1000px">
    <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Job Title</th>
            <th class="mdl-data-table__cell--non-numeric">Resume Title</th>
            <th class="mdl-data-table__cell--non-numeric">Application Status</th>
            <th class="mdl-data-table__cell--non-numeric">Remarks</th>
            <th class="mdl-data-table__cell--non-numeric">Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if(mysqli_num_rows($result2)==0 ) {
        ?>
        <tr >
            <td class="mdl-data-table__cell--non-numeric" colspan="5">No Applications Availble</td>
        </tr>
        
        <?php
     }
    ?>

         <?php   while($row = mysqli_fetch_array($result2, MYSQL_NUM)) {
               ?>

       <tr>
            <!--Each table column is echoed in to a td cell-->
            <td class="mdl-data-table__cell--non-numeric"><?php echo $row[6]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $row[7]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><span class="mdl-chip"
            <?php 
            if ($row[8]=="Accepted"){
                ?> style="background:green;color:white"<?php
            }
            elseif ($row[8]=="Rejected") {
                ?>style="background:red;color:white"<?php
            }
            else{
               ?> style="background:blue;color:white"<?php
            }?>
            
            ><span class="mdl-chip__text"><?php echo $row[8]; ?></span></span></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $row[9]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><a class="mdl-button" href="app_edit.php?appid=<?php echo $row[0]; ?>&jobid=<?php echo $row[1];?>"><i class="material-icons">edit</i> </a></td>
        </tr>
   
<?php
}
?>
 </tbody>
</table>
<?php
if(mysqli_num_rows($result2)==0 ) {
        ?>
<div class="lbl_text" style="margin:20px 0 10px 20px"> 
            <a class="mdl-button mdl-button--raised mdl-button--colored rm-btn"   href="apply_jobs.php">Apply</a>
            </div>
               
        <?php
     }
    ?>
</div>
</div>


<?php include('footer.php') ?>