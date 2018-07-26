<?php include('check_session.php') ?>
<?php include('operations.php') ?>
<?php include('resumeheader.php') ?>


<?php

$username = $_SESSION['username'];

if(  isset($_SESSION['rid'])  ){
    $resumeid = $_SESSION['rid'];
    $query2='';
    $_SESSION['editid']='';
    $row = null;
    if(! empty($_GET['eduid'])){
        $_SESSION['editid'] = $_GET['eduid'];
        $query2 = "SELECT * FROM r_edu WHERE resumeid='".$resumeid."' AND eduid ='". $_SESSION['editid']."'";
        if(! $db ) {
            die('Could not connect: ' . mysqli_error());
         }
         
         $result = mysqli_query( $db,$query2);
         
         if(mysqli_num_rows($result)==0 ) {
         
         }
         else{
             $row = mysqli_fetch_assoc($result) ;
         }         
    }

   ?>

<form method="post" action="r_edu.php">
    <!-- Educational Details -->
    <div class="mdl-shadow--3dp" style="background:white;margin-bottom:10px">
        <div  class="card-header">Educational Information</div>
        <div class="mdl-cell--12-col mdl-card__supporting-text">
        <?php include('errors.php'); ?>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:1000px">
                <label class="mdl-textfield__label" for="education">Education</label>
                <label style="margin-left: 70px;" class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                    <input type="radio" id="option-1" class="mdl-radio__button" name="educ" value="Matriculation(Class X)" <?php if($row['educ'] =='Matriculation(Class X)') {echo "checked";}?>>
                    <span class="mdl-radio__label">Matriculation(Class X)</span>
                </label>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                    <input type="radio" id="option-2" class="mdl-radio__button" name="educ" value="Intermediate / Class XII" <?php if($row['educ'] =='Intermediate / Class XII') {echo "checked";}?>>
                    <span class="mdl-radio__label">Intermediate / Class XII</span>
                </label>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3">
                    <input type="radio" id="option-3" class="mdl-radio__button" name="educ" value="Graduation" <?php if($row['educ'] =='Graduation') {echo "checked";}?>>
                    <span class="mdl-radio__label">Graduation </span>
                </label>
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-4">
                    <input type="radio" id="option-4" class="mdl-radio__button" name="educ" value="Post Graduation" <?php if($row['educ'] =='Post Graduation') {echo "checked";}?>>
                    <span class="mdl-radio__label">Post Graduation </span>
                </label>
            </div>

             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="spec" id="spec" value="<?php echo "{$row['spec']}"?>" >
                <label class="mdl-textfield__label" for="spec">Specialization(Note: Enter 'None' for Class X/XII)</label>
            </div>

             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="itn" id="itn" value="<?php echo "{$row['itn']}"?>" >
                <label class="mdl-textfield__label" for="itn">Institution Name</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="bun" id="bun" value="<?php echo "{$row['bun']}"?>" >
                <label class="mdl-textfield__label" for="bun">Board / University</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="month" name="yoc" id="yoc" value="<?php echo "{$row['yoc']}"?>" >
                <label class="mdl-textfield__label" for="yoc">Month & Year of completion</label>
            </div>
            <div class="">
                <label class="" for="per" style="display:block;padding-bottom:10px">Percentage:<span id="pval" style="font-weight:700"><?php echo "{$row['per']}"?></span></label>
                <div style="width:700px;padding-bottom:30px">
                <input class="mdl-slider mdl-js-slider" type="range" name="per" id="per" min="0" max="100" tabindex="0" step="0.01" value="<?php echo "{$row['per']}"?>"   style="display:block;">
                </div>
                <script>
                    window.onload = function() { 
                        document.getElementById('per').addEventListener('input', function() {
                            document.getElementById('pval').innerText = document.getElementById('per').value;
                        });
                    };
                    </script>
            </div>
          
            <div>
            <button class="mdl-button mdl-button--colored mdl-button--raised" type="submit" name="r_edu">Submit</button>
            </div>
            <div class="succ"><?php if (isset($_SESSION['succ'])) {echo $_SESSION['succ']; unset($_SESSION['succ']);} ?></div>
            <div class="error"><?php if (isset($_SESSION['err'])) {echo $_SESSION['err']; unset($_SESSION['err']);} ?></div>
        
        </div>
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