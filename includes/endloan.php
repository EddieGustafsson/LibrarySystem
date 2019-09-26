<?php 
    include('dbh.inc.php');
    $user_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
    $start_date = mysqli_real_escape_string($conn, $_REQUEST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_REQUEST['end_date']);
    $item_id = mysqli_real_escape_string($conn, $_REQUEST['item_id']);
    $is_borrowed = 1;

    $sql3 = "UPDATE `media` SET `is_borrowed` = '0' WHERE `media`.`item_id` = '$item_id'";
    if(mysqli_query($conn, $sql3)){
                header("location: ../index.php?loanEnd=Success");
    } else{
        echo "ERROR: Could not able to execute $sql3. " . mysqli_error($conn);
    }


?>