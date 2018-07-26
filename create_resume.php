<?php include('check_session.php') ?>
<?php include('header.php') ?>
<?php include('db.php') ?>
<?php include('operations.php') ?>


<?php

$username = $_SESSION['username'];
$row['title'] = '';
$row['purpose'] ='';

if(! empty( $_GET['resumeid'])){
    $resumeid = $_GET['resumeid'];
    $_SESSION['rid'] =$resumeid; 
    if(! $db ) {
       die('Could not connect: ' . mysqli_error());
    }
    
    $query2 = "SELECT * FROM resumes WHERE resumeid='".$resumeid."'";
    
    $result = mysqli_query( $db,$query2);
    
    if(mysqli_num_rows($result)==0 ) {
       die('Could not get data: ' . mysqli_error($db));
    }
    
    $row = mysqli_fetch_assoc($result); 
      
}

?>

<form method="post" action="create_resume.php">
 <!-- Quick Information -->
 <div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px;min-height:530px">
        <div  class="card-header" style="background:#00b9d8;"><span>Quick Information</span></div>
        <div class="mdl-cell--12-col mdl-card__supporting-text">
        <?php include('errors.php'); ?>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="title" id="title"  value="<?php echo $row['title'];?>">
                <label class="mdl-textfield__label" for="title">Resume Title</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:1000px" >
                <input class="mdl-textfield__input" type="text" name="purpose" id="purpose" value="<?php echo $row['purpose'];?>">
                <label class="mdl-textfield__label" for="purpose">Resume Purpose</label>
            </div>
    
            <div>
			<button class="mdl-button mdl-button--colored mdl-button--raised" type="submit" name="create_resume">Submit</button>
            </div>
            <div class="succ"><?php if (isset($_SESSION['succ'])) {echo $_SESSION['succ']; unset($_SESSION['succ']);} ?></div>
            <div class="error"><?php if (isset($_SESSION['err'])) {echo $_SESSION['err']; unset($_SESSION['err']);} ?></div>
        
		</div>
    </div>
</form>


<?php include('footer.php') ?>