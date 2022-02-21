<?php
    //connect to database
    $db = mysqli_connect('localhost','root','','shopping');

    // Check connection
    if ($db->connect_error) {
        echo "No Such Database";
    }

    $rej_id = $_GET['rej_id'];
    $query = "UPDATE stalls SET status = '3' WHERE tenant_ID='$rej_id'";

    $result = $db->query($query);
    if($result) 
      {
        echo "Request rejected";
      }
    else 
    { 
      $error= mysqli_error($db);
    }

?>
