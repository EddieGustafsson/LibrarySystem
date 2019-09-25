<?php 
    include('dbh.inc.php');
    $genre_id = mysqli_real_escape_string($conn, $_REQUEST['genre_id']);
    $genre_name = mysqli_real_escape_string($conn, $_REQUEST['genre_name']);

    $sql = "INSERT INTO genre (genre_id, genre_name) VALUES ('$genre_id', '$genre_name')";
    if(mysqli_query($conn, $sql)){
        header("location: ../index.php?genreAdd=Success");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>