<?php include('check_session.php') ?>
<?php include('manageheader.php') ?>
<?php include('db.php') ?>

<?php
if(!empty($_GET['jobid'])){
    $_SESSION['jid'] = $_GET['jobid'];
    $query2 = "SELECT * FROM applicants WHERE jobid='".$_SESSION['jid']."'";
}
else{
    $query2 = "SELECT * FROM applicants WHERE man_un='".$_SESSION['username']."'";
}
$username = $_SESSION['username'];
if(! $db ) {
   die('Could not connect: ' . mysqli_error($db));
}

$result = mysqli_query( $db,$query2);

?>

   <div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
   <div  class="card-header" style="background:#00b9d8;">Applications</div>
   <div class="mdl-cell--12-col" style="min-height:475px">

    <table class="mdl-data-table mdl-js-data-table" style="width:1000px;">
    <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Job Title</th>
            <th class="mdl-data-table__cell--non-numeric">Resume Title</th>
            <th class="mdl-data-table__cell--non-numeric">Applicant Name</th>
            <th class="mdl-data-table__cell--non-numeric">Application Status</th>
            <th class="mdl-data-table__cell--non-numeric">Remarks</th>
            <th class="mdl-data-table__cell--non-numeric">Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if(mysqli_num_rows($result)==0 ) { ?>
        <tr>
        <td class="mdl-data-table__cell--non-numeric" colspan="7"> No Applicats to display</td>
        </tr>
     <?php }
     ?>

         <?php   while($row = mysqli_fetch_array($result, MYSQL_NUM)) {
               ?>

       <tr>
            <!--Each table column is echoed in to a td cell-->
            <td class="mdl-data-table__cell--non-numeric"><?php echo $row[6]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $row[7]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $row[5]; ?></td>
            <td class="mdl-data-table__cell--non-numeric">
            <span class="mdl-chip"
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
            
            ><span class="mdl-chip__text"><?php echo $row[8]; ?></span></span>
            
            </td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $row[9]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><a class="mdl-button" href="appoint.php?appid=<?php echo $row[0]; ?>&jobid=<?php echo $row[1]; ?>&resumeid=<?php echo $row[2]; ?>"><i class="material-icons">open_in_new</i> </a></td>
            
        </tr>
   
<?php
}
?>
 </tbody>
</table>
   </div>
</div>


<?php include('footer.php') ?>