<?php
	@session_start();
	
	$_SESSION['judul'] = 'Penjualan Admin';
	$_SESSION['welcome'] = 'SISTEM PENJUALAN ONLINE MENGGUNAKAN METODE WEIGHT PRODUCT';
	$_SESSION['by'] = 'Stevanus Ide Anggitya';
	$mysqli = new mysqli('localhost','root','','spk-wp');
	if($mysqli->connect_errno){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
?>
