<!DOCTYPE html>
<html>

<head>
	<title>Aplikasi SPBU</title>
	<link rel="stylesheet" type="text/css" href="assets/css/material-dashboard.css">
	<link rel="stylesheet" type="text/css" href="assets/css/stylelogin.css">
</head>

<body>
	    
		<?php
		if (isset($_GET['error'])) : ?>
			<div class="alert alert-warning alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			  <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
			</div>
		<?php endif;?>
		
	<div class="kotak_login">
		<center>
			<IMG SRC="assets/img/logo.png" height="50px">
		</center>
		<br />
		<p class="tulisan_login"><b>Silakan login</b></p>

		<form action="check-login.php" class="inner-login" method="post">
			<input type="text" name="username" class="form_login" placeholder="Username">

			<input type="password" name="password" class="form_login" placeholder="Password">

			<input type="submit" class="tombol_login" value="LOGIN">

			<br />
			<br />
		</form>

	</div>


</body>

</html>