<?php include('check_session.php') ?>
<?php include('manageheader.php') ?>
<?php include('db.php'); include('filter.php'); ?>

<?php 
    if(!empty($_GET['appoint'])){
        $as = $_GET['appoint'];
    }
    if(!empty($_GET['educ'])){
        $educ = $_GET['educ'];
    }
    if(!empty($_GET['per'])){
        $per = $_GET['per'];
    }
    if(!empty($_GET['skills'])){
        $skills = $_GET['skills'];
    }
    
?>
<div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px;width:1000px">
    <div  class="card-header" style="background:#00b9d8;">Filter Applications</div>
    <div class="mdl-cell--12-col" style="padding:10px" >
        <form method="post" action="applicants.php">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:500px">
            <label class="mdl-textfield__label" for="gender">Application Status:</label>
            <label style="margin-left: 110px;" class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                <input type="radio" id="option-1" class="mdl-radio__button" name="as" value="All" <?php if($as=='') echo "checked"; ?>>
                <span class="mdl-radio__label">All</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                <input type="radio" id="option-2" class="mdl-radio__button" name="as" value="Accepted" <?php if($as=='Accepted') echo "checked"; ?> >
                <span class="mdl-radio__label">Accepted</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3">
                <input type="radio" id="option-3" class="mdl-radio__button" name="as" value="Rejected" <?php if($as=='Rejected') echo "checked"; ?> >
                <span class="mdl-radio__label">Rejected</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-4">
                <input type="radio" id="option-4" class="mdl-radio__button" name="as" value="Pending" <?php if($as=='Pending') echo "checked"; ?> >
                <span class="mdl-radio__label">Pending</span>
            </label>
            <button class="mdl-button mdl-button--colored mdl-button--raised" type="submit" name="app" style="font-size:10px;margin-left:20px;">Filter</button>
        </div>
</form>
<form method="post" action="applicants.php">
            <div class="">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="display:inline-block;width:150px">
                    <select class="mdl-textfield__input" id="app_status" name="educ">
                    <option <?php if($educ=='All'){echo "selected";}?> value="All">All Education</option>
                    <option <?php if($educ=="Matriculation(Class X)"){echo "selected";}?> value="Matriculation(Class X)">Matriculation(Class X)</option>
                    <option <?php if($educ=="Intermediate / Class XII"){echo "selected";}?> value="Intermediate / Class XII">Intermediate / Class XII</option>
                    <option <?php if($educ=="Graduation"){echo "selected";}?> value="Graduation">Graduation</option>
                    <option <?php if($educ=="Post Graduation"){echo "selected";}?> value="Post Graduation">Post Graduation</option>
                    </select>
                    <label class="mdl-textfield__label" for="app_status"></label>
                </div>
                <label for="per" style="display:inline-block;padding-bottom:10px;font-size:12px;">Percentage:</label>
                <input  type="number" name="per" id="per" min="0" max="100" tabindex="0" value="<?php echo $per;?>"   style="display:inline-block;padding:5px;margin-left: 40px;font-weight:700">
                <button class="mdl-button mdl-button--colored mdl-button--raised" type="submit" name="perc" style="font-size:10px;margin-left:20px;">Filter</button>
            </div>
</form>
<form method="post" action="applicants.php">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:400px">
                <label class="" for="skills">Search Skills:</label>
                <input class="" type="text" name="skills" id="skills" value="<?php echo $skills;?>" style="padding:5px;width:250px;font-weight:700" >
                
                <button class="mdl-button mdl-button--colored mdl-button--raised" type="submit" name="skil" style="font-size:10px;display:inline-block;margin-left:20px">Filter</button>
            </div>
        </form>
   </div>
</div>

<?php
if(!empty($_GET['jobid'])){
    $_SESSION['jid'] = $_GET['jobid'];
    $query2 = "SELECT * FROM applicants WHERE jobid='".$_SESSION['jid']."'";
}else if(!empty($_GET['appoint'])){
    $query2 = "SELECT applicants.*
    FROM applicants 
    LEFT JOIN r_edu ON applicants.resumeid = r_edu.resumeid 
    LEFT JOIN r_skills ON applicants.resumeid = r_skills.resumeid 
    WHERE applicants.appoint='".$as."' 
    GROUP BY applicants.appid";
}
else if(!empty($_GET['educ']) && !empty($_GET['per'])){
    if($_GET['educ']=='All'){
        $query2 = "SELECT applicants.*
        FROM applicants 
        INNER JOIN r_edu ON applicants.resumeid = r_edu.resumeid 
        INNER JOIN r_skills ON applicants.resumeid = r_skills.resumeid 
        WHERE r_edu.per > '".$per."'
        GROUP BY applicants.appid";
    }
    else{
        $query2 = "SELECT applicants.*
        FROM applicants 
        INNER JOIN r_edu ON applicants.resumeid = r_edu.resumeid 
        INNER JOIN r_skills ON applicants.resumeid = r_skills.resumeid 
        WHERE r_edu.educ ='".$educ."' AND r_edu.per > '".$per."'
        GROUP BY applicants.appid";
    }
}
else if( !empty($_GET['skills'])){
    $query2 = "SELECT applicants.*
    FROM applicants 
    LEFT JOIN r_edu ON applicants.resumeid = r_edu.resumeid 
    LEFT JOIN r_skills ON applicants.resumeid = r_skills.resumeid 
    WHERE r_skills.pro_lang LIKE '%".$skills."%'
    GROUP BY applicants.appid";
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
   <div class="mdl-cell--12-col" style="min-height:75px">

    <table class="mdl-data-table mdl-js-data-table" style="width:1000px;">
    <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Job Title</th>
            <th class="mdl-data-table__cell--non-numeric">Resume Title</th>
            <th class="mdl-data-table__cell--non-numeric">Applicant Name</th>
            <th class="mdl-data-table__cell--non-numeric">Education Percentages</th>
            <th class="mdl-data-table__cell--non-numeric">Skills</th>
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
            
            <td class="mdl-data-table__cell--non-numeric"><?php
            $p_query="SELECT educ,per FROM r_edu WHERE resumeid='". $row[2]."'"; 
            $p_result = mysqli_query( $db,$p_query);
            if(mysqli_num_rows($p_result)==0 ) {
                echo "N/A";
            }
            else{
                while($p_row = mysqli_fetch_array($p_result, MYSQL_NUM)) {
                    echo "<div>".$p_row[0].": <span  style=\"font-weight:700\">".$p_row[1]."</span></div>";
                }
            }
            ?></td>
            <td class="mdl-data-table__cell--non-numeric">
            <?php
            $s_query="SELECT pro_lang,web_tech,tools,os FROM r_skills WHERE resumeid='". $row[2]."'"; 
            $s_result = mysqli_query( $db,$s_query);
            if(mysqli_num_rows($s_result)==0 ) {
                echo "N/A";
            }
            else{
                while($s_row = mysqli_fetch_array($s_result, MYSQL_NUM)) {
                    echo "<div><span style=\"font-weight:700\">Programming languages:</span>".$s_row[0]."</div>";
                    echo "<div><span style=\"font-weight:700\">Web Technologies:</span>".$s_row[1]."</div>";
                    echo "<div><span style=\"font-weight:700\">Tools:</span>".$s_row[2]."</div>";
                    echo "<div><span style=\"font-weight:700\">OS:</span>".$s_row[3]."</div>";
                }
            }
            ?>
            </td>
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