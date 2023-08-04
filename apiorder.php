<?php
	include 'configdb.php';
	$id_user = $_GET['id_user'] ?? 0;
	$query = "SELECT * FROM `tbl_order` where id_user='$id_user'";
	$msql = mysqli_query($mysqli, $query);

	$jsonArray = array();

	$photo = "http://localhost/spk%20/spk/image/";

	while ($category = mysqli_fetch_assoc($msql)) {
		
		$rows['id_order'] = $category['id_order'];
		$rows['id_user'] = $category['id_user'];
		$rows['jumlah'] = $category['jumlah'];
		$rows['catatan'] = $category['catatan'];
		$rows['nama_produk'] = $category['nama_produk'];

		array_push($jsonArray, $rows);
	}
	header('Content-Type: application/json');
	echo json_encode($jsonArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>