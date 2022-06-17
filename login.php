<html>
<head>
<title>Example</title>
<link rel="stylesheet" href="css/design.css"/>
<link rel="stylesheet" href="css/log.css"/>
<style>
body{
	
	background:cyan;	
}
</style>
</head>
<body>
<div class="menu">
<ul>
<li><a href="home.php">Home</a></li>
<li><a href="about.php">About</a></li>
<li><a href="">Login</a></li>
<li style="float:right;padding:8px;font-size:40px;font-family:Arial;font-weight:bold;color:crimson;text-shadow:2px 3px 1px maroon;">Online Food Ordering</li>
</ul>
</div>

<div class="login">
<div class="lghead">
Login Form

</div>
<div id="lgform">
<form action="logpage.php" method="post">
<div style="padding:20px;">
<input type="text" name="username" placeholder="Enter Username"/>
</div>
<div style="padding:20px;">
<input type="password" name="password" placeholder="password"/>
</div>
<div style="padding:20px">
<input type="submit" name="submit" value="Login"/>
</div>
<a href="registerpage.php" class="createacc">Don't have account?Create Account</a>
</form>
</div>
</div>
</body>
</html>