<?php
	session_start();
	include('configdb.php');
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

	<!-- Datatables -->
	<link rel="stylesheet" type="text/css" href="ui/css/datatables/dataTables.bootstrap.css">

	<script type="text/javascript" language="javascript" src="ui/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" language="javascript" src="ui/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="ui/js/dataTables.bootstrap.min.js"></script>

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
			  <li class="active"><a href="#">Data User</a></li>
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
		  <div class="panel-heading">Data User</div>
            <?php
				include 'configdb.php';
					if (isset($_GET['id_del'])) {
						$iddel = $_GET['id_del'];
                        $del = "DELETE FROM tbl_user WHERE id_user = '".$iddel."'";

						$msql = mysqli_query($mysqli, $del);

						}
					?>
		  <div class="panel-body table-responsive">
			<a class='btn btn-primary' href='report-user.php'> Cetak</a><br /><br /> 
			<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>No.</th>
                    <th>ID User</th>
					<th>Username</th>
                    <th>Email</th>
					<th>Password</th>
                    <th>Alamat</th>
					<th>No telphone</th>
					<th>Pilihan</th>
				</tr>
			</thead>
			<tbody>
            <?php
            $no = 1;
                include 'configdb.php';
                    $view = mysqli_query($mysqli, "SELECT * FROM tbl_user");
                        while ($rows = mysqli_fetch_array($view)) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $rows['id_user'] ;?></td>
                                <td><?php echo $rows['username'] ;?></td>
                                <td><?php echo $rows['email'] ;?></td>
                                <td><?php echo $rows['password'] ;?></td>
                                <td><?php echo $rows['alamat'] ;?></td>
                                <td><?php echo $rows['no_telf'] ;?></td>
                                <td>
                                <a href="edit-user.php?id=<?php echo $rows['id_user'];?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
								<a href="?id_del=<?php echo $rows['id_user'];?>" onClick="return confirm('Menghapus data ke-<?php echo $i-1;?> Alternatif <?php echo $row['alternatif'];?> ?');" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</a></td>
													</td>
    </tr>

<?php }
?>		
			</tbody>
			</table>
		  </div>
		  <div class="panel-footer text-primary"><?php echo $_SESSION['by'];?><div class="pull-right"></div></div>
		</div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="ui/js/bootstrap.min.js"></script>
	<script src="ui/js/bootswatch.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ui/js/ie10-viewport-bug-workaround.js"></script>
	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
		 $('#example').dataTable( {
            "language": {
                "url": "ui/css/datatables/Indonesian.json"
            }
        } );
	} );
    </script>
</body></html>
