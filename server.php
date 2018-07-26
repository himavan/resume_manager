<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";
	$_SESSION['notice'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$radioVal = mysqli_real_escape_string($db, $_POST['auth_type']);
		$auth_type ='';$auth='';
		if($radioVal == "Student")
		{
			$auth_type = $radioVal;
		}
		else if ($radioVal == "Manager")
		{
			$auth_type = $radioVal;
		}

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if (empty($auth_type)) { array_push($errors, "Select user type"); }

		//check username
		if (count($errors) == 0) {
		$query1 = "SELECT * FROM users WHERE username ='".$username."'";
		$result = mysqli_query($db,$query1);
		if(mysqli_num_rows($result)>=1)
           {
            array_push($errors, "Username not available!");
		   }
		}
		   
		//check email
		$query2 = "SELECT * FROM users WHERE email ='".$email."'";
		$result = mysqli_query($db,$query2);
		if(mysqli_num_rows($result)>=1)
           {
            array_push($errors, "Email Already Exists!");
           }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		if ($username == 'admin') {
			$auth = '1';
			$auth_type='admin';
		}
		else{
			$auth = '0';
		}
		   
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password, auth_type,auth) 
					  VALUES('$username', '$email', '$password','$auth_type','$auth')";
			mysqli_query($db, $query);

			// $_SESSION['username'] = $username;
			$_SESSION['success'] = "Successfully Registered! Visit login page to Login";
			// header('location: user_home.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$row = mysqli_fetch_assoc($results) ;
				$_SESSION['username'] = $username;
				$_SESSION['fullname'] = $row['fullname'];
				$_SESSION['auth_type'] = $row['auth_type'];
				$_SESSION['auth'] = $row['auth'];
				
				 if($_SESSION['username'] == 'admin'){
					header('location: admin.php');
				}
				else if($_SESSION['auth_type'] == 'Manager'){
					if($_SESSION['auth'] == '1'){
						header('location: manager.php');
					}
					else{
						$_SESSION['notice'] = "Access Denied! Contact Application Administrator";
					}
				}else{
					 header('location: home.php');
				}
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
?>