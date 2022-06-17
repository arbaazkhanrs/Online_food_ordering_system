<html>
<body>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
include 'userpage.php';
include 'conn.php';
session_start();
$emailid=$_SESSION['email_id'];
try
{
	$status=1;
	$up=$con->prepare("update user_cart set status=:status where emailid=:emailid");
	$up->bindParam(':status',$status);
	$up->bindParam(':emailid',$emailid);
	if($up->execute())
	{
		?>
		<p>Oreder placed succesfully</p>
		<?php
		
	}
}
catch(PDOException $e)
{
	die('Error:'.$e->getMessage());	
}


// Instantiation and passing `true` enables exceptions


try {
    //Server settings
    $mail = new PHPMailer(true);

$mail->isSMTP();// Set mailer to use SMTP
$mail->CharSet = "utf-8";// set charset to utf8
$mail->SMTPAuth = true;// Enable SMTP authentication
$mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted

$mail->Host = 'smtp.gmail.com';// Specify main and backup SMTP servers
$mail->Port = 587;// TCP port to connect to
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->isHTML(true);// Set email format to HTML

$mail->Username = 'lcctechhubli@gmail.com';// SMTP username
$mail->Password = '9742874113';// SMTP password

$mail->setFrom('lcctechhubli@gmail.com', 'Food Ordering Mail');//Your application NAME and EMAIL
$mail->Subject = 'Test';//Message subject
$mail->MsgHTML('Order Placed');// Message body
$mail->addAddress($emailid, 'User Name');// Target email




    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
		?>
		</body>
		</html>
		
		
		