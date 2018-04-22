<html>
<head>
  <title>Data User</title>
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
      <div class="container-fluid">
        <h1>Data User</h1>
        <table class="table">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $level="user";
            $result = mysqli_query($mysqli, "SELECT * FROM user where level='$level' ORDER BY id DESC");
            while($res = mysqli_fetch_array($result)) { ?>
            <tr class="success">
              <td><?php echo $res['nama']?></td>
              <td><?php echo $res['email']?></td>
              <?php echo "<td><a href=\"hapus_data_user_admin.php?id=$res[id]\" "?> >hapus</td>
            </tr>
            <?php } ?>      
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>