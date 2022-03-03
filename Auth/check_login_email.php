<?php 
	require_once("dbconn.php");
	if(!empty($_POST["email"])) {
		$email= $_POST["email"];
		
		$result = mysqli_query($db,"SELECT email FROM users WHERE email='$email'");
		$count = mysqli_num_rows($result);
		if($count == 0)
		{
			echo "<span class='text-danger'> Oops sorry! We do not recognise this email address</span>";
		 	echo "<script>$('#login_email').addClass('is-invalid');</script>";
		 	echo "<script>$('#login_user').prop('disabled',true);</script>";
		} 
		else
		{
			echo "<span class='text-success'></span>";
		 	echo "<script>$('#login_email').addClass('is-valid');</script>";
		 	echo "<script>$('#login_user').prop('disabled',false);</script>";
		}
	}
?>
