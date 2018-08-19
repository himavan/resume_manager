<?php include('db.php') ;

$as='';
$educ='All';
$per=0;
$skills='';

if (isset($_POST['app'])) {
   
   // receive all input values from the form
  

   $radioVal2 = mysqli_real_escape_string($db, $_POST['as']);
   
   if($radioVal2 == "Accepted")
   {
       $as = $radioVal2;
   }
   else if ($radioVal2 == "Rejected")
   {
       $as = $radioVal2;
   }
   else if ($radioVal2 == "Pending")
   {
       $as = $radioVal2;
   }
   else if ($radioVal2 == "All")
   {
       $as = '';
   }
   header('location:applicants.php?appoint='.$as);

}
if (isset($_POST['perc'])){
    $educ = mysqli_real_escape_string($db, $_POST['educ']);
    $per = mysqli_real_escape_string($db, $_POST['per']);
    header('location:applicants.php?educ='.$educ.'&per='.$per);
}

if (isset($_POST['skil'])){
    $skills = mysqli_real_escape_string($db, $_POST['skills']);
    header('location:applicants.php?skills='.$skills);
}
   ?>