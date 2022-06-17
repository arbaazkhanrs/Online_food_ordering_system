<html>
<head>
<title>Mail Test</title>
</head>
<body>
<form action="#" method="post">
<input type="submit" name="submit" value="Send Mail"/>

</form>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'lcctechhubli@gmail.com';          // SMTP username
$mail->Password = '9742874113'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('lcctechhubli@gmail.com', 'CodexWorld');
$mail->addReplyTo('lcctechhubli@gmail.com', 'CodexWorld');
$mail->addAddress('snehaumatar@gmail.com');   // Add a recipient


$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>How to Send Email using PHP in Localhost by CodexWorld</h1>';
$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script by <b>CodexWorld</b></p>';

$mail->Subject = 'Email from Localhost by CodexWorld';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}
?>