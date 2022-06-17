<html>
<head>
<title>Example</title>
<style>
body{
	background:cyan;
}
.content
{
	float:left;
	padding:15px;
	border:2px solid black;
	margin:10px;
	width:auto;
	height:auto;
}
label
{
	font-weight:bold;
	font-size:30px;
}
span{
	font-size:20px;
}
input[type=submit]
{
	padding:20px;
	border:none;
	width:200px;
	
}
</style>
</head>
<body>
<?php foreach($_POST['category'] as $cat)
{
} include 'userpage.php';?>

<?php
include 'conn.php';
foreach($_POST['category'] as $cat)
{
}
try
{
	$sel=$con->prepare("select *from fooddetails where course=:course");
	$sel->bindParam(':course',$cat);
	$sel->execute();
	$row=$sel->rowCount();
	if($row>0)
	{
		while($fetch=$sel->fetch(PDO::FETCH_ASSOC))
		{

			?>
			<div class="content">
			<center><img src="upload/<?php echo $fetch['image'];?>" width="100px" height="100px"/></center>
			<p><label>Food Name:</label><span><?php echo $fetch['name'];?></span></p>
			<p><label>Food Price:</label><span><?php echo $fetch['price'];?></span></p>
			<form action="#" method="post"> 
			<input type="hidden" name="id" value="<?php echo $fetch['id'];?>"/>
			<input type="text" name="qty" required/>
			<input type="submit" name="add" value="Add To Cart"/>
			</form>
			</div>
			<?php
		}
	}
}
catch(PDOException $e)
{
	die('Error:'.$e->getMessage());
}



?>

</body>
</html>
<?php
if(isset($_POST['add']))
{
	include 'conn.php';
	$id=$_POST['id'];
	$qty=$_POST['qty'];
	$sel=$con->prepare("select *from fooddetails where id=:id");
	$sel->bindParam(':id',$id);
	$sel->execute();
	$row=$sel->rowCount();
	if($row>0)
	{
		$fetch=$sel->fetch(PDO::FETCH_ASSOC);
		$food=$fetch['name'];
		$price=$fetch['price'];
		$total=$price*$qty;
		session_start();
		$emailid=$_SESSION['email_id'];
		echo "Emaili id:".$emailid;
		$today=date("Y/m/d");
		$ins=$con->prepare("insert into user_cart set emailid=:emailid,food=:food,qty=:qty,price=:price,total=:total,today=:today");
		$ins->bindParam(':emailid',$emailid);
		$ins->bindParam(':food',$food);
		$ins->bindParam(':qty',$qty);
		$ins->bindParam(':price',$price);
		$ins->bindParam(':total',$total);
		$ins->bindParam(':today',$today);
		if($ins->execute())
		{
			echo "<script>";
			echo "alert('Added to cart');";
			echo 'window.location.href = "fooditems.php";';
			echo "</script>";
		}
		else
		{
			echo "<script>alert('Not added to cart');</script>";
		}
	}
	
	
	
}