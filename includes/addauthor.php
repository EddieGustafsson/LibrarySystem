<?php 
    include('dbh.inc.php');
    $author_fname = mysqli_real_escape_string($conn, $_REQUEST['author_fname']);
    $author_lname = mysqli_real_escape_string($conn, $_REQUEST['author_lname']);

    $sql = "INSERT INTO authors (author_fname, author_lname) VALUES ('$author_fname', '$author_lname')";
    if(mysqli_query($conn, $sql)){
        header("location: ../index.php?authorAdd=Success");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>