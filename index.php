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
      <!-- Title -->
      <span class="mdl-layout-title">Online Job Application Portal</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
      <a class="mdl-navigation__link" href="index.php">Home</a>
		<a class="mdl-navigation__link" href="login.php">Login</a>
		<a class="mdl-navigation__link" href="register.php">Register</a>
      </nav>
    </div>
  </header>
  <style>
    .index-hide{
      display:none;
    }
  </style>

  <main class="mdl-layout__content" style="background:url('images/bg.jpeg'); background-size:cover">
    <div class="page-content" style="width:1020px;margin:auto">
      <div style="margin:10px">
        <div class="mdl-shadow--3dp"><h4 style="padding:20px; font-weight:200;text-align:center">
        Trending Jobs
        </h4></div>
        <?php include('jobs_list.php'); ?>
        <p><a class="mdl-navigation__link" href="login.php">login to apply</a></p>
      </div>
    </div>
  </main>
  <footer class="mdl-mini-footer">
  <div class="mdl-mini-footer__left-section">
    <div class="mdl-logo">Online Job Application Portal</div>
    <ul class="mdl-mini-footer__link-list">
      <li><a href="https://github.com/himavan">Himavan &copy; 2018 </a></li>
      <li><a href="#">Use only for educational purpose</a></li>
      
    </ul>
  </div>
</footer>
</div>
</body>
</html>