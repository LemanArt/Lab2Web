<!DOCTYPE html>
<html>
<head>
	<title>Program PHP Sederhana</title>
</head>
<body>
	<h1>Form Input Data Pribadi</h1>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		Nama: <input type="text" name="nama"><br><br>
		Tanggal Lahir: <input type="date" name="tanggal_lahir"><br><br>
		Pekerjaan: 
		<select name="pekerjaan">
			<option value="Programmer">Programmer</option>
			<option value="Desainer">Desainer</option>
			<option value="Pengusaha">Pengusaha</option>
			<option value="Karyawan">Karyawan</option>
		</select><br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
	<br>

	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Memeriksa apakah form sudah di-submit
			$nama = $_POST["nama"];
			$tanggal_lahir = $_POST["tanggal_lahir"];
			$pekerjaan = $_POST["pekerjaan"];

			// Menghitung umur berdasarkan tanggal lahir
			$tanggal_lahir = new DateTime($tanggal_lahir);
			$sekarang = new DateTime();
			$umur = $sekarang->diff($tanggal_lahir)->y;

			// Menentukan gaji berdasarkan pekerjaan
			switch ($pekerjaan) {
				case 'Programmer':
					$gaji = 10000000;
					break;
				case 'Desainer':
					$gaji = 8000000;
					break;
				case 'Pengusaha':
					$gaji = 15000000;
					break;
				case 'Karyawan':
					$gaji = 5000000;
					break;
				default:
					$gaji = 0;
					break;
			}

			// Menampilkan output
			echo "<h2>Output:</h2>";
			echo "Nama: " . $nama . "<br>";
			echo "Tanggal Lahir: " . date_format($tanggal_lahir, 'd-m-Y') . "<br>";
			echo "Umur: " . $umur . " tahun<br>";
			echo "Pekerjaan: " . $pekerjaan . "<br>";
			echo "Gaji: Rp " . number_format($gaji, 0, ',', '.') . "<br>";
		}
	?>
</body>
</html>
