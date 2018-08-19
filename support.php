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


<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
    <a class="mdl-layout__drawer-button"  href="<?php  if (!empty($_GET['page'])){ $_SESSION['page'] = $_GET['page'];} echo $_SESSION['page'];?>.php"><i class="material-icons">arrow_back</i></a>
      <!-- Title -->
      <span class="mdl-layout-title">Online Job Application Portal</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
        <a class="mdl-navigation__link" href="home.php">Home</a>
      </nav>
    </div>
  </header>

  <main class="mdl-layout__content">
    <div class="page-content">
      
      <div class="mdl-shadow--3dp" style="width:500px;margin:10px auto;border-radius:5px;overflow:hidden;background:rgba(255,255,255,0.8)">
        <div style="padding:10px; text-align:center">
          <h1 style="font-size:30px;font-weight:300;">Welcome to Online Job Application Portal</h1>
          <p>Manage your resumes</p>
          <p>Apply for jobs using your resumes </p>
        </div>
      <div style="padding:10px; text-align:left">
        <p  style=" text-align:left">Highlights of this application:
          <ul>
            <li>1. You can create multiple resumes to apply for different types of jobs.</li>
            <li>2. Special admin page to enable access to post jobs for students for HR managers.</li>
            <li>3. Single Login & Resgister pages for all kinds of users. After login Redirected to user previlaged pages</li>
            <li>4. Application is developed by Google's Material Design Framework(frontend)</li>
            <li>5. Application built using PHP(Server) & Mysql(Database)</li>
            <li>6. Managers can query applicants based on students resume informations. </li>
          </ul>
        </p>
      </div>
    </div>
    <div class="mdl-shadow--3dp" style="width:500px;margin:20px auto;">
        <div style="padding:20px">
          <p>Project Developed By Himavan</p>
          <p>Use this project for education purpose only</p>
          <p>For Support Please visit <a href="http://www.himavan.com">www.himavan.com</a> or <a href="https://github.com/himavan">Github</a> </p>
        </div>
      </div>
  </div>
  </main>
  <footer class="mdl-mini-footer">
  <div class="mdl-mini-footer__left-section">
    <div class="mdl-logo">Online Job Application Portal</div>
    <ul class="mdl-mini-footer__link-list">
      <li><a href="https://github.com/himavan">Himavan &copy; 2018 </a></li>
      <li><a href="#">Use only for education purpose</a></li>
    </ul>
  </div>
</footer>
</div>
</body>
</html>