<?php
    //connect to database
    $db = mysqli_connect('localhost','root','','shopping');

    // Check connection
    if ($db->connect_error) {
        echo "No Such Database";
    }

    // values from form
    $purpose = mysqli_real_escape_string($db,$_POST['purpose']);
    $tenant_ID = $_POST['tenant_ID'];


    $query = mysqli_query($db,"INSERT INTO stalls(tenant_ID,purpose, status, created) values('$tenant_ID','$purpose', 0, now())");


    if($query) 
    {
    	echo "Your request has been sent";
    }  
    else 
    { 
      echo mysqli_error($db);
    }

    
?>
