<?php
    //connect to database
    $db = mysqli_connect('localhost','root','','test');

    // Check connection
    if ($db->connect_error) {
        echo "No Such Database";
    }

    // values from form
    $fullname = mysqli_real_escape_string($db,$_POST['fullname']);
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $krapin = $_POST['krapin'];
    $country = mysqli_real_escape_string($db,$_POST['country']);
    $usertype = $_POST['usertype'];
    $pass = mysqli_real_escape_string($db,$_POST['password']);
    $password = sha1($pass);
    // insert query here
    $sql = "SELECT * FROM users";
    $result = $db->query($sql);
    $get = mysqli_fetch_array($result);
    if ($email == $get['email']) {
        echo "Email already exists!!";
    }
    elseif ($phone == $get['mobile']) {
        echo "Phone number exists!!";
    }
    elseif ($username == $get['username']) {
        echo "Username Taken!!";
    }
    else{
        $query = "INSERT INTO users(fullname, username, email, mobile, krapin, country, password, user_type,   created) VALUES('$fullname', '$username', '$email', '$phone', '$krapin', '$country', '$password', '$usertype', now())";

        $result = $db->query($query);
        if($result) 
          {
            echo "User successfully added";
          }
        else 
        { 
          $di= mysqli_error($db); echo "Registration Failed" . "<p>{$di}</p>";
        }
    }


?>
