<?php
$total=0;
?>
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
</style>
</head>
<body>
<?php 
include 'userpage.php';
?>
<div class="display-content">
<table border="2px" cellpadding="10px" width="700px">
<tr>
<th>Food Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Total</th>
<th>Action</th>
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
			if($fetch['status']==0)
			{
				$total=$total+$fetch['total'];
			?>
			<tr>
			<td><?php echo $fetch['food'];?></td>
			<td><?php echo $fetch['qty'];?></td>
			<td><?php echo $fetch['price'];?></td>
			<td><?php echo $fetch['total'];?></td>
			<td><form action="#" method="post">
			<input type="hidden" name="id" value="<?php echo $fetch['id'];?>"/>
			<input type="submit" name="delete" value="Delete"/>
			</form>
			</td>
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
<tr>
<td colspan="3"><p align="right">Total</p></td>
<td colspan="2"><?php echo $total;?></td>
</tr>

</table>
<br/>
<br/>
<a href="fooditems.php" style="background:blue;color:white;text-decoration:none;padding:20px;">Continue Shopping</a>
<br/>
<br/>
<br/>

<form action="buynow.php" method="post">
<input type="submit" name="submit" style="background:blue;color:white;text-decoration:none;padding:20px;border:none;" value="Buy Now"/>
</form>
<?php echo "Today is " . date("d/m/Y") . "<br>";?>
</div>
</body>
</html>
<?php
if(isset($_POST['delete']))
{
	include 'conn.php';
	$id=$_POST['id'];
	try
	{
		$del=$con->prepare("delete from user_cart where id=:id");
		$del->bindParam(':id',$id);
		if($del->execute())
		{
			echo "<script>";
			echo "alert('Deleted from cart');";
			echo 'window.location.href = "cartdisplay.php";';
			echo "</script>";
		}
		else
		{
			echo "<script>";
			echo "alert('Not deleted from cart');";
			echo 'window.location.href = "cartdisplay.php";';
			echo "</script>";
		}
	}
	catch(PDOException $e)
	{
		die('Error:'.$e->getMessage());
	}
}