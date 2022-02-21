<?php
    //connect to database
    $db = mysqli_connect('localhost','root','','shopping');

    // Check connection
    if ($db->connect_error) {
        echo "No Such Database";
    }

    $user_id=$_POST['user_id'];
    $saddress=$_POST['shippingaddress'];
    $sstate=$_POST['shippingstate'];
    $scity=$_POST['shippingcity'];
    $spincode=$_POST['shippingpincode'];

    $query=mysqli_query($db,"UPDATE users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where user_id='$user_id'");
    if($query)
    {
        echo "Shipping Address has been updated";
    }
    else 
    { 
      $error= mysqli_error($db);
    }

?>
