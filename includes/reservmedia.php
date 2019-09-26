<?php 
    include('dbh.inc.php');
    $user_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
    $start_date = mysqli_real_escape_string($conn, $_REQUEST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_REQUEST['end_date']);
    $item_id = mysqli_real_escape_string($conn, $_REQUEST['item_id']);
    $is_borrowed = 1;

    $date = "SELECT start_date, end_date FROM borrowed WHERE item_id='$item_id'";
    $result = mysqli_query($conn, $date);
    $resultCheck = mysqli_num_rows($result);


    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            if($row['start_date'] != $start_date && $row['end_date'] != $end_date){
                    $sql = "INSERT INTO borrowed (user_id, item_id, start_date, end_date) VALUES ('$user_id', '$item_id', '$start_date', '$end_date')";
                    if(mysqli_query($conn, $sql)){
                        header("location: ../index.php?reservationAdd=Success");
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
            } else {
                header("location: ../index.php?loanAdd=ERROR?reason=DateNotAvailable");
            }
        }
    }
?>