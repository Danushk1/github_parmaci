<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;




if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $admin_rs = Database::search("SELECT * FROM `add_order` WHERE `id`='".$pid."'");
    $admin_num = $admin_rs->num_rows;
    $user_data = $admin_rs->fetch_assoc();

   $email=$user_data['users_email'];

   $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'danushksupun1@gmail.com';
            $mail->Password = 'byqaktvrqrzynnpv';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('danushksupun1@gmail.com', 'Admin Verification');
            $mail->addReplyTo('danushksupun1@gmail.com', 'Admin Verification');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'eShop Admin Login Verification Code';
            $bodyContent = '<h1 style="color:blue;">Your verification code is</h1> http://http://localhost/php';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending failed';
            } else {
                echo 'Success';
                header('Location: admin.php');
            }


  

   


}
?>
