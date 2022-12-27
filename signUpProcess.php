<?php

require "connection.php";

$name = $_POST["f"];
$email = $_POST["e"];
$password = $_POST["p"];
$mobile = $_POST["m"];
$dob = $_POST["g"];
$address = $_POST["a"];

if(empty($name)){
    echo ("Please enter your First Name !!!");
}else if(strlen($name) > 50){
    echo ("First Name must have less than 50 characters");
}else if (empty($email)){
    echo ("Please enter your Email !!!");
}else if(strlen($email) >= 100){
    echo ("Email must have less than 100 characters");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email !!!");
}else if (empty($password)){
    echo ("Please enter your Password !!!");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Password must be between 5 - 20 charcters");
}else if(empty($mobile)){
    echo ("Please enter your Mobile !!!");
}else if(strlen($mobile) != 10){
    echo ("Mobile must have 10 characters");
}else if(!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile)){
    echo ("Invalid Mobile !!!");
}else if(strlen($dob) ==8){
    echo ("Please enter your BirthDay !!!");
}else if(strlen($address) < 10){
    echo ("Please enter your BirthDay !!!");
}else{

$rs = Database::search("SELECT * FROM `users` WHERE `email`='".$email."' OR `mobile`='".$mobile."'");
$n = $rs->num_rows;

if($n > 0){
    echo ("User with the same Email or Mobile already exists.");
}else{
   
    Database::iud("INSERT INTO `users` 
    (`name`,`email`,`mobile`,`password`,dob,`address`) VALUES 
    ('".$name."','".$email."','".$mobile."','".$password."','".$dob."','".$address."')");

    echo "success";

}
    
}

?>