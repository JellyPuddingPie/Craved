<!DOCTYPE html>
<?php
include('login/authorize.php');
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Craved - Explore new flavours.</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="assets/css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="top">
			<div class="topleft">
				<img src="images/craved-icon.png" class="logo animated fadeIn">
				<h1 id="title" class="hidden"><span id="logo">Explore new flavours.</span></h1>
			</div>
		</div>
		<div class="login-box animated fadeIn">
			<div class="box-header">
				<h2>Register</h2>
			</div>
			<form action="" method="post">


				<label for="username">Username</label>
				<br/>
				<input type="text" id="username" name="user" required="required" style="color:black;" /><br/>
				<label for="email">E-mail adress</label>
				<br/>
				<input type="text" id="email" name="email" required="required" style="color:black;" /><br/>
				<label for="password">Password</label>
				<br/>
				<input type="password" id="password" name="pass" required="required" style="color:black;" ><br/>
				<label for="password2">Confirm password</label>
				<br/>
				<input type="password" id="password2" name="pass2" required="required" style="color:black;" ><br/>
				<label for="voornaam">First name</label>
				<br/>
				<input type="text" id="voornaam" name="voornaam" required="required" style="color:black;" ><br/>
				<label for="achternaam">Last name</label>
				<br/>
				<input type="text" id="achternaam" name="achternaam" required="required" style="color:black;" ><br/>
				<label for="telefoon">Telefoonnr</label>
				<br/>
				<input type="text" id="telefoon" name="telefoon"  style="color:black;" ><br/>
				<label for="geslacht">Geslacht</label>
				<br/>
				<input type="radio" id="geslacht" name="geslacht" <?php if (isset($gender) && $gender=="M") echo "checked";?>  value="M">Man
				<input type="radio" id="geslacht" name="geslacht" <?php if (isset($gender) && $gender=="V") echo "checked";?>  value="V">Vrouw<br/>
				<input name="accept" type="checkbox" value="1" />By clicking accept you agree to the Craved license agreement.<br/>
				<span style="color:red;"><strong><?php echo $error; ?></strong></span><br/>
				<input type="submit" name="signup" class="loginbutton" value="Make account"/>
			</form>
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