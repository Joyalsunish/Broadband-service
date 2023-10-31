<?php

function email($email,$subject,$message){
require 'vendor/autoload.php';
    //Create an instance; passing true enables exceptions
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    // Use SMT
    $mail->isSMTP();
    
    // SMTP settings
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'joyalsunish@gmail.com';
    $mail->Password = 'lolp rklg sxdu lbze';                 
    
    // Set 'from' email address and name
    $mail->setFrom('joyalsunish@gmail.com', 'Broadband service');
    
    // Add a recipient email address
    $mail->addAddress($email);
    
    // Email subject and body
    $mail->Subject = $subject;
    $mail->Body = $message;
    
    // Send email
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
        header('location: index.html');
    }
    return;
}
    ?>