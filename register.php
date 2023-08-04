<?php
	include('configdb.php');

	$username = $_GET['username'];
	$email = $_GET['email'];
	$password = $_GET['password'];
	$alamat = $_GET['alamat'];
	$notelf = $_GET['no_telf'];

	$queryRegister = "SELECT * FROM tbl_user WHERE email = '".$email."'";
	$msql = mysqli_query($mysqli, $queryRegister);

	$result = mysqli_num_rows($msql);

	if (!empty($username) && !empty($email) && !empty($notelf) && !empty($password)) {
		if ($result == 0) {
			$regis = "INSERT INTO tbl_user(username, email, alamat, no_telf, password) VALUES ('$username', '$email', '$alamat', '$notelf', '$password')";
			echo $regis;
			$msqlRegis = mysqli_query($mysqli, $regis);
			echo "1";
		} else {
			echo "Email sudah digunakan";
		}
	} else {
		echo "Semua data harus diisi lengkap";
	}
?>