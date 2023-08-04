<?php
	include('configdb.php');
	$k1 = $_POST['k1'];
	$k2 = $_POST['k2'];
	$k3 = $_POST['k3'];
	$k4 = $_POST['k4'];
	$k5 = $_POST['k5'];
	$id_alt = $_POST['alternatif'] ;

	$queryCat = "SELECT * FROM tbl_produk where id_produk = $id_alt";
                        $msqlCat = mysqli_query($mysqli, $queryCat);
						$data = mysqli_fetch_assoc($msqlCat);
	$alternatif = $data['nama_produk'];
	
						


	$result = $mysqli->query("INSERT INTO `alternatif` (`id_alternatif`, `alternatif`, `k1`, `k2`, `k3`, `k4`, `k5`)
								VALUES ($id_alt, '".$alternatif."', '".$k1."', '".$k2."', '".$k3."', '".$k4."', '".$k5."');");
	if(!$result){
		// echo "Gagal";
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		header('Location: alternatif.php');
	}
?>