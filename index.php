<?php
include 'phpmailer/PHPMailerAutoload.php';
include 'db.php';
require 'emailuserpass.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Email</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<?php

    if(isset($_POST['sendmail'])){

        $mail_id = $_POST['email'];
        $mail_sub = $_POST['subject'];
        $mail_body = $_POST['message'];

        $mail = new PHPMailer;
        
        // $mail->SMTPDebug = 4;                                  // Enable verbose debug output
        
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.mailtrap.io';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = EMAIL;                              // SMTP username
        $mail->Password = PASS;                               // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 2525;                                    // TCP port to connect to
        
        $mail->setFrom(EMAIL, 'PHP MAILER');
        $mail->addAddress($_POST['email']);                   // Add a recipient
        $mail->addReplyTo(EMAIL);

    for($i=0; $i < count($_FILES['file']['tmp_name']); $i++)
    {    
        $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);  
    }
        
            $mail->isHTML(false);                                  // Set email format to HTML
            
            $mail->Subject = $_POST['subject'];
            $mail->Body = $_POST['message'];
            
            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {

       $sql = "INSERT INTO `naowas_mail_1`(`email_id`, `sub`, `message_body`)VALUES(:email,:subject,:message)";
            $query = $conn -> prepare($sql);
            $query->bindParam(':email',$mail_id,PDO::PARAM_STR);
            $query->bindParam(':subject',$mail_sub,PDO::PARAM_STR);
            $query->bindParam(':message',$mail_body,PDO::PARAM_STR);
            $query -> execute();
            echo "<script>alert('Mail has been sent')</script>";
            echo"<script>window.open('index.php','_self')</script>";

        }

    }

?>

<body>
    <div class="contact-clean">

        <form action="index.php" method="post" enctype="multipart/form-data" >
            <h2 class="text-center">Send E-mail </h2>
			 <div class="form-group"><input class="form-control is-invalid" type="email" name="email" placeholder="Email"><small class="form-text text-danger">Please enter a correct email address.</small></div>
            <div class="form-group"><input class="form-control" type="text" name="subject" placeholder="Subject"></div>
            <div class="form-group"><textarea class="form-control" name="message" placeholder="Message" rows="14"></textarea></div>
            <div class="form-group"><input type="hidden" name="MAX_FILE_SIZE" value="900000000"> 
            <input class="form-control" type="file" name="file[]" multiple='multiple' id='file' placeholder="Attach File"></div>
            <div class="form-group"><button class="btn btn-primary" type="submit" name="sendmail">send </button>
            <span style= "float:right" ><a class="btn btn-primary btn-sm" href="sent.php" role="button">View sent Mail</a></span></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
