<html>
<head>
<style>
.display-content
{
	margin:100px 400px;
}
input[name="delete"]
{
	border:none;
	padding:20px;
}
table{
	border-collapse:collapse;
}
tr{
	background:cyan;
	font-size:20px;
	text-align:center;
}
body{
	background:cyan;
}
</style>
</head>
<body>
<?php 
include 'userpage.php';
?>
<div class="display-content">
<table border="2px" cellpadding="10px" width="900px" height="300px">
<tr>
<th>ID</th>
<th>Food Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Total</th>
<th>Date</th>

</tr>
<?php
include 'conn.php';
session_start();
$emailid=$_SESSION['email_id'];
try
{
	$sel=$con->prepare("select *from user_cart where emailid=:emailid");
	$sel->bindParam(':emailid',$emailid);
	$sel->execute();
	$row=$sel->rowCount();
	if($row>0)
	{
		while($fetch=$sel->fetch(PDO::FETCH_ASSOC))
		{
			if($fetch['status']>0)
			{
			?>
			<tr>
			<td><?php echo $fetch['id'];?></td>
			<td><?php echo $fetch['food'];?></td>
			<td><?php echo $fetch['qty'];?></td>
			<td><?php echo $fetch['price'];?></td>
			<td><?php echo $fetch['total'];?></td>
			<td><?php echo $fetch['today'];?></td>
			
			</tr>
			
			
			<?php
			}
		}
	}
}
catch(PDOException $e)
{
	die('Error:'.$e->getMessage());
}

?>
</table>

</div>
</body>
</html>