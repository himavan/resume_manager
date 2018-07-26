<?php include('check_session.php') ?>
<?php include('operations.php') ?>
<?php include('resumeheader.php') ?>


<?php

$username = $_SESSION['username'];
$resumeid='';
if(  isset($_SESSION['rid'])  ){
    $resumeid = $_SESSION['rid'];
    $row = null;
    if(! empty($_GET['certid'])){
        $_SESSION['editid'] = $_GET['certid'];
        if(! $db ) {
            die('Could not connect: ' . mysqli_error());
         }
         
         $query2 = "SELECT * FROM r_cert WHERE resumeid='".$resumeid."' AND certid='".$_SESSION['editid']."'";
         $result = mysqli_query( $db,$query2);
        
         if(mysqli_num_rows($result)==0 ) {
         }
         else{
             $row = mysqli_fetch_assoc($result) ;
         }
    }

?>

<form method="post" action="r_cert.php">
 <!-- Certifications -->
 <div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
        <div  class="card-header">Certifications</div>
        <div class="mdl-cell--12-col mdl-card__supporting-text">
        <?php include('errors.php'); ?>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="c_name" id="c_name" value="<?php echo "{$row['c_name']}"?>">
                <label class="mdl-textfield__label" for="c_name">Certification Name </label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" >
                <input class="mdl-textfield__input" type="text" name="c_auth" id="c_auth" value="<?php echo "{$row['c_auth']}"?>">
                <label class="mdl-textfield__label" for="c_auth">Certifying Authority</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:1000px">
                <input class="mdl-textfield__input" type="text" name="c_url" id="c_url" value="<?php echo "{$row['c_url']}"?>">
                <label class="mdl-textfield__label" for="c_url">URL / Description</label>
            </div>
            <div>
			<button class="mdl-button mdl-button--colored mdl-button--raised" type="submit" name="r_cert">Submit</button>
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