<?php include('check_session.php') ?>
<?php include('resumeheader.php') ?>
<?php include('db.php') ?>

<?php

   $username = $_SESSION['username'];
    $_SESSION['rid'] = $_GET['resumeid'];
   if(! empty( $_SESSION['rid'])){
      $resumeid = $_SESSION['rid']; 
   if(! $db ) {
      die('Could not connect: ' . mysqli_error());
   }
   
   $q_intro = "SELECT * FROM r_intro WHERE resumeid='".$resumeid."'";
   $q_intro_result = mysqli_query( $db,$q_intro);
   ?>
   <div id="print">
    <div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
    <div  class="card-header" style="background:#00b9d8;">Introduction<a class="rm-btn" style="float:right; color:white" href="r_intro.php?resumeid=<?php echo $_SESSION['rid'] ?>"><i class="material-icons">edit</i> </a></div>
    <div class="mdl-cell--12-col mdl-card__supporting-text">
    <?php
    if(mysqli_num_rows($q_intro_result)>0 ) {
        $intro = mysqli_fetch_assoc($q_intro_result);
        ?>

        
        <div class="lbl_text">
            <label class="lbl_bold" >Full Name:</label>
            <label  ><?php echo "{$intro['fullname']}"?></label>
        </div>
        <div class="lbl_text" style="max-width:1000px">
            <label class="lbl_bold" >Career Objective:</label>
            <label ><?php echo "{$intro['career']}"?></label>
        </div>
        <div class="lbl_text" style="max-width:1000px">
            <label  class="lbl_bold">About Yourself:</label>
            <label  ><?php echo "{$intro['about']}"?></label>
        </div>
        

         <?php 
    }
    else{
        ?>
            <div class="lbl_text" style="max-width:1000px"> Information not available. 
            <a class="mdl-button mdl-button--raised mdl-button--colored rm-btn" style="float:right;"  href="r_intro.php?resumeid=<?php echo $_SESSION['rid'] ?>">Add</a>
            </div>
         
         <?php  
    }?>
    </div>
</div>


   

    <?php

   $q_edu = "SELECT * FROM r_edu WHERE resumeid='".$_SESSION['rid']."'";
   $q_edu_result = mysqli_query( $db,$q_edu);
?>

   <div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px" >
   <div  class="card-header" style="background:#00b9d8;">Education</div>
   <div class="mdl-cell--12-col" style="width:1033px">

    <table class="mdl-data-table mdl-js-data-table" >
    <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Education</th>
            <th class="mdl-data-table__cell--non-numeric">Specialization</th>
            <th class="mdl-data-table__cell--non-numeric">Institution Name</th>
            <th class="mdl-data-table__cell--non-numeric">University/Board</th>
            <th class="mdl-data-table__cell--non-numeric">Year & Month of Completion</th>
            <th class="mdl-data-table__cell--non-numeric">Percentage</th>
            <th class="mdl-data-table__cell--non-numeric  rm-btn">Edit</th>
        </tr>
    </thead>
    <tbody>

         <?php   
         if(mysqli_num_rows($q_edu_result)>0 ) {
         while($edu = mysqli_fetch_array($q_edu_result, MYSQL_NUM)) {
               ?>
       <tr>
            <!--Each table column is echoed in to a td cell-->
            <td class="mdl-data-table__cell--non-numeric"><?php echo $edu[3]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $edu[4]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $edu[5]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $edu[6]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $edu[7]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $edu[8]; ?></td>
            <td class="mdl-data-table__cell--non-numeric  rm-btn"><a class="mdl-button rm-btn" href="r_edu.php?eduid=<?php echo $edu[0]; ?>"><i class="material-icons">edit</i> </a></td>
        </tr>
<?php
}
         }
else{
    ?>
    <div class="lbl_text mdl-card__supporting-text" style="max-width:1000px"> Information not available. </div>
    <?php
}
?>
 </tbody>
</table>

 <div class="lbl_text" style="margin:20px 0 10px 20px"> 
            <a class="mdl-button mdl-button--raised mdl-button--colored rm-btn"   href="r_edu.php?resumeid=<?php echo $_SESSION['rid'] ?>">Add</a>
            </div>
   </div>
</div>


<?php 
 } 
 else{
     header('location:home.php');
 }
 ?>

<?php 
    $q_skills = "SELECT * FROM r_skills WHERE resumeid='".$resumeid."'";
    $q_skills_result = mysqli_query( $db,$q_skills); 
