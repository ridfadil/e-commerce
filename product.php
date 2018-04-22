
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
	include 'slide.html';
	include 'database.php';
	?>
	<!-- End Navbar -->
	<br><br>
	<div class = "row">
		<div class="col-md-12">
			<form class="example" action="product.php" method="GET"style ="float:right">
				<input type="text" placeholder="Masukan Kategori" name="formcari">
				<button type="submit" >Cari</i></button>
			</form>
		</div>
	</div>
	<br><br>
	<div class ="row">
		<div class = "container">
			<?php 
			error_reporting(0);
			if ($_GET['formcari']){
				$cariproduk= $_GET['formcari'];
				$result = mysqli_query($mysqli, "SELECT * FROM produk where kategori_produk='$cariproduk' ");
			}else{
				$result = mysqli_query($mysqli, "SELECT * FROM produk ORDER BY id DESC");
			}
			while($res = mysqli_fetch_array($result)) { ?>
			<div class = "col-md-3" style="box-shadow: 1px 1px 1px 1px;" >
				<div class="card" style="width:200px; padding:5px;" align="center">
					<img class="card-img-top" src="img/buku.jpg" alt="Card image" style="width :200px; height:200px;">
					<div class="card-body">
						<h4 class="card-title"><?php echo $res['nama_produk']?></h4>
						<p class="card-text"><?php echo $res['judul_produk']?></p>
						<p class="card-text"><?php echo $res['harga_produk']?></p>
						<p class="card-text"><?php echo $res['kategori_produk']?></p>
						<a href="tambah_keranjang.php" class="btn btn-primary">+ Keranjang</a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</body>
</html> 