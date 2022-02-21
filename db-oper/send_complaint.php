<?php
    //connect to database
    $db = mysqli_connect('localhost','root','','shopping');

    // Check connection
    if ($db->connect_error) {
        echo "No Such Database";
    }

    // values from form
    $msg = mysqli_real_escape_string($db,$_POST['msg']);
    $email = $_POST['email'];


    $query = "INSERT INTO complaints(email, complaint, created) VALUES('$email', '$msg', now())";

    $res = $db->query($query);

    if($res) 
    {
    	echo "Thank you for your message. We shall get back to you as soon as possible";
    }  
    else 
    { 
      echo mysqli_error($db);
    }

    
?>
