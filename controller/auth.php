<?php

        //PHP MAILER ...
//Include required PHPMailer files
require 'config/phpMailer/PHPMailer.php';
require 'config/phpMailer/SMTP.php';
require 'config/phpMailer/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$errors = array();
$fullname = "";
$username = "";
$email = "";
$phone = "";
$password = "";
$cpassword = "";

if(isset($_POST['btn_signup'])){
    //variables declarations
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $verified = false;
    // $token = bin2hex(random_bytes('50'));
    // $token = strtoupper(uniqid('PRX-'));

    //validations

    if(empty($fullname)){
        $errors['fullname'] = 'Full Name Required';
    } 

    if(empty($username)){
        $errors['username'] = 'Username Required';
    } 

    if(empty($email)){
        $errors['email'] = 'Email Address Required';
    }  
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Invalid Email Address';
    } 
    
    if(empty($phone)){
        $errors['phone'] = 'Phone Number Required';
    }  
    
    if(empty($password)){
        $errors['password'] = 'Password Required';
    } 
    
    if(empty($cpassword)){
        $errors['cpassword'] = 'Confirm Password Required';
    } 
    
    if($password!=$cpassword){
        $errors['mismatch'] = 'The two passwords mismatched';
    }

    $sql = "SELECT * FROM users WHERE username=? OR phone=? OR email=?";// SQL statements
    $stmt = $conn->prepare($sql); //prepared Statement
    $stmt->bind_param('sis',$username, $phone, $email); //Binding Parameters

    $stmt->execute();//Execution 
    $result = $stmt->get_result(); //Fetching Results as Object
    $rowCount = $result->num_rows; //Counting number of Rows

    if($rowCount>0){
        $errors['exist'] = 'This User Already Exist';
    }

    //if there is no any error register the user into the database
    if(count($errors)===0){
        $token = substr(time()*rand(),1,6);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (`full_name`, `username`, `email`, `phone`, `pass`, `verified`, `token`) VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssbs', $fullname, $username, $email, $phone, $password, $verified, $token);
        if($stmt->execute()){
            // $to = $email;
            $subject = "E-mail Verification";
            $message = "Welcome ".$fullname.", your verification code is <b>".$token."</b>\r\n or click verify link to verify your email <br> <a href='http://localhost/login-system/controller/verify.php?token=$token'>Verify Email</a>";
            $headers = "From: admin@esystems.ng" . "\r\n" .
            "CC: admin@esysteme.ng";

                 
            //Create instance of PHPMailer
            $mail = new PHPMailer();
            //Set mailer to use smtp
            $mail->isSMTP();
            //Define smtp host
            $mail->Host = "smtp.gmail.com";
            //Enable smtp authentication
            $mail->SMTPAuth = true;
            //Set smtp encryption type (ssl/tls)
            $mail->SMTPSecure = "ssl";
            //Port to connect smtp
            $mail->Port = "465";
            //Set gmail username
            $mail->Username = "ibrobk@gmail.com";
            //Set gmail password
            $mail->Password = "";
            //Email subject
            $mail->Subject = $subject;
            //Set sender email
            $mail->setFrom('ibrobk@gmail.com', "Email Verification");
            //Enable HTML
            $mail->isHTML(true);
            //Attachment
            // $mail->addAttachment('img/attachment.png');
            //Email body
            $mail->Body = $message;
            //Add recipient
            $mail->addAddress($email);
            //Finally send email
            if ( $mail->send() ) {
            // $_SESSION['sent'] = $subject2;
            
            echo "
                <script>
                    swal('Done','Registration Successful, please check your email to verify.', 'success')
                    .then(function(result){
                        if (true) {
                            window.location = 'controller/verify_email.php';
                        }
                    })
                  
                 
                </script>
            ";
            }else{
              echo  "<script>
                    swal('Error','OTP could not be sent to email.', 'error')
                    .then(function(result){
                        if (true) {
                            window.location = '../signup.php';
                        }
                    })
                  
                 
                </script>";
            // echo "OTP could not be sent. Mailer Error: ".$mail->ErrorInfo;
            }
            //Closing smtp connection
            $mail->smtpClose();  


        }

            // header("Location: login.php");
        }
        
    }


?>