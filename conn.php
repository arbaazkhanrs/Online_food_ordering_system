<?php
$host="localhost";
$db_name="foodorderinng";
$user="root";
$pass="";
try
{
	$con=new PDO("mysql:host={$host};dbname={$db_name}",$user,$pass);
}
catch(PDOException $e)
{
	echo "Error:".$e->getMessage();
}
?>