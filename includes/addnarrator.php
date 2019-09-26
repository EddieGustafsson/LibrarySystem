<?php 
    include('dbh.inc.php');
    $narrator_fname = mysqli_real_escape_string($conn, $_REQUEST['narrator_fname']);
    $narrator_lname = mysqli_real_escape_string($conn, $_REQUEST['narrator_lname']);

    $sql = "INSERT INTO narrators (narrator_fname, narrator_lname) VALUES ('$narrator_fname', '$narrator_lname')";
    if(mysqli_query($conn, $sql)){
        header("location: ../index.php?narratorAdd=Success");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>