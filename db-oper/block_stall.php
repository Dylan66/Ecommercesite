<?php
    //connect to database
    $db = mysqli_connect('localhost','root','','shopping');

    // Check connection
    if ($db->connect_error) {
        echo "No Such Database";
    }

    $block_id = $_GET['block_id'];
    $query = "UPDATE users SET stall = '2' WHERE user_id='$block_id'";

    $result = $db->query($query);
    if($result) 
      {
        echo "User blocked";
        mysqli_query($db, "UPDATE stalls SET status = '4' WHERE tenant_ID='$block_id'");
      }
    else 
    { 
      $error= mysqli_error($db);
    }

?>