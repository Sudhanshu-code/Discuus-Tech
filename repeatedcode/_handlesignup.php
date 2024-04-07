<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    include("_dbconnection.php");
    $username = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    //This Script is to check wheather the user Already Exists or not
    $exist_user_sql = "SELECT * FROM `users` WHERE username='$username'";
    $result = mysqli_query($connection, $exist_user_sql);
    $num = mysqli_num_rows($result);
    if($num > 0){
        header("Location: /prc/index.php?signup=false");
       
    }

    //This Script is to INSERT the user details in the database
    else{
        //This Script is to check wheather the passwords match or not
        //If password matches then insert the user in the database
        if($password==$cpassword){
            $hashedpass = password_hash($password, PASSWORD_DEFAULT);
            // $sql="INSERT INTO `users` (`username`, `userpass`, `timestamp`) VALUES ('$username', '$hashedpass', current_timestamp())";
            $sql = "INSERT INTO `users` (`username`, `userpass`, `timestamp`) VALUES ('$username', '$hashedpass', current_timestamp())";

            $result = mysqli_query($connection, $sql);
            header("Location: /prc/index.php?signupsuccess=true");
            exit();
        }
        else{
           
            header("Location: /prc/index.php?signupsuccess=false");

        }
    }
   

}
