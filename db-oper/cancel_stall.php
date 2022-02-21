<?php
    //connect to database
    $db = mysqli_connect('localhost','root','','shopping');

    // Check connection
    if ($db->connect_error) {
        echo "No Such Database";
    }

    $cancel_id = $_GET['cancel_id'];
    $query = "UPDATE stalls SET status = '2' WHERE tenant_ID='$cancel_id'";

    $result = $db->query($query);
    if($result) 
      {
        echo "Request cancelled";
      }
    else 
    { 
      $error= mysqli_error($db);
    }

?>
