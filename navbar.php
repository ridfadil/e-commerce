<html>
<head>
	<title></title>
</head>
<body>
	<?php session_start(); ?>
	<div class="container-fluid">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Jual Beli Barang</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="product.php">Product</a></li>
					<li><a href="keranjang.php">keranjang</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php
					if (isset($_SESSION["email"])){
						echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
					}else{
						echo '<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>';
						echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
					}
					?> 
				</ul>
			</div>
		</nav>

	</body>
	</html>