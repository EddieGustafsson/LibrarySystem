<?php 

include("dbh.inc.php");

switch ($_POST['function']) {
    case 'addAuthor':
        addAuthor($conn);
        break;
    case 'addDirector':
        addDirector($conn);
        break;
    case 'addGenre':
        addGenre($conn);
        break;
    case 'addLoan':
        addLoan($conn);
        break;
    case 'addMedia':
        addMedia($conn);
        break;
    case 'addNarrator':
        addNarrator($conn);
        break;
    case 'addUser':
        addUser($conn);
        break;
    default:
        error();


function addAuthor($conn){
    $author_fname = mysqli_real_escape_string($conn, $_REQUEST['author_fname']);
    $author_lname = mysqli_real_escape_string($conn, $_REQUEST['author_lname']);

    $sql = "INSERT INTO authors (author_fname, author_lname) VALUES ('$author_fname', '$author_lname')";
    if(mysqli_query($conn, $sql)){
        header("location: ../index.php?authorAdd=Success");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}

function addDirector($conn){
    $director_fname = mysqli_real_escape_string($conn, $_REQUEST['director_fname']);
    $director_lname = mysqli_real_escape_string($conn, $_REQUEST['director_lname']);

    $sql = "INSERT INTO directors (director_fname, director_lname) VALUES ('$director_fname', '$director_lname')";
    if(mysqli_query($conn, $sql)){
        header("location: ../index.php?directorAdd=Success");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}

function addGenre($conn){
    $genre_id = mysqli_real_escape_string($conn, $_REQUEST['genre_id']);
    $genre_name = mysqli_real_escape_string($conn, $_REQUEST['genre_name']);

    $sql = "INSERT INTO genre (genre_id, genre_name) VALUES ('$genre_id', '$genre_name')";
    if(mysqli_query($conn, $sql)){
        header("location: ../index.php?genreAdd=Success");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}

function addLoan($conn){
    $user_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
    
    $start_date = mysqli_real_escape_string($conn, $_REQUEST['start_date']);
    $date = strtotime($start_date);
    $date = strtotime("3 week", $date);
    $end_date = date('y-m-d', $date);

    $item_id = mysqli_real_escape_string($conn, $_REQUEST['item_id']);
    $is_borrowed = 1;

    $d_is_borrowed = "SELECT is_borrowed FROM media WHERE item_id='$item_id'";
    $result = mysqli_query($conn, $d_is_borrowed);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            if($row['is_borrowed'] == '0'){
                $sql = "INSERT INTO borrowed (user_id, item_id, start_date, end_date) VALUES ('$user_id', '$item_id', '$start_date', '$end_date')";
                if(mysqli_query($conn, $sql)){
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
                
                $sql3 = "UPDATE `media` SET `is_borrowed` = '1' WHERE `media`.`item_id` = '$item_id'";
                if(mysqli_query($conn, $sql3)){
                    header("location: ../index.php?loanAdd=Success");
                } else{
                    echo "ERROR: Could not able to execute $sql3. " . mysqli_error($conn);
                }
            } else {
                header("location: ../index.php?loanAdd=ERROR?reason=NotAvailable");
            }

        }
    } else {
        header("location: ../index.php?loanAdd=ERROR?reason=DontExist");
    }
}

function addMedia($conn){
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
}

function addNarrator($conn){
    $narrator_fname = mysqli_real_escape_string($conn, $_REQUEST['narrator_fname']);
    $narrator_lname = mysqli_real_escape_string($conn, $_REQUEST['narrator_lname']);

    $sql = "INSERT INTO narrators (narrator_fname, narrator_lname) VALUES ('$narrator_fname', '$narrator_lname')";
    if(mysqli_query($conn, $sql)){
        header("location: ../index.php?narratorAdd=Success");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}

function addUser($conn){
    $user_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
    $firstName = mysqli_real_escape_string($conn, $_REQUEST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_REQUEST['lastName']);
    $role_id = mysqli_real_escape_string($conn, $_REQUEST['role_id']);
    $date = date("Y-m-d");

    $sql = "INSERT INTO users (user_id, firstname, lastname, role_id, date) VALUES ('$user_id', '$firstName', '$lastName','$role_id', '$date')";
    if(mysqli_query($conn, $sql)){
        header("location: ../index.php?userAdd=Success");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}

function error(){
    echo "error";
}

?>