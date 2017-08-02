<?php
	include 'db/connect.php';

	$sql = "SELECT siswa.*, kelas.nama_kelas FROM siswa, kelas WHERE siswa.id_kelas = kelas.id_kelas ORDER BY siswa.id_siswa ASC";
	$data = $conn->query($sql);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Data Siswa</title>
</head>
<body>
	<a href="datasiswa.php">Data Siswa</a> |
	<a href="kelas.php">Data Kelas</a> |
	<a href="nilai.php">Data Nilai</a> |
	<a href="matpel.php">Data Matpel</a> |
	<br/><hr/>
	<table border= "1" cellspacing="0" cellpadding="10">
		<tr>
			<td>ID</td>
			<td>Nama</td>
			<td>Kelas</td>
		</tr>
		<?php 
			while ($row = $data->fetch_assoc()) {
				# code...
		?>	
		<tr>
			<td><?php echo $row['id_siswa']; ?></td>	
			<td><?php echo $row['nama_siswa']; ?></td>
			<td><?php echo $row['nama_kelas']; ?></td>
		</tr>
		<?php
			}
		?>
	</table>
</body>
</html>