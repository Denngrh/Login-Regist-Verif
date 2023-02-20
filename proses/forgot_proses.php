<?php
include "../config.php";
    if(isset($_POST['reset'])) {
        $email = $_POST['mail'];
    }
    else {
        exit();
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/OAuth.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/POP3.php';
    require '../PHPMailer/src/SMTP.php';
    
    
    $mail = new PHPMailer;

    
    try {
        //Server settings
        $mail->isSMTP();       
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                                     
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'emailmu@gmail.com';                     
        $mail->Password   = 'password-aplikasi';                               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
        $mail->Port       = 587;                                    
    
        //Recipients
        $mail->setFrom('emailmu@gmail.com', 'Admin');
        $mail->addAddress($email);     

        $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,10);
    
        
        $mail->isHTML(true);                                  
        $mail->Subject = 'Password Reset';
        $mail->Body    = 'Klik <a href=" http://localhost/verifemail/ganti_password.php?code='.$code.'">Disini</a>. </br>Untuk Reset Password Anda.';

        if($con->connect_error) {
            die('Could not connect to the database.');
        }

        $verifyQuery = $con->query("SELECT * FROM users WHERE email = '$email'");

        if($verifyQuery->num_rows) {
            $codeQuery = $con->query("UPDATE users SET reset_code = '$code' WHERE email = '$email'");
                
            $mail->send();
            header("Location: ../login.php?info=Code Reset Telah Terkirim Mohon Cek Email Anda");
            exit();
            }
        $con->close();
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
