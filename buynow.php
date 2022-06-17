<html>
<head>
<style>
body{
	background:cyan;
}
</style>
</head>
<body>
<?php
include 'userpage.php';
?>
<div>
<form action="BuyOrder.php" method="post">
<table>
<tr>
<td>Select Payment Option</td>
<td><input type="radio" name="payment"/>Cash on Delivery</td>
<td><input type="radio" name="payment"/>Credit Card</td>
<td><input type="submit" name="buyorder" value="Buy Now"/></td>
</tr>
</table>
</form>

</div>


<?php
/*include 'userpage.php';
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
		 $to = $emailid;
         $subject = "Order Details";
         
         $message = "<b>Your order has been placed successfully</b>";
         $message .= "<h1>This is headline.</h1>";
         
         $header = "From:lcctechhubli@gmail.com \r\n";
         
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
	}
	else
	{
		
	}
}
catch(PDOException $e)
{
	die('Error:'.$e->getMessage());
}*/
?>