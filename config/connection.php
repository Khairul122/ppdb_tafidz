<?php
$host 		= "localhost";
$username 	= "root";
$password 	= "";
$db 		= "ppdb_tafidz";

$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn) {
	die("Koneksi database gagal : " . mysqli_connect_error());
}
