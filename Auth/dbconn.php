
<?php

//connect to database
$db = mysqli_connect('localhost','root','','shopping');

// Check connection
if ($db->connect_error) {
    echo "No Such Database";
}

?>