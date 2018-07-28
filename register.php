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
      <span class="mdl-layout-title">Resume Manager</span>
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

  <main class="mdl-layout__content" style="background:url('images/bg.jpeg'); background-size:cover">
    <div class="page-content">
    <div class="mdl-shadow--3dp" style="width:350px;margin:20px auto;border-radius:5px;overflow:hidden;background:rgba(255,255,255,0.9)">
<?php include('server.php') ?>
	<div class="card-header" style="text-align:center">
		Register
	</div>
	<div style="padding:20px">
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" name="fullname" size="30" value="<?php echo $fullname; ?>">
			<label class="mdl-textfield__label">Full Name</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="text" name="username" size="30" value="<?php echo $username; ?>">
			<label class="mdl-textfield__label">Username</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="email" name="email" value="<?php echo $email; ?>">
			<label class="mdl-textfield__label">Email</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="password" name="password_1">
			<label class="mdl-textfield__label">Password</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			<input class="mdl-textfield__input" type="password" name="password_2">
			<label class="mdl-textfield__label">Confirm password</label>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" >
			<label class="mdl-textfield__label" for="gender">Register as</label>
			<label style="margin-left: 70px;" class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
					<input type="radio" id="option-1" class="mdl-radio__button" name="auth_type" value="Student" checked>
					<span class="mdl-radio__label">Student</span>
			</label>
			<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
					<input type="radio" id="option-2" class="mdl-radio__button" name="auth_type" value="Manager" >
					<span class="mdl-radio__label">Manager</span>
			</label>
		</div>
		<div>
			<button type="submit" class="mdl-button mdl-button--raised mdl-button--primary" name="reg_user">Register</button>
		</div>
		<div style="color:green">
			<?php echo $_SESSION['success'] ?>
		</div>
		
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
	</div>
</div>
</div>
</main>
<footer class="mdl-mini-footer">
<div class="mdl-mini-footer__left-section" >
<div class="mdl-logo">Resume Manager</div>
<ul class="mdl-mini-footer__link-list">
  <li><a href="https://github.com/himavan">Himavan &copy; 2018 </a></li>
  <li><a href="#">Use only for education purpose</a></li>
</ul>
</div>
</footer>
</div>
</body>
</html>