?>
<div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
    <div  class="card-header" style="background:#00b9d8;">Technical Skills<a class="rm-btn" style="float:right; color:white" href="r_skills.php?resumeid=<?php echo $_SESSION['rid'] ?>"><i class="material-icons">edit</i> </a></div>
        <div class="mdl-cell--12-col mdl-card__supporting-text">
        <?php
    if(mysqli_num_rows($q_skills_result)>0 ) {
        $skills = mysqli_fetch_assoc($q_skills_result);
        ?>
        <div class="lbl_text" style="max-width:1000px">
            <label class="lbl_bold" >Programming Languages:</label>
            <label ><?php echo "{$skills['pro_lang']}"?></label>
        </div>
        <div class="lbl_text">
            <label class="lbl_bold" >Web Technologies:</label>
            <label  ><?php echo "{$skills['web_tech']}"?></label>
        </div>
        <div class="lbl_text" style="max-width:1000px">
            <label class="lbl_bold" >Tools & Frameworks:</label>
            <label ><?php echo "{$skills['tools']}"?></label>
        </div>
        <div class="lbl_text" style="max-width:1000px">
            <label class="lbl_bold" >Operating Systems:</label>
            <label ><?php echo "{$skills['os']}"?></label>
        </div>
        <?php 
    }
    else{
        ?>
            <div class="lbl_text" style="max-width:1000px"> Information not available. 
            <a class="mdl-button mdl-button--raised mdl-button--colored rm-btn" style="float:right;"  href="r_skills.php?resumeid=<?php echo $_SESSION['rid'] ?>">Add</a>
            </div>
         
         <?php  
    }?>
    </div>
</div>

<?php 
  $q_cert = "SELECT * FROM r_cert WHERE resumeid='".$resumeid."'";
  $q_cert_result = mysqli_query( $db,$q_cert);
?>

<div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
    <div  class="card-header" style="background:#00b9d8;">Certifications</div>
        <div class="mdl-cell--12-col" style="width:1033px">
        <table class="mdl-data-table mdl-js-data-table" style="width:1033px" >
    <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Certification Name</th>
            <th class="mdl-data-table__cell--non-numeric">Certifying Authority</th>
            <th class="mdl-data-table__cell--non-numeric">Certification URL/Desc</th>
            <th class="mdl-data-table__cell--non-numeric  rm-btn">Edit</th>
        </tr>
    </thead>
    <tbody>

         <?php   
         if(mysqli_num_rows($q_cert_result)>0 ) {
         while($cert = mysqli_fetch_array($q_cert_result, MYSQL_NUM)) {
               ?>
       <tr>
            <!--Each table column is echoed in to a td cell-->
            <td class="mdl-data-table__cell--non-numeric"><?php echo $cert[3]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $cert[4]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $cert[5]; ?></td>
            <td class="mdl-data-table__cell--non-numeric  rm-btn"><a class="mdl-button rm-btn" href="r_cert.php?certid=<?php echo $cert[0]; ?>"><i class="material-icons">edit</i> </a></td>
        </tr>
<?php
}
         }
else{
    ?>
    <div class="lbl_text mdl-card__supporting-text" style="max-width:1000px"> Information not available. </div>
    <?php
}
?>
 </tbody>
</table>

 <div class="lbl_text" style="margin:20px 0 10px 20px"> 
            <a class="mdl-button mdl-button--raised mdl-button--colored rm-btn"   href="r_cert.php?resumeid=<?php echo $_SESSION['rid'] ?>">Add</a>
            </div>
    </div>
</div>

<?php 
$q_exp = "SELECT * FROM r_exp WHERE resumeid='".$resumeid."'";
$q_exp_result = mysqli_query( $db,$q_exp);
?>
<div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
    <div  class="card-header" style="background:#00b9d8;">Work Experiance</div>
        <div class="mdl-cell--12-col">
        <table class="mdl-data-table mdl-js-data-table" style="width:1033px" >
    <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Project Title</th>
            <th class="mdl-data-table__cell--non-numeric">Project Role</th>
            <th class="mdl-data-table__cell--non-numeric">Project Desc</th>
            <th class="mdl-data-table__cell--non-numeric rm-btn">Edit</th>
        </tr>
    </thead>
    <tbody>

         <?php   
         if(mysqli_num_rows($q_exp_result)>0 ) {
         while($exp = mysqli_fetch_array($q_exp_result, MYSQL_NUM)) {
               ?>
       <tr>
            <!--Each table column is echoed in to a td cell-->
            <td class="mdl-data-table__cell--non-numeric"><?php echo $exp[3]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $exp[4]; ?></td>
            <td class="mdl-data-table__cell--non-numeric"><?php echo $exp[5]; ?></td>
            <td class="mdl-data-table__cell--non-numeric rm-btn"><a class="mdl-button rm-btn" href="r_exp.php?expid=<?php echo $exp[0]; ?>"><i class="material-icons">edit</i> </a></td>
        </tr>
<?php
}
         }
else{
    ?>
    <div class="lbl_text mdl-card__supporting-text" style="max-width:1000px"> Information not available. </div>
    <?php
}
?>
 </tbody>
</table>

 <div class="lbl_text" style="margin:20px 0 10px 20px"> 
            <a class="mdl-button mdl-button--raised mdl-button--colored rm-btn"  href="r_exp.php?resumeid=<?php echo $_SESSION['rid'] ?>">Add</a>
            </div>
    </div>
</div>

<?php
$q_personal = "SELECT * FROM r_personal WHERE resumeid='".$resumeid."'";
$q_personal_result = mysqli_query( $db,$q_personal);
?>

