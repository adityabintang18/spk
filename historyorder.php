<?php
	include 'configdb.php';

	$user = $_GET['id_user'];
	$jumlah = $_GET['jumlah'];
	$catatan = $_GET['catatan'];
	$nama_product = $_GET['nama_product'];


	if (!empty($user) && !empty($jumlah) && !empty($catatan) && !empty($nama_product)) {
		
		$regis = "INSERT INTO tbl_order(id_user, jumlah, catatan, nama_produk) VALUES ('$user', '$jumlah', '$catatan', '$nama_product')";
			$msqlRegis = mysqli_query($mysqli, $regis);

		echo "1";

	}else{
		echo "Semua data harus di isi lengkap";
	}
?>