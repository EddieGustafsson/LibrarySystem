<?php 
    include('dbh.inc.php');
    $director_fname = mysqli_real_escape_string($conn, $_REQUEST['director_fname']);
    $director_lname = mysqli_real_escape_string($conn, $_REQUEST['director_lname']);

    $sql = "INSERT INTO directors (director_fname, director_lname) VALUES ('$director_fname', '$director_lname')";
    if(mysqli_query($conn, $sql)){
        header("location: ../index.php?directorAdd=Success");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>