<div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
    <div  class="card-header" style="background:#00b9d8;">Personal Information<a class="rm-btn" style="float:right; color:white" href="r_personal.php?resumeid=<?php echo $_SESSION['rid'] ?>"><i class="material-icons">edit</i> </a></div>
        <div class="mdl-cell--12-col mdl-card__supporting-text">
        <?php
    if(mysqli_num_rows($q_personal_result)>0 ) {
        $personal = mysqli_fetch_assoc($q_personal_result);
        ?>
        <div class="lbl_text" style="max-width:1000px">
            <label class="lbl_bold" >Father Name:</label>
            <label ><?php echo "{$personal['fathername']}"?></label>
        </div>
        <div class="lbl_text">
            <label class="lbl_bold" >Gender:</label>
            <label  ><?php echo "{$personal['gender']}"?></label>
        </div>
        <div class="lbl_text" style="max-width:1000px">
            <label class="lbl_bold" >Date of Birth:</label>
            <label ><?php echo "{$personal['dob']}"?></label>
        </div>
        <div class="lbl_text" style="max-width:1000px">
            <label class="lbl_bold" >Nationality:</label>
            <label ><?php echo "{$personal['nationality']}"?></label>
        </div>
        <div class="lbl_text" style="max-width:1000px">
            <label class="lbl_bold" >Marital Status:</label>
            <label ><?php echo "{$personal['ms']}"?></label>
        </div>
        <div class="lbl_text" style="max-width:1000px">
            <label class="lbl_bold" >Languages Known:</label>
            <label ><?php echo "{$personal['lang_known']}"?></label>
        </div>
        <div class="lbl_text" style="max-width:1000px">
            <label class="lbl_bold" >Extra Cirricular Activities:</label>
            <label ><?php echo "{$personal['eca']}"?></label>
        </div>
        <div class="lbl_text" style="max-width:1000px">
            <label class="lbl_bold" >Interests:</label>
            <label ><?php echo "{$personal['interests']}"?></label>
        </div>
        <div class="lbl_text" style="max-width:1000px">
            <label class="lbl_bold" >Hobbies:</label>
            <label ><?php echo "{$personal['hobbies']}"?></label>
        </div>
        <?php 
    }
    else{
        ?>
            <div class="lbl_text" style="max-width:1000px"> Information not available. 
            <a class="mdl-button mdl-button--raised mdl-button--colored rm-btn" style="float:right;"  href="r_personal.php?resumeid=<?php echo $_SESSION['rid'] ?>">Add</a>
            </div>
         
         <?php  
    }?>
    </div>
</div>


<?php 
 $q_contact = "SELECT * FROM r_contact WHERE resumeid='".$resumeid."'";
 $q_contact_result = mysqli_query( $db,$q_contact);
?>

<div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
    <div  class="card-header" style="background:#00b9d8;">Contact Information<a class="rm-btn" style="float:right; color:white" href="r_contact.php?resumeid=<?php echo $_SESSION['rid'] ?>"><i class="material-icons">edit</i> </a></div>
        <div class="mdl-cell--12-col mdl-card__supporting-text">
        <?php
        if(mysqli_num_rows($q_contact_result)>0 ) {
        $contact = mysqli_fetch_assoc($q_contact_result);
        ?>
        <div class="lbl_text" style="max-width:1000px">
            <label class="lbl_bold" >Mobile Number:</label>
            <label ><?php echo "{$contact['mobile']}"?></label>
        </div>
        <div class="lbl_text">
            <label class="lbl_bold" >Email ID:</label>
            <label  ><?php echo "{$contact['email']}"?></label>
        </div>
        <div class="lbl_text" style="max-width:1000px">
            <label class="lbl_bold" >Communication Address:</label>
            <label ><?php echo "{$contact['c_address']}"?></label>
        </div>
        <?php 
    }
    else{
        ?>
            <div class="lbl_text" style="max-width:1000px"> Information not available. 
            <a class="mdl-button mdl-button--raised mdl-button--colored rm-btn" style="float:right;"  href="r_contact.php?resumeid=<?php echo $_SESSION['rid'] ?>">Add</a>
            </div>
         
         <?php  
    }?>
    </div>
</div>
<?php include('dec.php') ?>
</div>

<div style="text-align:center;width:1000px;margin-bottom:20px">
<a id="preview-btn" class="mdl-button mdl-button--raised mdl-color--accent rm-btn" style="color:white" href="#">Print Preview</a>
<a class="mdl-button mdl-button--raised mdl-color--primary" id="print-btn" style="display:none; color:white;width:100px;margin:auto" onclick="printDiv('print')" >Print</a>
</div>
<script>
    window.onload = function() { 
        document.getElementById('preview-btn').addEventListener('click', function() {
            var x = document.getElementsByClassName("rm-btn");
            var i;
            for (i = 0; i < x.length; i++) {
                     x[i].style.display = 'none';
                }
                document.getElementById('print-btn').style.display = 'block';
            });

        };
            function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
                }
</script>


 
<?php include('footer.php') ?>



