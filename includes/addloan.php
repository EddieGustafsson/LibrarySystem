<?php 
    include('dbh.inc.php');
    $user_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
    $start_date = mysqli_real_escape_string($conn, $_REQUEST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_REQUEST['end_date']);
    $item_id = mysqli_real_escape_string($conn, $_REQUEST['item_id']);
    $is_borrowed = 1;

    $d_is_borrowed = "SELECT is_borrowed FROM media WHERE item_id='$item_id'";
    $result = $conn->query($d_is_borrowed);

        if($result = 0){
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

?>