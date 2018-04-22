<html>
<head>
	<title>form login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
	include 'navbar.php';
	include 'database.php';
	?>
	<!-- End Navbar -->

	<!-- Form Login -->
	<div id="container">
		<div id="wrapp" style ="width : 400px" >
			<form action="login.php" method="POST">
				<div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" class="form-control" id="email" name="email" >
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" id="pwd" name="password">
				</div>
				<div class="checkbox">
					<label><input type="checkbox"> Remember me</label>
				</div>
				<button type="submit" class="btn btn-default" name="btnlogin">Submit</button>
			</form>
		</div>
	</div>
	<!-- End Form Login -->
	<?php

	if(isset($_POST['btnlogin'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		// include database connection file

		// Insert user data into table
		$res = mysqli_query($mysqli, "SELECT * FROM user where email='$email' and password='$password'");
		if(isset($res)){
			while($data = mysqli_fetch_array($res)) {         
				$_SESSION["nama"] = $data['nama'];
				$_SESSION["email"] = $data['email'];
				$_SESSION["password"] = $data['password']; 
				$_SESSION["level"] = $data['level'];           
			}
			if($_SESSION["level"] == "admin" ){

				header("location:admin.php");
			}
			else{
				header("location:index.php");
			}
		}
		else{
			echo "tidak terinput";
		}
	}
	?>

</body>
</html>

