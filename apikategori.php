<?php
	include 'configdb.php';

	$query = "SELECT * FROM tbl_kategori";
	$msql = mysqli_query($mysqli, $query);

	$jsonArray = array();

	$photo = "http://localhost/spk%20/spk/image/";

	while ($category = mysqli_fetch_assoc($msql)) {
		
		$rows['id_kategori'] = $category['id_kategori'];
		$rows['nama_kategori'] = $category['nama_kategori'];
		$rows['photo_kategori'] = $photo.$category['photo_kategori'];

		array_push($jsonArray, $rows);
	}
	header('Content-Type: application/json');
	echo json_encode($jsonArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>