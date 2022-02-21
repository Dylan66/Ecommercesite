<?php
    //connect to database
    $db = mysqli_connect('localhost','root','','shopping');

    // Check connection
    if ($db->connect_error) {
        echo "No Such Database";
    }

    $user_id=$_POST['user_id'];
    $productId=$_POST['product_id'];
    $quantity=$_POST['quantity'];
    $tenant_ID=$_POST['tenant_ID'];
    $value = array_combine($productId, $quantity);
    // print json_encode($quantity);
    var_dump($value);
    die();
    foreach($value as $qty=> $val34)
     {
         $sql = mysqli_query($con,"INSERT into orders(userId, productId, quantity, tenant_ID) values('".$_SESSION['id']."','$qty','$val34', '$tenant_ID')");
         if ($sql) {
             header('location:payment-method.php');
             # code...
         }else{
             echo mysqli_error($con);
         }
     }
    $sql = mysqli_query($db,"INSERT into orders(userId, productId, quantity, tenant_ID) values('$user_id','$productId','$quantity', '$tenant_ID')");
    if($sql)
    {
        echo "Order placed";
    }
    else 
    { 
      $error = mysqli_error($db);
    }

    if(isset($_POST['ordersubmit'])) 
    {
        
     if(strlen($_SESSION['login'])==0)
     {   
         header('location:login.php');
     }
     else
     {
         $quantity = $_POST['quantity'];
         $tenant_ID = $_POST['tenant_ID'];
         $pdd = $_SESSION['pid'];
         $value = array_combine($pdd, $quantity);
            
         print_r($tenant_ID);exit();
         foreach($value as $qty=> $val34)
         {
             $sql = mysqli_query($con,"INSERT into orders(userId, productId, quantity, tenant_ID) values('".$_SESSION['id']."','$qty','$val34', '$tenant_ID')");
             if ($sql) {
                 header('location:payment-method.php');
                 # code...
             }else{
                 echo mysqli_error($con);
             }
         }
     }
    }
?>
