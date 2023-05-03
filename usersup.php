<?php
require "connection.php";

if(isset($_POST['supprim'])){
    
    
    //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'C:\xampp\htdocs\admin\theme\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\admin\theme\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\admin\theme\PHPMailer-master\src\SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mouhamedamine.bensalem@esprit.tn';                     //SMTP username
    $mail->Password   = 'loqppaawzbsjszul';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('mouhamedamine.bensalem@esprit.tn', 'Mailer');
    $mail->addAddress("$_POST['supprimemail']", 'Joe User');     //Add a recipient
 


    //Content
    $mail->isSMTP(true);                                  //Set email format to HTML
    $mail->Subject = 'Account Banned Streamtopia';
    $mail->Body    = 'This is email is to inform you that your account has been banned by an admin on Stream';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {

    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    

try{

    $query= $pdo->prepare('DELETE FROM accounts where User_id =:id');
    $query->bindParam(':id',$_POST['supprim']);
    $query->execute();
header('location: user.php');
}catch(PDOException $e){
    $e->getMessage();

}}
else{
echo " ddnt work ";}





   
   



            
  
?>