<?php 
	
	// set_default time zone
	date_default_timezone_set("Asia/Jakarta");

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'blog';
	// $db = 'sekolah';

	$conn = new mysqli($host, $user, $pass, $db);

	if (!$conn) {
		# code...
		echo "<h3>Koneksi gagal</h3>";
	}

	/*$sql = "SELECT * FROM siswa";
	$data = $conn->query($sql);
	
	while ($result = $data->fetch_assoc()) {
		# code...
		echo "id : ".$result['id_siswa']."<br/>";
		echo "Nama Siswa : ".$result['nama_siswa']."<br/>";
		echo "<hr/>";
	}*/




?>