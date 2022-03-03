<?php 
use PHPMailer\PHPMailer\PHPMailer;
				use PHPMailer\PHPMailer\SMTP;
				use PHPMailer\PHPMailer\Exception;
	session_start();

	// variable declaration
	$email    = "";
	$errors = []; 
	$success = []; 

	// connect to database
	include 'dbconn.php';

	// LOGIN USER
	if (isset($_POST['reset_password'])) {
		$email = $_POST['email'];

		if (count($errors) == 0) {
			$query = "SELECT * FROM users WHERE email='$email'";
			$results = $db->query($query);
			$get = mysqli_fetch_array($results);

			if (mysqli_num_rows($results)) {
				$token = bin2hex(random_bytes(50));

				// Genarate random string
				$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				function generate_string($input, $strength = 25) {
				    $input_length = strlen($input);
				    $random_string = '';
				    for($i = 0; $i < $strength; $i++) {
				        $random_character = $input[mt_rand(0, $input_length - 1)];
				        $random_string .= $random_character;
				    }
				 
				    return $random_string;
				}
				// end random string

				$password = generate_string($permitted_chars, 15);
				$pass = sha1($password);
				

				// message to db
				$message = "Please use this password to login <b>$password</b>";

				

				// Load Composer's autoloader
				//require 'phpmailer/autoload.php';
				require_once 'PHPMailer/src/Exception.php';
				require_once 'PHPMailer/src/PHPMailer.php';
				require_once 'PHPMailer/src/SMTP.php';

				// Instantiation and passing `true` enables exceptions
				$mail = new PHPMailer(true);


				// $mail->SMTPDebug = SMTP::DEBUG_SERVER;   
				$mail->SMTPDebug = 0;                   // Enable verbose debug output
				$mail->isSMTP();                                            // Send using SMTP
				$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
				$mail->Username   = 'mustprojectemail2020@gmail.com';                     // SMTP username
				$mail->Password   = 'projectemail2020';                               // SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 

				$mail->setFrom('mustprojectemail2020@gmail.com', 'Abas Procurement & Bid');
				// First recepient
				$mail->addAddress($_POST['email']);

				$mail->isHTML(true);// Set email format to HTML

				$mail->Subject = 'Password Recovery';
				$mail->Body    = $message;
				// $mail->AltBody = $_POST['message'];

				if(!$mail->send()) {
				    echo 'Message could not be sent.';
				    echo 'Mailer Error: ' . $mail->ErrorInfo;
				}
				// if the email address has been sent, update the database
				else {
				    array_push($success, "An email has been to you on how to reset! Check your email for more details");

				    // make that task have notes
				    mysqli_query($db,"UPDATE users SET password ='$pass' WHERE email='$email'");
				}
			}
			else {
				array_push($errors, "Oops! Email not found");
			}
		}
	}

?>

