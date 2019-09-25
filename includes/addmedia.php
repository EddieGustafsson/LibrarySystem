<?php 
    include('dbh.inc.php');
    $item_id = mysqli_real_escape_string($conn, $_REQUEST['item_id']);
    $title = mysqli_real_escape_string($conn, $_REQUEST['title']);
    $cat_id = mysqli_real_escape_string($conn, $_REQUEST['cat_id']);
    $genre_id = mysqli_real_escape_string($conn, $_REQUEST['genre_id']);

    //Insert into media
    $sql = "INSERT INTO media (item_id, title, cat_id, genre_id) VALUES ('$item_id', '$title', '$cat_id', '$genre_id')";
    if(mysqli_query($conn, $sql)){
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    if($_REQUEST['cat_id'] == 1){ //Check if media is book
        $author_id = mysqli_real_escape_string($conn, $_REQUEST['author_id']);
        $sql = "INSERT INTO book (item_id, title, genre_id, author_id) VALUES ('$item_id', '$title', '$genre_id', '$author_id')";
        if(mysqli_query($conn, $sql)){
            header("location: ../index.php?genreAdd?book=Success");
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }

    if($_REQUEST['cat_id'] == 2){ //Check if media is CD
        $narrator_id = mysqli_real_escape_string($conn, $_REQUEST['narrator_id']);
        $sql = "INSERT INTO cd (item_id, title, genre_id, narrator_id) VALUES ('$item_id', '$title', '$genre_id', '$narrator_id')";
        if(mysqli_query($conn, $sql)){
            header("location: ../index.php?genreAdd?cd=Success");
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }

    if($_REQUEST['cat_id'] == 3){ //Check if media is DVD
        $director_id = mysqli_real_escape_string($conn, $_REQUEST['director_id']);
        $sql = "INSERT INTO dvd (item_id, title, genre_id, director_id) VALUES ('$item_id', '$title', '$genre_id', '$director_id')";
        if(mysqli_query($conn, $sql)){
            header("location: ../index.php?genreAdd?dvd=Success");
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }



?>