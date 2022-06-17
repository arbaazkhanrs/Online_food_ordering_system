<?php
include 'conn.php';
$name=$_POST['name'];
$address=$_POST['address'];
$phoneno=$_POST['phoneno'];
$emailid=$_POST['emailid'];
$password=$_POST['password'];
try
{
	$insert=$con->prepare("insert into user_reg set name=:name,address=:address,phoneno=:phoneno,emailid=:emailid,password=:password");
	$insert->bindParam(":name",$name);
	$insert->bindParam(":address",$address);
	$insert->bindParam(":phoneno",$phoneno);
	$insert->bindParam(":emailid",$emailid);
	$insert->bindParam(":password",$password);
	if($insert->execute())
	{
		echo "<script>alert('Record Saved');window.location.href='registerpage.php';</script>";
	}
	else
	{
		echo "<script>alert('Record Not Saved');window.location.href='registerpage.php';</script>";
	}
}
catch(PDOException $e)
{
	die('Error:'.$e->getMessage());
}
?>