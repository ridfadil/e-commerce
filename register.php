
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Belajar Web</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<!-- 	untukk Navbar -->
	<?php
	include 'navbar.php';
	include 'database.php';
	?>
	<!-- End Navbar -->

	<div class ="container">
		<div id="wrapp" style ="width : 400px" >
			<h1 align ="center">Silakan Register</h1>
			<form action="register.php" method="POST">
				<div class="form-group">
					<label for="nama">Nama :</label>
					<input type="nama" class="form-control" id="nama" name="nama">
				</div>
				<div class="form-group">
					<label for="email">Email :</label>
					<input type="text" class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="pwd" name="password">
				</div>
				<div class="checkbox">
					<label><input type="checkbox"> Remember me</label>
				</div>
				<button type="submit" class="btn btn-default" name="btnregister">Submit</button>
			</form>
		</div>
	</div>

	<?php

if(isset($_POST['btnregister'])) {
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$level = "user";
		$result = mysqli_query($mysqli, "INSERT INTO user(nama,email,password,level) VALUES('$nama','$email','$password','$level')");

		echo "Berhasil Daftar";
	}
	?>
	</body>
	</html> 