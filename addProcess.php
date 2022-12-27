<?php

session_start();
require "connection.php";

$email = $_SESSION["u"]["email"];

$daddres = $_POST["da"];
$dtime= $_POST["dt"];
$note = $_POST["n"];


if(empty($daddres)){
    echo ("Please Enter the Address");
}else if(empty($dtime)){
    echo ("Please Enter the Time ");
}else if(empty($note)){
    echo ("Please Enter the Note");

}else{
    
   

    $status = 1;

    Database::iud("INSERT INTO `add_order`
    (`delevery_address`,`time`,`note`,`users_email`,`status`) VALUES 
    ('".$daddres."','".$dtime."','".$note."','".$email."','".$status."')");

    echo ("prescriptions. saved successfully");

    $addorderid = Database::$connection->insert_id;

    $length = sizeof($_FILES);


    if($length <= 5 && $length > 0){

        $allowed_img_extentions = array ("image/jpg","image/jpeg","image/png","image/svg+xml");

        for($x = 0; $x < $length;$x++){
            if(isset($_FILES["image".$x])){

                $img_file = $_FILES["image".$x];
                $file_extention = $img_file["type"];

                if(in_array($file_extention,$allowed_img_extentions)){

                    $new_img_extention;

                    if($file_extention == "image/jpg"){
                        $new_img_extention = ".jpg";
                    }else if($file_extention == "image/jpeg"){
                        $new_img_extention = ".jpeg";
                    }else if($file_extention == "image/png"){
                        $new_img_extention = ".png";
                    }else if($file_extention == "image/svg+xml"){
                        $new_img_extention = ".svg";
                    }

                    $file_name = "resource//prescriptions_images//".$x."_".uniqid().$new_img_extention;
                    move_uploaded_file($img_file["tmp_name"],$file_name);

                    Database::iud("INSERT INTO `images`(`code`,`add_order_id`) VALUES ('".$file_name."','".$addorderid."')");

                }else{
                    echo ("Invalid Image type");
                }

            }
        }

        echo ("prescriptions image saved successfully");

    }else{
        echo ("Invalid image count");
    }
    
    
    
}

?>