<?php
if($_SESSION['auth_type']!="Manager"){
  session_destroy();
  header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" href="./material.min.css">
	<script src="./material.min.js"></script>
	<link rel="stylesheet" href="./material-icons.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title" id="pagetitle">Resume Manager</span>
          <div class="mdl-layout-spacer"></div>
         
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img style="margin:auto" src="images/user.png" class="demo-avatar">
          <div class="demo-avatar-dropdown">
			  <!-- logged in user information -->
			  <?php  if (isset($_SESSION['username'])) : ?>
		<span style="text-align:center; width:100%">Welcome <br> <strong><?php echo $_SESSION['fullname']; ?></strong><br>User Type:<?php echo $_SESSION['auth_type']; ?></span>
		<?php endif ?>  
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link" href="manager.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</a>
          <a class="mdl-navigation__link" href="jobs.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i>Post jobs</a>
          <a class="mdl-navigation__link" href="applicants.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">queue</i>Applications</a>
		      <a class="mdl-navigation__link" href="settings.php?page=manager"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">settings_applications</i>Settings</a>
          
		  
		  <?php  if (isset($_SESSION['username'])) : ?>
			 <a class="mdl-navigation__link" href="manager.php?logout='1'"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">lock</i>logout</a>
		<?php endif ?>

          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href="support.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span>Support</a>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          