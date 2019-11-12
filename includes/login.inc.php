<?php

session_start();

if (isset($_POST['submit'])){

    include 'dbh.inc.php';

    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    //Error handlers
    //Check if inputs are empty
    if(empty($username) || empty($password)){
        header("Location: ../login.php?login=empty");
        exit();
    } else{

        $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1) {
            header("Location: ../login.php?login=error");
            exit();
        } else{
            if($row = mysqli_fetch_assoc($result)){
                //De-hashing the password
                $hashedpasswordCheck = password_verify($password, $row['password']);
                if($hashedpasswordCheck == false){
                    header("Location: ../login.php?login=error");
                    exit();
                } elseif ($hashedpasswordCheck == true){
                    //Log in the user here
                    $_SESSION['login_user'] = $username;
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