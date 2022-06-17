<html>
<head>
<style>
.select-category
{
	margin:100px 500px;
}
select
{
	width:100%;
	height:50px;
}
tr{
	background:crimson;	
}
input[type=submit]
{
	border:none;
	padding:20px;
	width:400px;
}
label
{
	font-size:20px;
}
body{
	background:cyan;
}
</style>
</head>
<body>
<?php include 'userpage.php';?>



<div class="select-category">

<form action="displayfood.php" method="post">
<table cellpadding="20px" border="2px" width="600px">
<tr>
<td>
<label>
Select Category</label>
</td>
<td>
<select name="category[]">
<option>--select--</option>
<?php
include 'conn.php';
try
{
	$sel=$con->prepare("select *from category");
	$sel->execute();
	$row=$sel->rowCount();
	if($row>0)
	{
		while($fetch=$sel->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<option value="<?php echo $fetch['category_name'];?>"><?php echo $fetch['category_name'];?></option>
			<?php
		}
	}
	
}
catch(PDOException $e)
{
	die('Error:'.$e->getMessage());
}


?>
</select>
</td>
</tr>
<td colspan="2">
<center><input type="submit" name="submit" value="Display"/></center>
</td>
</tr>
</form>
</div>
</body>
</html>