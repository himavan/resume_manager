<?php include('check_session.php') ?>
<?php include('operations.php') ?>
<?php include('resumeheader.php') ?>

<?php
$username = $_SESSION['username'];
$resumeid='';
if(  isset($_SESSION['rid'])  ){
    $resumeid = $_SESSION['rid'];
if(! $db ) {
   die('Could not connect: ' . mysqli_error());
}

$query2 = "SELECT * FROM r_contact WHERE resumeid='".$resumeid."'";
$result = mysqli_query( $db,$query2);
$row = null;
if(mysqli_num_rows($result)==0 ) {
}
else{
    $row = mysqli_fetch_assoc($result) ;
}
   ?>


<form method="post" action="r_contact.php">
<!-- Contact Details -->
<div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
        <div  class="card-header">Contact Information</div>
        <div class="mdl-cell--12-col mdl-card__supporting-text">
        <?php include('errors.php'); ?>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="mobile" name="mobile" value="<?php echo "{$row['mobile']}"?>" size="15">
                <label class="mdl-textfield__label" for="mobile">Mobile Number</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="email" name="email" value="<?php echo "{$row['email']}"?>">
                <label class="mdl-textfield__label" for="email">Email ID</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:1000px">
                <input class="mdl-textfield__input" type="text" id="c_address" name="c_address" value="<?php echo "{$row['c_address']}"?>">
                <label class="mdl-textfield__label" for="c_address">Communication Address</label>
            </div>
            <div>
			<button class="mdl-button mdl-button--colored mdl-button--raised" type="submit" name="r_contact">Submit</button>
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