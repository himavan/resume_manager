<?php include('db.php') ?>

<?php
if(! $db ) {
   die('Could not connect: ' . mysqli_error($db));
}

$query2 = "SELECT * FROM jobs ";

$result = mysqli_query( $db,$query2);
?>

   <div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px;min-height:80vh">
   <div  class="card-header" style="background:#00b9d8;">Jobs</div>
   <div class="mdl-cell--12-col">

    <table class="mdl-data-table mdl-js-data-table" style="width:1000px">
    <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Job Title</th>
            <th class="mdl-data-table__cell--non-numeric">Job Role</th>
            <th class="mdl-data-table__cell--non-numeric">Company Details</th>
            <th class="mdl-data-table__cell--non-numeric">Skills</th>
            <th class="mdl-data-table__cell--non-numeric">Job Description</th>
            <th>Job Salary(&#8377;)</th>
            <th class="mdl-data-table__cell--non-numeric index-hide">Apply</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if(mysqli_num_rows($result)==0 ) {
        ?>
        <tr class="mdl-data-table__cell--non-numeric">
            <td>No Jobs Availble</td>
        </tr>
        
        <?php
     }
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
            <td ><?php echo $row[7]; ?></td>
            <td class="mdl-data-table__cell--non-numeric index-hide"><a class="mdl-button mdl-button--raised mdl-button--primary" href="app_edit.php?jobid=<?php echo $row[0]; ?>">Apply </a></td>
            
        </tr>
   
<?php
}
?>
 </tbody>
</table>
   </div>
</div>
