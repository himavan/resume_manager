<?php include('db.php') ?>
<?php 
$errors = array();
$_SESSION['r_intro'] ="";
$fullname="";
$career="";
$about="";
$username=$_SESSION['username'];
$resumeid ="";


// RESUME CREATE
if (isset($_POST['create_resume'])) {
    // receive all input values from the form
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $purpose = mysqli_real_escape_string($db, $_POST['purpose']);

    if(  isset($_SESSION['rid'])  ){
        $resumeid = $_SESSION['rid'];
    }
    else{
        $resumeid = $_SESSION['username'].date("ymdhis");
    }

    // form validation: ensure that the form is correctly filled

    if (empty($title)) { array_push($errors, "Title is required"); }
    if (empty($purpose)) { array_push($errors, "Purpose is required"); }

    if (!isset($_SESSION['username'])) {
        array_push($errors, "You must log in first");
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {

        $query1 = "SELECT * FROM resumes WHERE resumeid ='".$resumeid."'";
		$result = mysqli_query($db,$query1);
		if(mysqli_num_rows($result)>=1)
           {
            $query = "Update resumes SET title ='".$title."', purpose='".$purpose."' WHERE resumeid='".$resumeid."'"; 
                 

        if(mysqli_query($db, $query) == TRUE){
            $_SESSION['succ'] = "Resume info details updated! Redirects to Homepage in 5 Seconds ";
            header( "refresh:5;url=home.php" );
        } else {
            $_SESSION['err'] = "Error Occurred!";
        }
		   }
        else{
            $query = "INSERT INTO resumes (resumeid, username, title, purpose) 
                  VALUES('$resumeid', '$username', '$title', '$purpose')";

        if(mysqli_query($db, $query) == TRUE){

            // $q_intro = "INSERT INTO r_intro (resumeid, username, fullname, career, about) 
            //         VALUES('$resumeid', '$username', '', '','')";
            // $q_edu = "INSERT INTO r_edu (resumeid, username,mdcn,mds,mdun,mdyc,mdp,bdcn,bds,bdun,bdyc,bdp,icn,isn,ibn,iyc,ip,sn,sb,syc,sp) 
            //         VALUES('$resumeid', '$username', '', '','','',0,'','','','',0,'','','','',0,'','','',0)";
            // $q_skills = "INSERT INTO r_skills (resumeid, username, pro_lang,web_tech,tools,os) 
            //         VALUES('$resumeid', '$username', '', '','','')";
            // $q_cert = "INSERT INTO r_cert (resumeid, username, c_name, c_auth, c_url) 
            //         VALUES('$resumeid', '$username', '', '', '')";
            // $q_exp = "INSERT INTO r_exp (resumeid, username, pro_title, pro_role,pro_desc) 
            //         VALUES('$resumeid', '$username', '', '','')";
            // $q_personal = "INSERT INTO r_personal (resumeid, username, fathername,gender,dob,nationality,ms,lang_known,eca,interests,hobbies) 
            //         VALUES('$resumeid', '$username', '', '','','','','','','','')";
            // $q_contact = "INSERT INTO r_contact (resumeid, username, mobile, email, c_address) 
            //         VALUES('$resumeid', '$username', '', '','')";

            //         mysqli_query($db, $q_intro);
            //         mysqli_query($db, $q_edu);
            //         mysqli_query($db, $q_skills);
            //         mysqli_query($db, $q_cert);
            //         mysqli_query($db, $q_exp);
            //         mysqli_query($db, $q_personal);
            //         mysqli_query($db, $q_contact);

            $_SESSION['succ'] = "New resume details created! Redirects to Homepage in 5 Seconds";
            header( "refresh:5;url=home.php" );


        } else {
            $_SESSION['err'] = "Error Occurred!";
        }
        }

    }

}

// RESUME INTRO
if (isset($_POST['r_intro'])) {

    $resumeid = $_SESSION['rid'];
    // receive all input values from the form
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $career = mysqli_real_escape_string($db, $_POST['career']);
    $about = mysqli_real_escape_string($db, $_POST['about']);

    // form validation: ensure that the form is correctly filled

    if (empty($fullname)) { array_push($errors, "Full Name is required"); }
    if (empty($career)) { array_push($errors, "Career Objecctive is required"); }
    if (empty($about)) { array_push($errors, "About Yourself is required"); }

    if (!isset($_SESSION['username'])) {
        array_push($errors, "You must log in first");
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {

        $query1 = "SELECT * FROM r_intro WHERE resumeid ='".$resumeid."'";
		$result = mysqli_query($db,$query1);
		if(mysqli_num_rows($result)>=1)
           {
            $query = "Update r_intro SET fullname ='".$fullname."', career ='".$career."', about='".$about."' WHERE resumeid='".$resumeid."'";     

        if(mysqli_query($db, $query) == TRUE){
            // $_SESSION['succ'] = "Succesfully Users Introduction Updated";
            header('location:resume.php?resumeid='.$_SESSION['rid']);
        } else {
            $_SESSION['err'] = "Error Occurred!";
        }
		   }
        else{
            $query = "INSERT INTO r_intro (resumeid, username, fullname, career, about) 
                  VALUES('$resumeid', '$username', '$fullname', '$career', '$about')";

        if(mysqli_query($db, $query) == TRUE){
            // $_SESSION['succ'] = "Succesfully Users Introduction Submitted";
            header('location:resume.php?resumeid='.$_SESSION['rid']);
        } else {
            $_SESSION['err'] = "Error Occurred!";
        }
        }
    }
}


// RESUME EDUCATION
if (isset($_POST['r_edu'])) {
   
    $resumeid = $_SESSION['rid'];
    // receive all input values from the form
    $radioVal = mysqli_real_escape_string($db, $_POST['educ']);
    
    if($radioVal == "Matriculation(Class X)")
    {
        $educ = $radioVal;
    }
    else if ($radioVal == "Intermediate / Class XII")
    {
        $educ = $radioVal;
    }
    else if ($radioVal == "Graduation")
    {
        $educ = $radioVal;
    }
    else if ($radioVal == "Post Graduation")
    {
        $educ = $radioVal;
    }

    $spec = mysqli_real_escape_string($db, $_POST['spec']);
    $itn = mysqli_real_escape_string($db, $_POST['itn']);
    $bun = mysqli_real_escape_string($db, $_POST['bun']);
    $yoc = mysqli_real_escape_string($db, $_POST['yoc']);
    $per = mysqli_real_escape_string($db, $_POST['per']);
   
    // form validation: ensure that the form is correctly filled

    if (empty($educ)) { array_push($errors, "Select Education"); }
    if (empty($spec)) { array_push($errors, "Specialization is required"); }
    if (empty($itn)) { array_push($errors, "Institution Name is required"); }
    if (empty($bun)) { array_push($errors, "Board / University is required"); }
    if (empty($yoc)) { array_push($errors, "Month & Year of completion is required"); }
    if (empty($per)) { array_push($errors, "Percentage is required"); }

    if (!isset($_SESSION['username'])) {
        array_push($errors, "You must log in first");
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
    // register user if there are no errors in the form
    if (count($errors) == 0) {
        
        $query1 = "SELECT * FROM r_edu WHERE resumeid ='".$resumeid."' AND eduid ='".$_SESSION['editid']."'";
		$result = mysqli_query($db,$query1);
		if(mysqli_num_rows($result)>=1)
           {
            $query = "Update r_edu SET educ ='".$educ."', spec ='".$spec."', itn='".$itn."', bun ='".$bun."', yoc='".$yoc."', per='".$per."' WHERE resumeid ='".$resumeid."' AND eduid ='".$_SESSION['editid']."'"; 

        if(mysqli_query($db, $query) == TRUE){
            // $_SESSION['succ'] = "Succesfully Users Introduction Updated";
            unset($_SESSION['editid']);
            header('location:resume.php?resumeid='.$_SESSION['rid']);
        } else {
            $_SESSION['err'] = "Error Occurred!";
        }
		   }
        else{
            $query = "INSERT INTO r_edu (resumeid, username, educ, spec, itn, bun, yoc, per) 
                  VALUES('$resumeid', '$username', '$educ', '$spec', '$itn', '$bun','$yoc', '$per')";

        if(mysqli_query($db, $query) == TRUE){
            // $_SESSION['succ'] = "Succesfully Users Introduction Submitted";
            header('location:resume.php?resumeid='.$_SESSION['rid']);
        } else {
            $_SESSION['err'] = "Error Occurred!";
        }
        }
    }
}


// RESUME SKILLS
if (isset($_POST['r_skills'])) {

    $resumeid = $_SESSION['rid'];
    // receive all input values from the form
    $pro_lang = mysqli_real_escape_string($db, $_POST['pro_lang']);
    $web_tech = mysqli_real_escape_string($db, $_POST['web_tech']);
    $tools = mysqli_real_escape_string($db, $_POST['tools']);
    $os = mysqli_real_escape_string($db, $_POST['os']);

    // form validation: ensure that the form is correctly filled

    if (empty($pro_lang)) { array_push($errors, "Programming languages is required"); }
    if (empty($web_tech)) { array_push($errors, "Web Technologies is required"); }
    if (empty($tools)) { array_push($errors, "Tools & Frameworks is required"); }
    if (empty($os)) { array_push($errors, "Operating Systems is required"); }


    if (!isset($_SESSION['username'])) {
        array_push($errors, "You must log in first");
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {

        $query1 = "SELECT * FROM r_skills WHERE resumeid ='".$resumeid."'";
		$result = mysqli_query($db,$query1);
		if(mysqli_num_rows($result)>=1)
           {
            $query = "Update r_skills SET pro_lang='".$pro_lang."', web_tech='".$web_tech."', tools='".$tools."', os='".$os."' WHERE resumeid='".$resumeid."'";     

        if(mysqli_query($db, $query) == TRUE){
            // $_SESSION['succ'] = "Succesfully Users Introduction Updated";
            header('location:resume.php?resumeid='.$_SESSION['rid']);
        } else {
            $_SESSION['err'] = "Error Occurred!";
        }
		   }
        else{
            $query = "INSERT INTO r_skills (resumeid, username, pro_lang, web_tech, tools, os) 
                  VALUES('$resumeid', '$username', '$pro_lang', '$web_tech', '$tools', '$os')";

        if(mysqli_query($db, $query) == TRUE){
            // $_SESSION['succ'] = "Succesfully Users Introduction Submitted";
            header('location:resume.php?resumeid='.$_SESSION['rid']);
        } else {
            $_SESSION['err'] = "Error Occurred!".mysqli_error($db);
        }
        }
    }
}

// RESUME CERTIFICATIONS
if (isset($_POST['r_cert'])) {

    $resumeid = $_SESSION['rid'];
    // receive all input values from the form
    $c_name = mysqli_real_escape_string($db, $_POST['c_name']);
    $c_auth = mysqli_real_escape_string($db, $_POST['c_auth']);
    $c_url = mysqli_real_escape_string($db, $_POST['c_url']);

    // form validation: ensure that the form is correctly filled

    if (empty($c_name)) { array_push($errors, "Certication Name is required"); }
    if (empty($c_auth)) { array_push($errors, "Certifying Authority is required"); }
    if (empty($c_url)) { array_push($errors, "Certification Desc / URL is required"); }

    if (!isset($_SESSION['username'])) {
        array_push($errors, "You must log in first");
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $query1 = "SELECT * FROM r_cert WHERE resumeid ='".$resumeid."' AND certid ='".$_SESSION['editid']."'";
		$result = mysqli_query($db,$query1);
		if(mysqli_num_rows($result)>=1)
           {
            $query = "Update r_cert SET c_name ='".$c_name."', c_auth ='".$c_auth."', c_url='".$c_url."' WHERE resumeid ='".$resumeid."' AND certid ='".$_SESSION['editid']."'";
        if(mysqli_query($db, $query) == TRUE){
            // $_SESSION['succ'] = "Succesfully Users Introduction Updated";
            unset($_SESSION['editid']);
            header('location:resume.php?resumeid='.$_SESSION['rid']);
        } else {
            $_SESSION['err'] = "Error Occurred!";
        }
		   }
        else{
            $query = "INSERT INTO r_cert (resumeid, username, c_name, c_auth, c_url) 
                  VALUES('$resumeid', '$username', '$c_name', '$c_auth', '$c_url')";
        if(mysqli_query($db, $query) == TRUE){
            // $_SESSION['succ'] = "Succesfully Users Introduction Submitted";
            header('location:resume.php?resumeid='.$_SESSION['rid']);
        } else {
            $_SESSION['err'] = "Error Occurred!";
        }
        }
    }
}


// RESUME EXPERIANCE
if (isset($_POST['r_exp'])) {

    $resumeid = $_SESSION['rid'];
    // receive all input values from the form
    $pro_title = mysqli_real_escape_string($db, $_POST['pro_title']);
    $pro_role = mysqli_real_escape_string($db, $_POST['pro_role']);
    $pro_desc = mysqli_real_escape_string($db, $_POST['pro_desc']);

    // form validation: ensure that the form is correctly filled

    if (empty($pro_title)) { array_push($errors, "Project Title is required"); }
    if (empty($pro_role)) { array_push($errors, "Project Role is required"); }
    if (empty($pro_desc)) { array_push($errors, "Project Description is required"); }

    if (!isset($_SESSION['username'])) {
        array_push($errors, "You must log in first");
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $query1 = "SELECT * FROM r_exp WHERE resumeid ='".$resumeid."' AND expid ='".$_SESSION['editid']."'";
		$result = mysqli_query($db,$query1);
		if(mysqli_num_rows($result)>=1)
           {
            $query = "Update r_exp SET pro_title ='".$pro_title."', pro_role ='".$pro_role."', pro_desc='".$pro_desc."' WHERE resumeid ='".$resumeid."' AND expid ='".$_SESSION['editid']."'";
        if(mysqli_query($db, $query) == TRUE){
            // $_SESSION['succ'] = "Succesfully Users Introduction Updated";
            unset($_SESSION['editid']);
            header('location:resume.php?resumeid='.$_SESSION['rid']);
        } else {
            $_SESSION['err'] = "Error Occurred!";
        }
		   }
        else{
            $query = "INSERT INTO r_exp(resumeid, username, pro_title, pro_role, pro_desc) 
                  VALUES('$resumeid', '$username', '$pro_title', '$pro_role', '$pro_desc')";
        if(mysqli_query($db, $query) == TRUE){
            // $_SESSION['succ'] = "Succesfully Users Introduction Submitted";
            header('location:resume.php?resumeid='.$_SESSION['rid']);
        } else {
            $_SESSION['err'] = "Error Occurred!";
        }
        }
    }
}


// RESUME PERSONAL
if (isset($_POST['r_personal'])) {

    $resumeid = $_SESSION['rid'];
    // receive all input values from the form
    $fathername = mysqli_real_escape_string($db, $_POST['fathername']);
    $radioVal2 = mysqli_real_escape_string($db, $_POST['gender']);

    if($radioVal2 == "Male")
    {
        $gender = $radioVal2;
    }
    else if ($radioVal == "Female")
    {
        $gender = $radioVal2;
    }

    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $nationality = mysqli_real_escape_string($db, $_POST['nationality']);
    $ms = mysqli_real_escape_string($db, $_POST['ms']);
    $lang_known = mysqli_real_escape_string($db, $_POST['lang_known']);
    $eca = mysqli_real_escape_string($db, $_POST['eca']);
    $interests = mysqli_real_escape_string($db, $_POST['interests']);
    $hobbies = mysqli_real_escape_string($db, $_POST['hobbies']);

    // form validation: ensure that the form is correctly filled

    if (empty($fathername)) { array_push($errors, "Father Name is required"); }
    if (empty($gender)) { array_push($errors, "Gender is required"); }
    if (empty($dob)) { array_push($errors, "Date of Birth is required"); }
    if (empty($nationality)) { array_push($errors, "Nationality is required"); }
    if (empty($ms)) { array_push($errors, "Marital Status is required"); }
    if (empty($lang_known)) { array_push($errors, "Languages is required"); }
    if (empty($eca)) { array_push($errors, "Activities is required"); }
    if (empty($interests)) { array_push($errors, "interests is required"); }
    if (empty($hobbies)) { array_push($errors, "Hobbies is required"); }



    if (!isset($_SESSION['username'])) {
        array_push($errors, "You must log in first");
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {

        $query1 = "SELECT * FROM r_personal WHERE resumeid ='".$resumeid."'";
		$result = mysqli_query($db,$query1);
		if(mysqli_num_rows($result)>=1)
           {
            $query = "Update r_personal SET fathername ='".$fathername."', gender='".$gender."', dob='".$dob."', nationality='".$nationality."', ms='".$ms."', lang_known='".$lang_known."', eca='".$eca."', interests='".$interests."', hobbies='".$hobbies."' WHERE resumeid='".$resumeid."'";     

        if(mysqli_query($db, $query) == TRUE){
            // $_SESSION['succ'] = "Succesfully Users Introduction Updated";
            header('location:resume.php?resumeid='.$_SESSION['rid']);
        } else {
            $_SESSION['err'] = "Error Occurred!";
        }
		   }
        else{
            $query = "INSERT INTO r_personal (resumeid, username, fathername, gender, dob, nationality,ms,lang_known,eca,interests,hobbies) 
            VALUES('$resumeid', '$username', '$fathername', '$gender', '$dob', '$nationality','$ms','$lang_known','$eca','$interests','$hobbies')";

        if(mysqli_query($db, $query) == TRUE){
            // $_SESSION['succ'] = "Succesfully Users Introduction Submitted";
            header('location:resume.php?resumeid='.$_SESSION['rid']);
        } else {
            $_SESSION['err'] = "Error Occurred!".mysqli_error($db);
        }
        }
    }
}


// RESUME CONTACT
if (isset($_POST['r_contact'])) {

    $resumeid = $_SESSION['rid'];
    // receive all input values from the form
    $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $c_address = mysqli_real_escape_string($db, $_POST['c_address']);

    // form validation: ensure that the form is correctly filled

    if (empty($mobile)) { array_push($errors, "Mobile Number is required"); }
    if (empty($email)) { array_push($errors, "Email ID is required"); }
    if (empty($c_address)) { array_push($errors, "Communication Address is required"); }


    if (!isset($_SESSION['username'])) {
        array_push($errors, "You must log in first");
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {

        $query1 = "SELECT * FROM r_contact WHERE resumeid ='".$resumeid."'";
		$result = mysqli_query($db,$query1);
		if(mysqli_num_rows($result)>=1)
           {
            $query = "Update r_contact SET mobile='".$mobile."', email='".$email."', c_address='".$c_address."' WHERE resumeid='".$resumeid."'";     

        if(mysqli_query($db, $query) == TRUE){
            // $_SESSION['succ'] = "Succesfully Users Introduction Updated";
            header('location:resume.php?resumeid='.$_SESSION['rid']);
        } else {
            $_SESSION['err'] = "Error Occurred!";
        }
		   }
        else{
            $query = "INSERT INTO r_contact (resumeid, username, mobile, email, c_address) 
                  VALUES('$resumeid', '$username', '$mobile', '$email', '$c_address')";

        if(mysqli_query($db, $query) == TRUE){
            // $_SESSION['succ'] = "Succesfully Users Introduction Submitted";
            header('location:resume.php?resumeid='.$_SESSION['rid']);
        } else {
            $_SESSION['err'] = "Error Occurred!".mysqli_error($db);
        }
        }
    }
}


//SETTINGS PASSWORD CHANGE
if (isset($_POST['settings'])) {

    // receive all input values from the form
    $op= mysqli_real_escape_string($db, $_POST['c_pass']);
    $np = mysqli_real_escape_string($db, $_POST['n_pass']);
    $rp = mysqli_real_escape_string($db, $_POST['r_pass']);

    // form validation: ensure that the form is correctly filled

    if (empty($op)) { array_push($errors, "Current Password is required"); }
    if (empty($np)) { array_push($errors, "New Password is required"); }
    if (empty($rp)) { array_push($errors, "Retype Your New Password"); }


    if (!isset($_SESSION['username'])) {
        array_push($errors, "You must log in first");
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if ($np != $rp) {
        array_push($errors, "The two passwords do not match");
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $mdnp = md5($np);
        $mdcp = md5($op);

        $query1 = "SELECT * FROM users WHERE password ='".$mdcp."'";
		$result = mysqli_query($db,$query1);
		if(mysqli_num_rows($result)>=1)
           {
            $update_query = "UPDATE users SET password='".$mdnp."' WHERE username='".$_SESSION['username']."'";
                mysqli_query( $db,$update_query);
                if(mysqli_query($db, $update_query) == TRUE){
                $_SESSION['succ'] = "Succesfully Password Updated";
                } else {
                        $_SESSION['err'] = "Error Occurred!";
                        }
		    }
        else{
            $_SESSION['err'] = "Invalid Current Password!";
         }
    }
}


//SETTINGS DETAILS
if (isset($_POST['details'])) {

    // receive all input values from the form
    $op= mysqli_real_escape_string($db, $_POST['fullname']);
    $np = mysqli_real_escape_string($db, $_POST['email']);

    // form validation: ensure that the form is correctly filled

    if (empty($op)) { array_push($errors, "Full Name is required"); }
    if (empty($np)) { array_push($errors, "Email ID is required"); }

    if (!isset($_SESSION['username'])) {
        array_push($errors, "You must log in first");
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {

        $query1 = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
		$result = mysqli_query($db,$query1);
		if(mysqli_num_rows($result)>=1)
           {
            $update_query = "UPDATE users SET fullname='".$op."', email='".$np."'  WHERE username='".$_SESSION['username']."'";
                mysqli_query( $db,$update_query);
                if(mysqli_query($db, $update_query) == TRUE){
                $_SESSION['succ'] = "Succesfully Details Updated";
                } else {
                        $_SESSION['err'] = "Error Occurred!";
                        }
		    }
        else{
            $_SESSION['err'] = "Invalid Details!";
         }
    }
}

// JOBS
if (isset($_POST['jobs'])) {

    // receive all input values from the form
    $job_title = mysqli_real_escape_string($db, $_POST['job_title']);
    $role = mysqli_real_escape_string($db, $_POST['role']);
    $company = mysqli_real_escape_string($db, $_POST['company']);
    $skills = mysqli_real_escape_string($db, $_POST['skills']);
    $desc = mysqli_real_escape_string($db, $_POST['desc']);
    $salary = mysqli_real_escape_string($db, $_POST['salary']);


    // form validation: ensure that the form is correctly filled

    if (empty($job_title)) { array_push($errors, "Job_title is required"); }
    if (empty($role)) { array_push($errors, "Role is required"); }
    if (empty($company)) { array_push($errors, "Company Details is required"); }
    if (empty($skills)) { array_push($errors, "Skills is required"); }
    if (empty($desc)) { array_push($errors, "Description is required"); }
    if (empty($salary)) { array_push($errors, "Salary is required"); }

    if (!isset($_SESSION['username'])) {
        array_push($errors, "You must log in first");
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $query1 = "SELECT * FROM jobs WHERE username ='".$_SESSION['username']."' AND jobid='".$_SESSION['editid']."'";
		$result = mysqli_query($db,$query1);
		if(mysqli_num_rows($result)>=1)
           {
            $query = "Update jobs SET job_title ='".$job_title."', role ='".$role."', company='".$company."',skills ='".$skills."', `desc` ='".$desc."', salary='".$salary."' WHERE username ='".$_SESSION['username']."' AND jobid='".$_SESSION['editid']."'";
        if(mysqli_query($db, $query) == TRUE){
            // $_SESSION['succ'] = "Succesfully Users Introduction Updated";
            unset($_SESSION['editid']);
            header('location:manager.php');
        } else {
            $_SESSION['err'] = "Error Occurred!".mysqli_error($db);
        }
		   }
        else{
            $jobid = $_SESSION['username'].date("ymdhis");
            $query = "INSERT INTO jobs (jobid, username, job_title, `role`, company,skills,`desc`,salary) VALUES('$jobid', '$username', '$job_title', '$role', '$company','$skills', '$desc', '$salary')";
        if(mysqli_query($db, $query) == TRUE){
            // $_SESSION['succ'] = "Succesfully Users Introduction Submitted";
            header('location:manager.php');
        } else {
            $_SESSION['err'] = "Error Occurred!".mysqli_error($db);
        }
        }
    }
}

//SELECT RESUME

if (isset($_POST['app_edit'])) {

    // receive all input values from the form
    $resumeid = mysqli_real_escape_string($db, $_POST['resume']);

    // form validation: ensure that the form is correctly filled
    if (empty($resumeid)) { array_push($errors, "Select your resume "); }

    if (!isset($_SESSION['username'])) {
        array_push($errors, "You must log in first");
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $man_un='';
        $res_title='';
        $query1 = "SELECT username,job_title FROM jobs WHERE  jobid='".$_SESSION['editid']."'";
        $result1 = mysqli_query($db,$query1);
        if(mysqli_num_rows($result1)>=1)
           {
            $row1 = mysqli_fetch_assoc($result1);
            $man_un = $row1['username'];
            $job_title = $row1['job_title'];
           }
        $query3 = "SELECT title FROM resumes WHERE  resumeid='".$resumeid."'";
        $result3 = mysqli_query($db,$query3);
        if(mysqli_num_rows($result3)>=1)
            {
            $row3 = mysqli_fetch_assoc($result3);
            $res_title = $row3['title'];
            }
        
        $query2 = "SELECT * FROM applicants WHERE username ='".$_SESSION['username']."' AND jobid='".$_SESSION['editid']."'";
		$result2 = mysqli_query($db,$query2);
		if(mysqli_num_rows($result2)>=1)
           {
            $query = "Update applicants SET resumeid ='".$resumeid."', fullname='".$_SESSION['fullname']."', `res_title` ='".$res_title."' WHERE username ='".$_SESSION['username']."' AND jobid='".$_SESSION['editid']."'";
                if(mysqli_query($db, $query) == TRUE){
                    // $_SESSION['succ'] = "Succesfully Users Introduction Updated";
                    unset($_SESSION['editid']);
                    header('location:home.php');
                } else {
                    $_SESSION['err'] = "Error Occurred!".mysqli_error($db);
                }
		   } else{
               $appoint="Pending";
               $usr=$_SESSION['username'];
               $jid = $_SESSION['editid'];
               $fn=$_SESSION['fullname'];
                    $query = "INSERT INTO applicants (jobid,resumeid, username,man_un,fullname, job_title, res_title,appoint) 
                    VALUES('$jid', '$resumeid','$usr' ,'$man_un', '$fn', '$job_title','$res_title', '$appoint')";
                if(mysqli_query($db, $query) == TRUE){
                    // $_SESSION['succ'] = "Succesfully Users Introduction Submitted";
                    header('location:home.php');
                } else {
                    $_SESSION['err'] = "Error Occurred!".mysqli_error($db);
                }
        }
    }
}

//APP AUTHORIZATION
if (isset($_POST['appoint'])) {

    // receive all input values from the form
    $app_status= mysqli_real_escape_string($db, $_POST['app_status']);
    $remarks = mysqli_real_escape_string($db, $_POST['remarks']);

    // form validation: ensure that the form is correctly filled

    if (empty($app_status)) { array_push($errors, "Select Application Status"); }
    if (empty($remarks)) { array_push($errors, "Remarks is required"); }

    if (!isset($_SESSION['username'])) {
        array_push($errors, "You must log in first");
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {

        $query1 = "SELECT * FROM applicants WHERE appid='".$_SESSION['appid']."'";
		$result = mysqli_query($db,$query1);
		if(mysqli_num_rows($result)>=1)
           {
            $update_query = "UPDATE applicants SET appoint='".$app_status."', remarks='".$remarks."'  WHERE appid='".$_SESSION['appid']."'";
                mysqli_query( $db,$update_query);
                if(mysqli_query($db, $update_query) == TRUE){
                $_SESSION['succ'] = "Successfully Details Updated";
                } else {
                        $_SESSION['err'] = "Error Occurred!";
                        }
		    }
        else{
            $_SESSION['err'] = "Invalid Details!";
         }
    }
}


?>