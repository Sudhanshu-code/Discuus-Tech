<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include('_dbconnection.php');
    $login_email = $_POST['email'];
    $login_pass = $_POST['pass'];
    $sql = "SELECT * FROM users WHERE username = '$login_email'";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($login_pass, $row['userpass'])){
            $user_identity = $row['user_id'];
            session_start();
            $_SESSION['loggin'] = true;
            $_SESSION['userid'] = $user_identity;
            $_SESSION['username'] = $login_email;
            header("Location: /prc/index.php?login=true");
        }
        else{
            header("Location: /prc/index.php?login=invalidpass");
        }
    }
    else{
        header("Location: /prc/index.php?login=invaliduser");
    }
}
