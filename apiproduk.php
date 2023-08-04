<?php
	include 'configdb.php';

	$query = "SELECT * FROM tbl_produk";
	$msql = mysqli_query($mysqli, $query);

	$jsonArray = array();

	$photo = "http://localhost/spk%20/spk/image/";

	while ($produk = mysqli_fetch_assoc($msql)) {
		
		$rows['id_produk'] = $produk['id_produk'];
		$rows['nama_produk'] = $produk['nama_produk'];
        $rows['harga_produk'] = $produk['harga_produk'];
        $rows['deskripsi_produk'] = $produk['deskripsi_produk'];
		$rows['photo_kategori'] = $photo.$produk['photo_produk'];

		array_push($jsonArray, $rows);
	}
		// var_dump ($jsonArray);
		header('Content-Type: application/json');
	echo json_encode($jsonArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>