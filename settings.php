<?php include('check_session.php');
include('operations.php');
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

<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
    <a class="mdl-layout__drawer-button"  href="<?php  if (!empty($_GET['page'])){ $_SESSION['page'] = $_GET['page'];} echo $_SESSION['page'];?>.php"><i class="material-icons">arrow_back</i></a>
      <!-- Title -->
      <span class="mdl-layout-title">Resume Manager</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation">
      <?php  if (!empty($_SESSION['username'])){ ?>
      
      <a class="mdl-navigation__link"  href="home.php?logout='1'">logout</a>
      
      <?php }  ?>
			 
		

      </nav>
    </div>
  </header>

  <main class="mdl-layout__content" >
    <div class="page-content" >
        <div class="mdl-shadow--3dp" style="width:500px;margin:10px auto;border-radius:5px;overflow:hidden">
            <div style="text-align:center">
                <h1 style="font-size:30px">Settings</h1>
            </div>
        </div>
        <div class="mdl-shadow--3dp" style="background:white;margin:10px auto;width:800px" >
            <div  class="card-header" style="background:#00b9d8;">User Details</div>
            <div class="mdl-cell--12-col mdl-card__supporting-text" >
                <?php
                    $query = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
                    $result = mysqli_query( $db,$query);
                    if(mysqli_num_rows($result)>0 ) {
                        $row = mysqli_fetch_assoc($result);
                ?>

            <form method="post" action="settings.php">
                <div class="lbl_text" >
                    <label class="lbl_bold" >Username:</label>
                    <label ><?php echo "{$row['username']}"?></label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="mobile" name="fullname"  value="<?php echo "{$row['fullname']}"?>">
                    <label class="mdl-textfield__label" for="mobile">Full Name</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="email" name="email" value="<?php echo "{$row['email']}"?>">
                    <label class="mdl-textfield__label" for="email">Email ID</label>
                </div>
                <button class="mdl-button mdl-button--colored mdl-button--raised" type="submit" name="details">Submit</button>
            </form>

            <?php  } ?>
            </div>
        </div>
        <form method="post" action="settings.php">
            <div class="mdl-shadow--3dp" style="background:white;margin:10px auto;width:800px" >
                <div  class="card-header" style="background:#00b9d8;">Change Password</div>
                <div class="mdl-cell--12-col mdl-card__supporting-text" >
                    <?php include('errors.php'); ?>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" id="mobile" name="c_pass"  >
                        <label class="mdl-textfield__label" for="mobile">Current Password</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" id="email" name="n_pass" >
                        <label class="mdl-textfield__label" for="email">New Password</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" id="c_address" name="r_pass">
                        <label class="mdl-textfield__label" for="c_address">Confirm Password</label>
                    </div>
                    <div>
                    <button class="mdl-button mdl-button--colored mdl-button--raised" type="submit" name="settings">Submit</button>
                    </div>
                    <div class="succ"><?php if (isset($_SESSION['succ'])) {echo $_SESSION['succ']; unset($_SESSION['succ']);} ?></div>
                    <div class="error"><?php if (isset($_SESSION['err'])) {echo $_SESSION['err']; unset($_SESSION['err']);} ?></div>

                </div>
            </div>
        </form>
    </div>
  <footer class="mdl-mini-footer">
  <div class="mdl-mini-footer__left-section">
    <div class="mdl-logo">Resume Manager</div>
    <ul class="mdl-mini-footer__link-list">
      <li><a href="https://github.com/himavan">Himavan &copy; 2018 </a></li>
      <li><a href="#">Use only for educational purpose</a></li>
    </ul>
  </div>
</footer>
  </main>
</div>
</body>
</html>