<?php include('check_session.php');?>

<?php  if (!empty($_SESSION['username']) && ($_SESSION['username'] == 'admin') ){ 
    
    
}
else{
    $_SESSION['notice']="Access Denied!";
        unset($_SESSION['username']);
		unset($_SESSION['rid']);
		unset($_SESSION['auth']);
		unset($_SESSION['auth_type']);
		header("location: login.php");
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

<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">>Online Job Application Portal</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation">
      <a class="mdl-navigation__link"  href="settings.php?page=admin">Settings</a>
      
      <?php  if (!empty($_SESSION['username'])){ ?>
      
      <a class="mdl-navigation__link"  href="home.php?logout='1'">logout</a>
      
      <?php }  ?>
			 
		

      </nav>
    </div>
  </header>

  <main class="mdl-layout__content" >
    <div class="page-content" >
        <div class="mdl-shadow--3dp" style="width:500px;margin:20px auto;border-radius:5px;overflow:hidden">
            <div style="text-align:center">
                <h1 style="font-size:30px">Admin Page</h1>
            </div>
        </div>
        <?php
            
            include('db.php');

            if(isset($_GET['username']) && isset($_GET['auth']) ){

                if($_GET['auth'] == '1'){
                    $val = '0';
                }
                else{
                    $val = '1';
                }

                $update_query = "UPDATE users SET auth='".$val."' WHERE username='".$_GET['username']."'";
                mysqli_query( $db,$update_query);
            }


            $query1 = "SELECT username, email, auth FROM users WHERE auth_type='Manager' AND auth ='1'";
            $result1 = mysqli_query( $db,$query1);

            $query2 = "SELECT username, email, auth FROM users WHERE auth_type='Manager' AND auth ='0'";
            $result2 = mysqli_query( $db,$query2);
        ?>
        <div class="mdl-shadow--3dp" style="background:white;margin:auto;width:800px" >
        <div  class="card-header" style="background:#00b9d8;">Active Managers</div>
        <div class="mdl-cell--12-col" style="">
            <table class="mdl-data-table mdl-js-data-table" style="width:800px" >
            <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Username</th>
                    <th class="mdl-data-table__cell--non-numeric">Email ID</th>
                    <th class="mdl-data-table__cell--non-numeric">Authenticated</th>
                </tr>
            </thead>
            <tbody>
            <?php   
                if(mysqli_num_rows($result1)>0 ) {
                while($row = mysqli_fetch_array($result1, MYSQL_NUM)) {
            ?>
            <tr>
                <!--Each table column is echoed in to a td cell-->
                <td class="mdl-data-table__cell--non-numeric"><?php echo $row[0]; ?></td>
                <td class="mdl-data-table__cell--non-numeric"><?php echo $row[1]; ?></td>
                <td class="mdl-data-table__cell--non-numeric">
                <a class="mdl-button mdl-button--colored mdl-button--raised" href="admin.php?username=<?php echo $row[0] ?>&auth=<?php echo $row[2] ?>">Deactivate</a>
                </td>
            </tr>
            <?php
                    }
                }
            else{
            ?>
                <tr><td class="mdl-data-table__cell--non-numeric" colspan="3" > No Active Managers to display </td></tr>
            <?php
            }
            ?>
            </tbody>
            </table>
        </div>
    </div>

    <div class="mdl-shadow--3dp" style="background:white;margin:10px auto;width:800px" >
        <div  class="card-header" style="background:#00b9d8;">Inactive Managers</div>
        <div class="mdl-cell--12-col" style="">
            <table class="mdl-data-table mdl-js-data-table" style="width:800px" >
            <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Username</th>
                    <th class="mdl-data-table__cell--non-numeric">Email ID</th>
                    <th class="mdl-data-table__cell--non-numeric">Authenticated</th>
                </tr>
            </thead>
            <tbody>
            <?php   
                if(mysqli_num_rows($result2)>0 ) {
                while($row1 = mysqli_fetch_array($result2, MYSQL_NUM)) {
            ?>
            <tr>
                <!--Each table column is echoed in to a td cell-->
                <td class="mdl-data-table__cell--non-numeric"><?php echo $row1[0]; ?></td>
                <td class="mdl-data-table__cell--non-numeric"><?php echo $row1[1]; ?></td>
                <td class="mdl-data-table__cell--non-numeric">
                    <a class="mdl-button mdl-button--colored mdl-button--raised" href="admin.php?username=<?php echo $row1[0] ?>&auth=<?php echo $row1[2] ?>">Activate</a>
                </td>
            </tr>
            <?php
                    }
                }
            else{
            ?>
                <tr><td class="mdl-data-table__cell--non-numeric" colspan="3" > No Inactive Managers to display </td></tr>
            <?php
            }
            ?>
            </tbody>
            </table>
        </div>
    </div>      
    </div>
  </main>
  <footer class="mdl-mini-footer">
  <div class="mdl-mini-footer__left-section">
    <div class="mdl-logo">>Online Job Application Portal</div>
    <ul class="mdl-mini-footer__link-list">
      <li><a href="https://github.com/himavan">Himavan &copy; 2018 </a></li>
      <li><a href="#">Use only for educational purpose</a></li>
    </ul>
  </div>
</footer>
</div>
</body>
</html>