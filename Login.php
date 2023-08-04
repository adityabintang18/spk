<?php
	include 'configdb.php';

    $username = $_GET['username'];
    $password = $_GET['password'];

	$cek = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";
	$msql = mysqli_query($mysqli, $cek); // Memasukkan koneksi $mysqli ke fungsi mysqli_query
	$result =mysqli_fetch_assoc($msql);

	if (!empty($username) && !empty($password)) {
		if ($result == 0) {
			echo json_encode(['id_user' => 0]);
		} else {
			echo json_encode($result);
		}
	} else {
		echo json_encode(['id_user' => 0]);
	}
?>
