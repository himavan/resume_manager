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

$query2 = "SELECT * FROM r_personal WHERE resumeid='".$resumeid."'";
$result = mysqli_query( $db,$query2);
$row = null;
if(mysqli_num_rows($result)==0 ) {
}
else{
    $row = mysqli_fetch_assoc($result) ;
}
   ?>

<form method="post" action="r_personal.php">

 <!-- Personal Details -->
 <div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
        <div  class="card-header">Personal Details & Interests</div>
        <div class="mdl-cell--12-col mdl-card__supporting-text">
        <?php include('errors.php'); ?>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="fathername" id="fathername" value="<?php echo "{$row['fathername']}"?>">
                <label class="mdl-textfield__label" for="fathername">Father's Name</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" >
                <label class="mdl-textfield__label" for="gender">Gender</label>
                <label style="margin-left: 70px;" class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                    <input type="radio" id="option-1" class="mdl-radio__button" name="gender" value="Male" <?php if($row['gender'] =='Male') {echo "checked";}?>>
                    <span class="mdl-radio__label">Male</span>
                </label>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                    <input type="radio" id="option-2" class="mdl-radio__button" name="gender" value="Female" <?php if($row['gender'] =='Female') {echo "checked";}?>>
                    <span class="mdl-radio__label">Female</span>
                </label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="">
                <input class="mdl-textfield__input" type="date" name="dob" id="dob" value="<?php echo "{$row['dob']}"?>">
                <label class="mdl-textfield__label" for="dob">Date of Birth</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="">
                <input class="mdl-textfield__input" type="text" name="nationality" id="nationality"value="<?php echo "{$row['nationality']}"?>">
                <label class="mdl-textfield__label" for="nationality">Nationality</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="">
                <input class="mdl-textfield__input" type="text" name="ms" id="ms" value="<?php echo "{$row['ms']}"?>">
                <label class="mdl-textfield__label" for="ms">Marital Status</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="">
                <input class="mdl-textfield__input" type="text" name="lang_known" id="lang_known" value="<?php echo "{$row['lang_known']}"?>">
                <label class="mdl-textfield__label" for="lang_known">Languages known</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:1000px" >
                <input class="mdl-textfield__input" type="text" name="eca" id="eca" value="<?php echo "{$row['eca']}"?>"> 
                <label class="mdl-textfield__label" for="eca">Extra Curricular Activities</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:1000px">
                <input class="mdl-textfield__input" type="text" name="interests" id="interests" value="<?php echo "{$row['interests']}"?>">
                <label class="mdl-textfield__label" for="interests">Interests</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:1000px">
                <input class="mdl-textfield__input" type="text" name="hobbies" id="hobbies" value="<?php echo "{$row['hobbies']}"?>">
                <label class="mdl-textfield__label" for="hobbies">Hobbies</label>
            </div>
            <div>
			<button class="mdl-button mdl-button--colored mdl-button--raised" type="submit" name="r_personal">Submit</button>
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