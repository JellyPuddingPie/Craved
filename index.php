<!DOCTYPE html>
<?php
include ('login/authorize.php');
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Craved - Log in</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="top">
			<img src="images/craved-icon.png" class="logo animated fadeIn">
			<h1 id="title" class="hidden"><span id="logo">Explore new flavours.</span></h1>

		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<form action="" method="post">
			<label for="username">Username</label>
			<br/>
			<input type="text" name="user" id="username">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" name="pass" id="password">
			<br/>
			<button type="submit" name="login">Log in</button>
			<br/>
			</form>
			<a href="#"><p class="small">Forgot your password?</p></a>
			<a href="register.php"><p class="small">No account? Please register</p></a>
		</div>
	</div>
</body>


<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});

</script>

</html>