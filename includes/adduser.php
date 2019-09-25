<?php 
    include('dbh.inc.php');
    $user_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
    $firstName = mysqli_real_escape_string($conn, $_REQUEST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_REQUEST['lastName']);
    $role_id = mysqli_real_escape_string($conn, $_REQUEST['role_id']);
    $date = date("Y-m-d");

    $sql = "INSERT INTO users (user_id, firstname, lastname, role_id, date) VALUES ('$user_id', '$firstName', '$lastName','$role_id', '$date')";
    if(mysqli_query($conn, $sql)){
        header("location: ./index.php?userAdd=Success");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>