<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<?php 
 $nama = $_POST['nama']; 
 $alamat = $_POST['alamat']; 
 $tempat = $_POST['tempat']; 
 $jk = $_POST['jk']; 
 $usia = $_POST['usia']; 
 
 if($nama == ""){ 
print "Nama Tidak Boleh Kosong" ; 
 }else{ 
 echo "Nama 					: ". $nama; echo "<br>";
 echo "Alamat 				: ". $alamat; echo "<br>";
 echo "Tempat 				: ". $tempat; echo "<br>";
 echo "Jenis Kelamin 	: ". $jk; echo "<br>";
 echo "Usia 					: ". $usia; echo "<br>";

} 
echo "<br>"	
?>
<a href="input.php" class="btn btn-danger">Kembali</a>