<?php include('check_session.php') ?>
<?php include('operations.php') ?>
<?php include('resumeheader.php') ?>

<?php

$username = $_SESSION['username'];
$resumeid='';
if(  isset($_SESSION['rid'])  ){
    $resumeid = $_SESSION['rid'];
    $row = null;
    if(! empty($_GET['expid'])){
        $_SESSION['editid'] = $_GET['expid'];
        if(! $db ) {
            die('Could not connect: ' . mysqli_error());
         }
         
         $query2 = "SELECT * FROM r_exp WHERE resumeid='".$resumeid."' AND expid='".$_SESSION['editid']."'";
         $result = mysqli_query( $db,$query2);
        
         if(mysqli_num_rows($result)==0 ) {
         }
         else{
             $row = mysqli_fetch_assoc($result) ;
         }
    }
?>

<form method="post" action="r_exp.php">
<!-- Technical Experiance Details -->
<div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
        <div  class="card-header">Work Experiance</div>
        <div class="mdl-cell--12-col mdl-card__supporting-text">
        <?php include('errors.php'); ?>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="pro_title" name="pro_title" value="<?php echo "{$row['pro_title']}"?>">
                <label class="mdl-textfield__label" for="pro_title">Project Title</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" >
                <input class="mdl-textfield__input" type="text" id="pro_role" name="pro_role" value="<?php echo "{$row['pro_role']}"?>">
                <label class="mdl-textfield__label" for="role">Role in Project</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:1000px">
                <input class="mdl-textfield__input" type="text" id="pro_desc" name="pro_desc" value="<?php echo "{$row['pro_desc']}"?>">
                <label class="mdl-textfield__label" for="pro_desc">Project Description</label>
            </div>
            <div>
			<button class="mdl-button mdl-button--colored mdl-button--raised" type="submit" name="r_exp">Submit</button>
            </div>
            <div class="succ"><?php if (isset($_SESSION['succ'])) {echo $_SESSION['succ']; unset($_SESSION['succ']);} ?></div>
            <div class="error"><?php if (isset($_SESSION['err'])) {echo $_SESSION['err']; unset($_SESSION['err']);} ?></div>
        </div>
    </div>
</form>
    <?php 
}
else
{
    header('location:home.php');
}
?>
<?php include('footer.php') ?>