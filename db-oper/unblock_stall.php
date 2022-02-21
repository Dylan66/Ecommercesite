<?php
    //connect to database
    $db = mysqli_connect('localhost','root','','shopping');

    // Check connection
    if ($db->connect_error) {
        echo "No Such Database";
    }

    $unblock_id = $_GET['unblock_id'];
    $query = "UPDATE users SET stall = '1' WHERE user_id='$unblock_id'";

    $result = $db->query($query);
    if($result) 
      {
        echo "Account unblocked";
        mysqli_query($db, "UPDATE stalls SET status = '1' WHERE tenant_ID='$unblock_id'");
      }
    else 
    { 
      $error= mysqli_error($db);
    }

?>