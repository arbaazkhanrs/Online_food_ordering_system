<?php
include 'conn.php';
$emailid=$_POST['username'];
$password=$_POST['password'];
if(($emailid=="admin@gmail.com")&&($password=="admin"))
{
	header('Location:adminpage.php');
}
else
{
try
{
	$select=$con->prepare("select *from user_reg where emailid=:emailid and password=:password");
	$select->bindParam(':emailid',$emailid);
	$select->bindParam(':password',$password);
	$select->execute();
	$row=$select->rowCount();
	if($row>0)
	{
		$fetch=$select->fetch(PDO::FETCH_ASSOC);
		session_start();
		$_SESSION['email_id']=$emailid;
		header('Location:userpage.php');
	}
	else
	{
		echo $emailid;
		echo $password;
		echo "Invalid Credentials";
	}
}
catch(PDOException $e)
{
	die('Error:'.$e->getMessage());
}
}
?>