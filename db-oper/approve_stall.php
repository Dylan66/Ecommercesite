<?php
    //connect to database
    $db = mysqli_connect('localhost','root','','shopping');

    // Check connection
    if ($db->connect_error) {
        echo "No Such Database";
    }

    $approve_id = $_GET['approve_id'];

    $sql = mysqli_query($db, "SELECT tenant_ID FROM stalls WHERE stall_id = '$approve_id'");
    $row = mysqli_fetch_assoc($sql);
    $tid = $row['tenant_ID'];
    // echo $tid;
    $query = "UPDATE stalls SET status = '1' WHERE tenant_ID='$approve_id'";

    $result = $db->query($query);
    if($result) 
      {
        echo "Request approved";
        //therefore open tenant account
        mysqli_query($db, "UPDATE users SET stall = '1' WHERE user_id = '$tid'");
      }
    else 
    { 
      $error= mysqli_error($db);
    }

?>
