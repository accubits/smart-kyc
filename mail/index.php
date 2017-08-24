<?php
header('Content-Type: application/json');
require_once 'vendor/autoload.php';
// creates object
$mail = new PHPMailer(true);

if(!isset($_POST['email'],$_POST['subject'],$_POST['link']))
{
    $response['success']= false;
    $response['message']= "Try again with appropriate parameters";
    echo json_encode($response);
    die();
}

try {
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $link=$_POST['link'];
    $message=  "Hello , <br /><br /> Change your password by  by clicking this <a href= $link >Link</a> .";


    $mail->IsSMTP();
    $mail->isHTML(true);
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->AddAddress($email);
    $mail->Username = 'shehinfano@gmail.com';
    $mail->Password = '7upbanana7upswe5207up';
    $mail->SetFrom('shehinfano@gmail.com', 'Icosys');
    $mail->AddReplyTo("shehin@accubits.com", "Icosys");
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = $message;


    if ($mail->Send()) {


        $response['success']= true;
        $response['message']= "Your mail was send successfully";
        echo json_encode($response);

    }
    else
    {
        $response['success']= false;
        $response['message']= "Mail sending failed";
        echo json_encode($response);
    }
} catch (phpmailerException $ex) {
    $msg = "<div class='alert alert-warning'>" . $ex->errorMessage() . "</div>";
}


?>

