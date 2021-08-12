<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<form action="cek.php" class=" p-3" method="post">
			<h4>Form Validasi :</h4>
		<table>
			<tr class="pb-2">
				<td>Nama </td>
				<td>: <input type="text" name="nama" required></td>
			</tr>
			<tr class="">
				<td>Alamat</td>
				<td>: <input type="text" name="alamat" required></td>
			</tr>
			<tr class="">
				<td>Tempat</td>
				<td>: <input type="text" name="tempat" required></td>
			</tr>
			<tr class="">
				<td>Jenis Kelamin</td>
				<td>: 
				<select name="jk" id="">
					<option value="laki-laki">Laki Laki</option>
					<option value="perempuan">Perempuan</option>
				</select>	
			</tr>
			<tr class="">
				<td>Usia</td>
				<td>: <input type="text" name="usia" required></td>
			</tr>
			<tr>
			<td><input class="btn btn-primary" type="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
</body>

</html>