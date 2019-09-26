<?php 
    include('dbh.inc.php');
    $user_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);

    $sql = "DELETE FROM users WHERE user_id='$user_id'";
    if(mysqli_query($conn, $sql)){
        header("location: ../index.php?userRemove=Success");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>