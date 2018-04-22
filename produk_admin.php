<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/sidebar.css" rel="stylesheet">
</head>
<body>
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
			<div class ="container">
				<div id="wrapp" style ="width : 400px" >
					<h1 align ="center">Tambah Produk</h1>
					<form action="produk_admin.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="nama">Nama Produk :</label>
							<input type="nama" class="form-control" id="nama" name="nama_produk">
						</div>
						<div class="form-group">
							<label for="judul">Judul Produk :</label>
							<input type="text" class="form-control" id="judul" name="judul_produk">
						</div>
						<div class="form-group">
							<label for="harga">Harga Produk</label>
							<input type="text" class="form-control" id="harga" name="harga_produk">
						</div>
						<div class="form-group">
							<label for="sel1">Pilih Kategori</label>
							<select class="form-control" id="sel1" name="kategori_produk">
								<option>pilih kategori</option>
								<option value="fiksi">fiksi</option>
								<option value="nonfiksi">nonfiksi</option>
							</select>
						</div>
						<div>
							<input type="file" id="foto" name="foto" style="margin-bottom:20px;" >
						</div>
						<button type="submit" class="btn btn-default" name="btntambahproduk">Tambah</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<?php
	if(isset($_POST['btntambahproduk'])) {
		$nama = $_POST['nama_produk'];
		$judul = $_POST['judul_produk'];
		$harga = $_POST['harga_produk'];
		$kategori = $_POST['kategori_produk'];
		$foto = $_FILES['foto']['name'];
		$tmp = $_FILES['foto']['tmp_name'];
		$fotobaru = date('dmYHis').$foto;
		$path = "upload/".$fotobaru;
		if(move_uploaded_file($tmp, $path)){ 
			$result = mysqli_query($mysqli, "INSERT INTO produk(nama_produk,judul_produk,harga_produk,kategori_produk,foto) VALUES('$nama','$judul','$harga','$kategori','$foto')");
		}
	}
	?>

</body>
</html>