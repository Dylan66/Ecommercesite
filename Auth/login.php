<?php 
	session_start();

	// variable declaration
	$email    = "";
	$errors = array(); 

	// connect to database
	include 'dbconn.php';

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		if (count($errors) == 0) {
			$password = sha1($password);
			$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			$results = $db->query($query);
			$get = mysqli_fetch_array($results);

			if (mysqli_num_rows($results)) {
				$usertype = $get['user_type'];
				/*redirect users based on their roles here*/
				switch ($usertype) {
					case 'Customer':
					echo "Customer";
						$_SESSION['Admin'] = $get['username'];
						//header("Location: Admin/index.php");
						break;

					case 'Tenant':
					echo "Tenant";
						$_SESSION['User'] = $get['username'];
						//header("Location: Users/index.php");
						break;

					// case '1':
					// 	$_SESSION['User'] = $get['fullname'];
					// 	header("Location: Users/index.php");
					// 	break;
					
					default:
						# code...
						break;
				}
			}
			else {
				array_push($errors, "Wrong email/password combination");
			}
		}
	}

?>