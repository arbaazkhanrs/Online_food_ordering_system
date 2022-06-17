<html>
<head>
<title>Example</title>
<link rel="stylesheet" href="css/design.css"/>
<link rel="stylesheet" href="css/register.css"/>
<style>
input[type="email"]
{
	width:100%;
	background:transparent;
	border:none;
	border-bottom:2px solid black;
	outline:none;
}
</style>
<script>
function validation()
{
	var phoneno=document.reg.phoneno.value;
	if(isNaN(phoneno))
	{
		alert("Enter numbers only");
		return false;
	}
	else
	{
		return true;
	}
}

</script>
</head>
<body>
<div class="menu">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="">About</a></li>
<li><a href="">Login</a></li>
<li style="float:right;padding:8px;font-size:40px;font-family:Arial;font-weight:bold;color:crimson;text-shadow:2px 3px 1px maroon;">Online Food Ordering</li>
</ul>
</div>

<div class="register">
<div class="lghead">
Registration Form

</div>
<div id="lgform">
<form action="register.php" name="reg" method="post">
<div style="padding:20px;">
<input type="text" name="name" required placeholder="Enter Name"/>
</div>
<div style="padding:20px;">
<textarea rows="5"name="address" required placeholder="Enter Address"></textarea>
</div>
<div style="padding:20px;">
<input type="text" name="phoneno" required placeholder="Enter Phoneno" maxlength="10"/>
</div>
<div style="padding:20px;">
<input type="email" name="emailid" required placeholder="Enter Emailid"/>
</div>
<div style="padding:20px;">
<input type="password" name="password" placeholder="password"/>
</div>
<div style="padding:20px">
<input type="submit" name="submit" value="Register" onclick="return validation()"/>
</div>
<a href="login.php" class="createacc">Already have a account?Login</a>
</form>
</div>
</div>
</body>
</html>
