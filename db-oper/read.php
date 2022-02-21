<?php
    //connect to database
    $db = mysqli_connect('localhost','root','','shopping');

    // Check connection
    if ($db->connect_error) {
        echo "No Such Database";
    }

    $status = $_GET['status'];
    $query = "UPDATE complaints SET seen = '1' WHERE seen='$status'";

    $result = $db->query($query);
    if($result) 
      {
        echo "read";
      }
    else 
    { 
      $error= mysqli_error($db);
    }
    



?>
