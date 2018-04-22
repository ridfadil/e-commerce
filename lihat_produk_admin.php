
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
	<section>
		<div class ="row">
			<div class ="col-md-4">
				<?php
				session_start();
				include 'database.php';
				include 'sidebar.html';
				include 'cek_session.php';
				?>
			</div>
			<div class ="col-md-8">
				<div class = "row">
					<div class="col-md-12">
						<form class="example" action="lihat_produk_admin.php" method="GET" style ="float:left;margin-top:20px;">
							<input type="text" placeholder="Masukan Kategori" name="search">
							<button type="submit">Cari</i></button>
						</form>
					</div>
				</div>
				<br><br>
				<div class ="row">
					<div class = "container-fluid">
						<?php 
						error_reporting(0);
						if ($_GET['search']){
							$cariproduk= $_GET['search'];
							$result = mysqli_query($mysqli, "SELECT * FROM produk where kategori_produk='$cariproduk' ");
						}else{
							$result = mysqli_query($mysqli, "SELECT * FROM produk ORDER BY id DESC");
						}
						while($res = mysqli_fetch_array($result)) { ?>
						<div class = "col-md-4">
							<div class="card" style="padding:7px;box-shadow: 1px 1px 1px 1px;margin-bottom:10px;" align="center">
								<?php echo "<img class='card-img-top' src='upload/".$res['foto']."' style=' width :200px; height:200px;'>";?>
								<div class="card-body">
									<h4 class="card-title"><?php echo $res['nama_produk']?></h4>
									<p class="card-text"><?php echo $res['judul_produk']?></p>
									<p class="card-text">Rp. <?php echo $res['harga_produk']?></p>
									<p class="card-text"><?php echo $res['kategori_produk']?></p>
									<div class="row">
										<?php echo"
										<div class ='col-md-6'>
										<a href=\"update_produk_admin.php?id=$res[id]\" class='btn btn-primary' >Update</a>
										</div>
										<div class ='col-md-6'>
										<a href=\"hapus_produk_admin.php?id=$res[id]\" class='btn btn-primary' >Hapus</a>
										</div>
										";?>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html> 


