<html>
<head>
<title>Example</title>
<style>
.add-form
{
	margin-top:150px;
	margin-left:430px;
	border:2px solid black;
	width:700px;
}
input[type=submit]
{
	padding:20px;
	border:none;
}
label
{
	font-size:25px;
}
input[type=text]
{
	width:250px;
	padding:10px;
}
a:link{
	
	color:blue;
	font-size:25px;
	text-decoration:none;
	
}
body{
	background:cyan;
}
</style>
</head>
<body>

<?php include 'amninindex.php';?>
<div class="add-form">
<form action="" method="post">
<table>
<tr> 
<td style="padding:20px;"><label>Enter Category</label></td><td style="padding:20px;"><input type="text" name="category" required/></td>
<td style="padding:20px;"><input type="submit" name="submit" value="ADD CATEGORY"/></td>
</tr>
<tr>
<td colspan="3" style="padding:20px;"><a href="viewall.php">View all categories</a></td>
</tr>
</table>
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	include 'conn.php';
	try
	{
		$category=$_POST['category'];
		$sel=$con->prepare("select *from category where category_name=:category_name");
		$sel->bindParam(':category_name',$category);
		$sel->execute();
		$row=$sel->rowCount();
		if($row>0)
		{
			echo "<script>alert('Record Already Exists');window.location.href='addcategory.php';</script>";
		}
		else
		{
			$ins=$con->prepare("insert into category set category_name=:category_name");
			$ins->bindParam(':category_name',$category);
			if($ins->execute())
			{
				echo "<script>alert('Record Saved');window.location.href='addcategory.php';</script>";
			}
			else
			{
				echo "<script>alert('Record Not Saved');window.location.href='addcategory.php';</script>";
			}
		}
	}
	catch(PDOException $e)
	{
		die('Error:'.$e->getMessage());
	}
}
?>