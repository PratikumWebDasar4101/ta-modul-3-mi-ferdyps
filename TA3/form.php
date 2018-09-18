<?php
	require("konfigurasi.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data diri</title>
</head>
<body>
	<h2>Data Diri</h2>
	<hr>
	<form method="post" enctype="multipart/form-data">
		<p>Nama : <input type="text" name="nama"><br></p>
		<p>NIM : <input type="text" name="nim"><br></p>
		<p>Fakultas : <select name="fakultas">
			<option value="FIT">Fakultas Ilmu Terapan</option>
			<option value="FIK">Fakultas Industri Kreatif</option>
			<option value="FRI">Fakultas Rekayasa Industri</option>
			<option value="FIF">Fakultas Informatika</option>
			<option value="FEB">Fakultas Ekonomi Bisnis</option>
			<option value="FKB">Fakultas Komunikasi Bisnis</option>
			<option value="FTE">Fakultas Teknik Elektro</option>
		</select><br></p>
		<p>Jenis Kelamin : 
		<input type="radio" name="gender" value="Laki-laki">Laki-laki
		<input type="radio" name="gender" value="Perempuan">Perempuan <br></p>
		<p>Gambar : <input type="file" name="gambar"></p>
		<input type="submit" name="submit" value="Upload">
	</form>
</body>
</html>
<?php
	if(isset($_POST['nama'])){
		$nama = $_POST['nama'];
		$nim = $_POST['nim'];
		$fakultas = $_POST['fakultas'];
		$gender = $_POST['gender'];

		$nama_gambar = $_FILES['gambar']['name'];
		$tmp_gambar = $_FILES['gambar']['tmp_name'];
		$dir = "picture/";
		$tempat_gambar = $dir.$nama_gambar;

		$uploadGambar = move_uploaded_file($tmp_gambar, $tempat_gambar);
		if(!$uploadGambar)
			die("Gagal upload gambar");
		
			$kueri = $pdo -> prepare("INSERT INTO tb_mahastudent VALUES('$nim','$nama','$fakultas','$gender','$tempat_gambar') "); 
			$kueri -> execute();

			if ($kueri) {
				header("Location: datadiri.php");
			}
			else {
				die("Gagal menambahkan data!");
			}
	}
?>