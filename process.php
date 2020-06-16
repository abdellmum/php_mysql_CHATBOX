<?php
include 'database.php';
if(isset($_POST["submit"])){
    //inputs:
    $user = mysqli_real_escape_string($conn,$_POST["username"]);
    $message = mysqli_real_escape_string($conn,$_POST["mssg"]);

    date_default_timezone_get("Africa/Casablanca");
    $time = date("H:i:s",time());

    if(empty($user) || empty($message)){

        $error = "please fill in the empty fields";

        header("Location: index.php?error=".urlencode($error));

        exit();
    
        
    }else{

        $sql1 = "INSERT INTO `chat` ('username','mssg','date')
        VALUES ('$user', '$message', '$time')";

        $result = mysqli_query($conn, $sql1);

        if(!$result){
             die('error'. mysqli_error($conn));
        }

   header("Location: index.php");

       exit();

    } 
} 