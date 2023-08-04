<?php
	session_start();
	include('configdb.php');

    if (isset($_POST['submit'])) {

		$nama = $_POST['nama_produk'];
		$harga = $_POST['harga_produk'];
		$deskripsi = $_POST['deskripsi_produk'];
		$photo_tmp = $_FILES['photo_produk']['tmp_name'];
		$photo = $_FILES['photo_produk']['name'];
		$cat_id = $_POST['id_kategori'];

		$query = "INSERT INTO tbl_produk (nama_produk, photo_produk, harga_produk, deskripsi_produk, id_kategori) VALUES ('".$nama."', '".$photo."', '".$harga."', '".$deskripsi."', '".$cat_id."')";

		move_uploaded_file($photo_tmp, "image/".$photo);
		mysqli_query($mysqli, $query);

		?>
			<script type="text/javascript">
				window.location = 'produk.php';
			</script>
		<?php

	}
?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title><?php echo $_SESSION['judul']." - ".$_SESSION['by'];?></title>

    <!-- Bootstrap core CSS -->
    <!--link href="ui/css/bootstrap.css" rel="stylesheet"-->
	<link href="ui/css/cerulean.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--script src="./index_files/ie-emulation-modes-warning.js"></script-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $_SESSION['judul'];?></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="user.php">Data User</a></li>
              <li><a href="order.php">Data Order</a></li>
              <li><a href="produk.php">Data Produk</a></li>
              <li><a href="kategori.php">Data Kategori</a></li>
              <li><a href="kriteria.php">Data Kriteria</a></li>
              <li><a href="alternatif.php">Data Alternatif</a></li>
			  <li><a href="analisa.php">Analisa</a></li>
              <li><a href="perhitungan.php">Perhitungan</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
      <div class="container">
        <!-- Main component for a primary marketing message or call to action -->
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">Tambah Data Produk</div>
            <div class="panel-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="produk">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" autofocus="" required="">
                        </div>
                        <div class="form-group">
                            <label for="produk">Harga Produk</label>
                            <input type="text" class="form-control" name="harga_produk" autofocus="" required="">
                        </div>
                        <div class="form-group">
    <label for="produk">Kategori</label>
    <!-- Dropdown untuk memilih kategori -->
    <?php 
    include 'configdb.php';
    $queryCat = "SELECT * FROM tbl_kategori";
    $msqlCat = mysqli_query($mysqli, $queryCat);
    $msqlCat1 = mysqli_query($mysqli, $queryCat);
    $result = mysqli_fetch_assoc($msqlCat);

    ?>
    <select class="form-control" name="id_kategori" required="">
        <option value="" selected disabled>Pilih Kategori</option>
        <?php 
        while ($data = mysqli_fetch_assoc($msqlCat1)) {
            if ($data['id_kategori'] == $result['id_kategori']) { ?>
                <option selected="<?php echo $result['id_kategori']?>" value="<?php echo $data['id_kategori']?>">
                    <?php echo $data['nama_kategori']?>
                </option>
            <?php } else { ?>
                <option value="<?php echo $data['id_kategori']?>">
                    <?php echo $data['nama_kategori']?>
                </option>
            <?php } 
        }?>
    </select>
</div>
                        <div class="form-group">
                            <label for="produk">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi_produk" autofocus="" required="">
                        </div>
                        <div class="form-group">
                            <label for="produk">Foto Produk</label>
                            <input type="file" class="form-control" name="photo_produk" required="">
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="reset" class="btn btn-info">Reset</button>
                        <a href="produk.php" type="cancel" class="btn btn-warning">Batal</a>
                        <button type="submit"  name="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel-footer text-primary"><?php echo $_SESSION['by']; ?><div class="pull-right"></div></div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="ui/js/jquery-1.10.2.min.js"></script>
	<script src="ui/js/bootstrap.min.js"></script>
	<script src="ui/js/bootswatch.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ui/js/ie10-viewport-bug-workaround.js"></script>

</body></html>
