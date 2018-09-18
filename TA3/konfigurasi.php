<?php 
	$host = "localhost";
	$username = "root";
	$password = "";
	$db = "db_tugasakhir";

	try{
		$pdo = new PDO("mysql:host={$host}; dbname={$db};", $username,$password);
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		print "Koneksi atau query bermasalah : " . $e -> getMessage() . "<br>";
		die();
	}
 ?>