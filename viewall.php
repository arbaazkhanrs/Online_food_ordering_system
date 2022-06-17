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
<th>Category ID</td>
<th>Category Name</th>

</tr>
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
			<tr>
			<td><?php echo $fetch['id'];?></td>
			<td><?php echo $fetch['category_name'];?></td>
			
			</tr>
			
			
			<?php
			
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
