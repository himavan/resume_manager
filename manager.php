<?php include('check_session.php') ?>
<?php include('manageheader.php') ?>
<?php include('db.php') ?>

<?php

$username = $_SESSION['username'];
if(! $db ) {
   die('Could not connect: ' . mysqli_error($db));
}

$query2 = "SELECT * FROM jobs WHERE username='".$username."'";
$result = mysqli_query( $db,$query2);

?>

   <div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
   <div  class="card-header" style="background:#00b9d8;">Jobs</div>
   <div class="mdl-cell--12-col" style="min-height:475px">

    <table class="mdl-data-table mdl-js-data-table" style="width:1000px;">
    <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Job Title</th>
            <th class="mdl-data-table__cell--non-numeric">Role</th>
            <th class="mdl-data-table__cell--non-numeric">Company Details</th>
            <th class="mdl-data-table__cell--non-numeric">Skills Required</th>
            <th class="mdl-data-table__cell--non-numeric">Description</th>
            <th class="mdl-data-table__cell--non-numeric">Salary</th>
            <th class="mdl-data-table__cell--non-numeric">Applied</th>
            <th class="mdl-data-table__cell--non-numeric"></th>
        </tr>
    </thead>
    <tbody>
    <?php
    if(mysqli_num_rows($result)==0 ) { ?>
        <tr>
        <td class="mdl-data-table__cell--non-numeric" colspan="7"> No Jobs to Display</td>
        </tr>
     <?php }
     ?>

         <?php   while($row = mysqli_fetch_array($result, MYSQL_NUM)) {
               ?>

       <tr>
            <!--Each table column is echoed in to a td cell-->
            <td class="mdl-data-table__cell--non-numeric"><?php echo $row[2]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $row[3]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $row[4]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $row[5]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $row[6]; ?></td>
            <td class=""><?php echo $row[7]; ?></td>
            <td class="">
            <button class="mdl-button mdl-button--raised mdl-js-button mdl-button--icon" style="font-size:14px">
 

            <?php
            $jid = $row[0];
            $c_query = "SELECT COUNT(jobid) AS jobidcount FROM applicants where jobid='".$jid."';";
            $c_result = mysqli_query( $db,$c_query);
            $c_row = mysqli_fetch_assoc($c_result) ;
            echo $c_row['jobidcount'];
            ?></button></td>
            <td class="mdl-data-table__cell--non-numeric">
                <button id="demo-menu-lower-right<?php echo $row[0] ?>"
                class="mdl-button mdl-js-button mdl-button--icon">
                <i class="material-icons">more_vert</i>
                </button>
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu" for="demo-menu-lower-right<?php echo $row[0] ?>">
                <li class="mdl-menu__item">
                    <a style="text-decoration:none;padding:10px"  href="jobs.php?jobid=<?php echo $row[0]; ?>">Edit Job </a>
                </li>
                <li class="mdl-menu__item">
                    <a style="text-decoration:none;padding:10px" href="applicants.php?jobid=<?php echo $row[0]; ?>">View Applications</a>
                    </li>
                </ul>
            
            
            </td>
            
        </tr>
   
<?php
}
?>
 </tbody>
</table>
<div class="lbl_text" style="margin:20px 0 10px 20px"> 
            <a class="mdl-button mdl-button--raised mdl-button--colored rm-btn"   href="jobs.php">Add</a>
            </div>
   </div>
</div>


<?php include('footer.php') ?>