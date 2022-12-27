<?php
session_start();
require "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];


if(empty($email)){
    echo ("Please enter email");
}else if(empty($password)){
    echo ("First Name must have less than 50 characters");
}else{
    $rs = Database::search("SELECT * FROM `users` WHERE `email`='" . $email . "' 
    AND `password`='" . $password . "'");
    $n = $rs->num_rows;

   

    if($n == 1){
        $data = $rs->fetch_assoc();
        $_SESSION["au"] =$data;
        header('Location: admin.php');
        echo ("success");
       
       
    } else {
        echo ("Invalid Username or Password");
    }
}
?>