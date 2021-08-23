<?php

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "pasien";

//$base_url = "http://localhost/koperasi/";

$koneksi = mysqli_connect($server, $user, $pass, $dbname);

if (mysqli_connect_errno()) {
  echo "Koneksi database gagal" . mysqli_connect_error();
}
/*if (mysql_connect($server,$user,$pass)){
	#echo ":)";
	mysql_select_db($dbname) or die("database not found");
}else{
	echo "Database Not Found";
}*/
