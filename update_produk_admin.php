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
	<?php
	session_start();
	include 'database.php';
	include 'cek_session.php';
	$id = $_GET['id'];
	$result = mysqli_query($mysqli, "SELECT * FROM produk WHERE id='$id'");

	while($res = mysqli_fetch_array($result))
	{
		$nama_produk = $res['nama_produk'];
		$judul_produk = $res['judul_produk'];
		$harga_produk = $res['harga_produk'];
		$kategori_produk = $res['kategori_produk'];
	}
	if(isset($_POST['btnupdate'])) {
		$id = $_POST['id'];
		$nama = $_POST['nama_produk'];
		$judul = $_POST['judul_produk'];
		$harga = $_POST['harga_produk'];
		$kategori = $_POST['kategori_produk'];
		$result = mysqli_query($mysqli, "UPDATE produk SET nama_produk='$nama',judul_produk='$judul',harga_produk='$harga',kategori_produk='$kategori' WHERE id='$id'");
		header("Location: lihat_produk_admin.php");
	} 
	?>
	<div class ="row">
		<div class ="col-md-4">
			<?php
			include 'sidebar.html';
			?>
		</div>
		<div class ="col-md-8">
			<div class ="container">
				<div id="wrapp" style ="width : 400px" >
					<h1 align ="center">Update Produk</h1>
					<form action="update_produk_admin.php" method="POST">
						<div class="form-group">
							<label for="nama">Nama Produk :</label>
							<input type="nama" class="form-control" id="nama" name="nama_produk" value="<?php echo $nama_produk;?>">
						</div>
						<div class="form-group">
							<label for="judul">Judul Produk :</label>
							<input type="text" class="form-control" id="judul" name="judul_produk" value="<?php echo $judul_produk;?>">
						</div>
						<div class="form-group">
							<label for="harga">Harga Produk</label>
							<input type="text" class="form-control" id="harga" name="harga_produk" value="<?php echo $harga_produk;?>">
						</div>
						<div class="form-group">
							<label for="sel1">Pilih Kategori</label>
							<select class="form-control" id="sel1" name="kategori_produk" value="<?php echo $kategori_produk;?>">
								<option value="fiksi">fiksi</option>
								<option value="nonfiksi">nonfiksi</option>
							</select>
						</div>
						<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
						<button type="submit" class="btn btn-default" name="btnupdate">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>