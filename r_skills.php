<?php include('check_session.php') ?>
<?php include('resumeheader.php') ?>
<?php include('operations.php') ?>

<?php
$username = $_SESSION['username'];
$resumeid='';
if(  isset($_SESSION['rid'])  ){
    $resumeid = $_SESSION['rid'];
if(! $db ) {
   die('Could not connect: ' . mysqli_error());
}
$query2 = "SELECT * FROM r_skills WHERE resumeid='".$resumeid."'";
$result = mysqli_query( $db,$query2);
$row = null;
if(mysqli_num_rows($result)==0 ) {

}
else{
    $row = mysqli_fetch_assoc($result) ;
}
   ?>
<form method="post" action="r_skills.php">
<!-- Technical Skills -->
<div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
        <div class="card-header">Technical Skills</div>
        <div class="mdl-cell--12-col mdl-card__supporting-text">
        <?php include('errors.php'); ?>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label"  style="width:1000px">
                <input class="mdl-textfield__input" type="text" name="pro_lang" id="pro_lang" value="<?php echo "{$row['pro_lang']}"?>" >
                <label class="mdl-textfield__label" for="pro_lang">Programming languages</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label "  style="width:1000px" >
                <input class="mdl-textfield__input" type="text" name="web_tech" id="web_tech" value="<?php echo "{$row['web_tech']}"?>">
                <label class="mdl-textfield__label" for="web_tech">Web Technologies</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:1000px">
                <input class="mdl-textfield__input" type="text" name="tools" id="tools" value="<?php echo "{$row['tools']}"?>" >
                <label class="mdl-textfield__label" for="tools" >Tools & Frameworks</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:1000px">
                <input class="mdl-textfield__input" type="text" name="os" id="os" value="<?php echo "{$row['os']}"?>" >
                <label class="mdl-textfield__label" for="os">Operating Systems</label>
            </div>
            <div>
			<button class="mdl-button mdl-button--colored mdl-button--raised" type="submit" name="r_skills">Submit</button>
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