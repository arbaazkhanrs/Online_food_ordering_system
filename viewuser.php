<html>
<head>
<style>
.display-content
{
	margin:100px 500px;
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
}
body{
	background:cyan;
}
.details-view
{
	margin-left:600px;
	border:2px solid black;
	width:400px;height:auto;
}
span
{
	font-size:20px;	
}
</style>
</head>
<body>
<?php 
include 'adminpage.php';
?>
<div class="display-content">
<table border="2px" cellpadding="10px" width="700px">
<tr>
<th>Email ID</td>
<th>Food Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Total</th>
<th>View Details</th>
</tr>
<?php
include 'conn.php';

try
{
	$sel=$con->prepare("select *from user_cart");
	
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
			<td><?php echo $fetch['emailid'];?></td>
			<td><?php echo $fetch['food'];?></td>
			<td><?php echo $fetch['qty'];?></td>
			<td><?php echo $fetch['price'];?></td>
			<td><?php echo $fetch['total'];?></td>
			<td><form action="" method="post">
			<input type="hidden" name="emailid" value="<?php echo $fetch['emailid'];?>"/>
			<input type="submit" name="submit" value="View Details"/>
			
			</form></td>
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
<?php
if(isset($_POST["submit"]))
{
	include 'conn.php';
	try{
		$email=$_POST['emailid'];
		$sel=$con->prepare("select *from user_reg where emailid=:emailid");
		$sel->bindParam(':emailid',$email);
		$sel->execute();
		$row=$sel->rowCount();
		if($row>0)
		{
			$fetch=$sel->fetch(PDO::FETCH_ASSOC);
			?>
			<div class="details-view"><p><span><b>Address:</b></span><span><?php echo $fetch['address'];?></span></p>
			<p><span><b>Phone No:</b></span><span><?php echo $fetch['phoneno'];?></span></p></div>
			
			<?php
		}
		
	}
	catch(PDOException $e)
	{
		die('Error:'.$e->getMessage());
	}
}