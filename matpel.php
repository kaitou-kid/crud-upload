<?php 
	include 'db/connect.php';

	$sql = "SELECT * FROM mata_pelajaran";
	$data = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Kelas</title>
</head>
<body>
	<a href="datasiswa.php">Data Siswa</a> |
	<a href="kelas.php">Data Kelas</a> |
	<a href="nilai.php">Data Nilai</a> |
	<a href="matpel.php">Data Matpel</a> |
	<br/><hr/>
	<table border= "1" cellspacing="0" cellpadding="10">
		<tr>
			<td>ID Matpel</td>
			<td>Nama Matpel</td>
		</tr>
		<?php 
			while ($row = $data->fetch_assoc()) {
				# code...
		?>	
		<tr>
			<td><?php echo $row['id_matpel']; ?></td>	
			<td><?php echo $row['nama_matpel']; ?></td>
		</tr>
		<?php
			}
		?>
	</table>
</body>
</html>