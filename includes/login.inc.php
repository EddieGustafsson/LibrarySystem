<?php

session_start();

if (isset($_POST['submit'])){

    include 'dbh.inc.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    //Error handlers
    //Check if inputs are empty
    if(empty($username) || empty($pass)){
        header("Location: ../login.php?login=empty");
        exit();
    } else{
        $sql = "SELECT * FROM admin WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1) {
            header("Location: ../login.php?login=error");
            exit();
        } else{
            if($row = mysqli_fetch_assoc($result)){
                //De-hashing the password
                $hashedPwdCheck = password_verify($pass, $row['password']);
                if($hashedPwdCheck == false){
                    header("Location: ../login.php?login=error");
                    exit();
                } elseif ($hashedPwdCheck == true){
                    //Log in the user here
                    $_SESSION['id'] =$row['id'];
                    $_SESSION['username'] =$row['username'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../login.php?login=error");
    exit();
}