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
<form action="" method="post" enctype="multipart/form-data">
<table>
<tr> 
<td style="padding:20px;"><label>Select Category</label></td><td style="padding:20px;">
<select name="category[]">
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
<tr> 
<td style="padding:20px;"><label>Name</label></td>
<td style="padding:20px;"><input type="text" name="name" required/></td>
</tr>
<tr> 
<td style="padding:20px;"><label>Image</label></td>
<td style="padding:20px;"><input type="file" name="file1" accept="image/jpeg"/></td>
</tr>
<tr> 
<td style="padding:20px;"><label>Price</label></td>
<td style="padding:20px;"><input type="text" name="price" required/></td>
</tr>
<tr>
<td colspan="3" style="padding:20px;"><td style="padding:20px;"><input type="submit" name="submit" value="ADD CATEGORY"/></td></td>
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
	try{
	$images=$_FILES["file1"]["name"];
	$tmp_dir=$_FILES["file1"]["tmp_name"];
	$imageSize=$_FILES["file1"]["size"];
	$upload_dir='upload/';
	$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
	$valid_extensions=array('jpeg','jpg','png','gif');
	$picProfile=rand(1000,1000000).".".$imgExt;
	$name=$_POST['name'];
	$price=$_POST['price'];
	foreach($_POST['category'] as $c)
	{
	}
	move_uploaded_file($tmp_dir,$upload_dir.$picProfile);
	$ins=$con->prepare("insert into fooddetails set course=:course,name=:name,price=:price,image=:image");
	$ins->bindParam(':course',$c);
	$ins->bindParam(':name',$name);
	$ins->bindParam(':price',$price);
	$ins->bindParam(':image',$picProfile);
	if($ins->execute())
		echo "<script>alert('Data Saved');</script>";
	else
		echo "<script>alert('Data not Saved');</script>";
	}
	catch(PDOException $e)
	{
		die('Error:'.$e->getMessage());
	}
	
}
