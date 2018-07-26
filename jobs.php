<?php include('check_session.php') ?>
<?php include('operations.php') ?>
<?php include('manageheader.php') ?>

<?php

$username = $_SESSION['username'];
    $row = null;
    $_SESSION['editid']='';
    if(! empty($_GET['jobid'])){
        $_SESSION['editid'] = $_GET['jobid'];
        if(! $db ) {
            die('Could not connect: ' . mysqli_error());
         }
         
         $query2 = "SELECT * FROM jobs WHERE jobid='".$_SESSION['editid']."'";
         $result = mysqli_query( $db,$query2);
        
         if(mysqli_num_rows($result)==0 ) {
         }
         else{
             $row = mysqli_fetch_assoc($result) ;
         }
    }

?>

<form method="post" action="jobs.php">
 <!-- Certifications -->
 <div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
        <div  class="card-header">Jobs</div>
        <div class="mdl-cell--12-col mdl-card__supporting-text">
        <?php include('errors.php'); ?>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="job_title" id="job_title" value="<?php echo "{$row['job_title']}"?>">
                <label class="mdl-textfield__label" for="job_title">Job Title </label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" >
                <input class="mdl-textfield__input" type="text" name="role" id="role" value="<?php echo "{$row['role']}"?>">
                <label class="mdl-textfield__label" for="role">Job Role</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:1000px">
                <input class="mdl-textfield__input" type="text" name="company" id="company" value="<?php echo "{$row['company']}"?>">
                <label class="mdl-textfield__label" for="company">Comapany Details</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="skills" id="skills" value="<?php echo "{$row['skills']}"?>">
                <label class="mdl-textfield__label" for="skills">SKills Required </label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" >
                <input class="mdl-textfield__input" type="text" name="desc" id="desc" value="<?php echo "{$row['desc']}"?>">
                <label class="mdl-textfield__label" for="desc">Description</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="salary" id="salary" value="<?php echo "{$row['salary']}"?>">
                <label class="mdl-textfield__label" for="salary">Salary</label>
            </div>
            
            <div>
			<button class="mdl-button mdl-button--colored mdl-button--raised" type="submit" name="jobs">Submit</button>
            </div>
            <div class="succ"><?php if (isset($_SESSION['succ'])) {echo $_SESSION['succ']; unset($_SESSION['succ']);} ?></div>
            <div class="error"><?php if (isset($_SESSION['err'])) {echo $_SESSION['err']; unset($_SESSION['err']);} ?></div>
        </div>
    </div>
    </form>

<?php include('footer.php') ?>