<?php 
	include 'db/connect.php';

	$sql = "SELECT nilai_ujian.*, siswa.nama_siswa, mata_pelajaran.nama_matpel FROM nilai_ujian, siswa, mata_pelajaran WHERE nilai_ujian.id_siswa = siswa.id_siswa AND nilai_ujian.id_matpel = mata_pelajaran.id_matpel ORDER BY nilai_ujian.id_nilai";
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
			<td>ID Nilai</td>
			<td>Nama Siswa</td>
			<td>Nama Matpel</td>
			<td>Nilai</td>
		</tr>
		<?php 
			while ($row = $data->fetch_assoc()) {
				# code...
		?>	
		<tr>
			<td><?php echo $row['id_nilai']; ?></td>	
			<td><?php echo $row['nama_siswa']; ?></td>
			<td><?php echo $row['nama_matpel']; ?></td>
			<td><?php echo $row['nilai']; ?></td>
		</tr>
		<?php
			}
		?>
	</table>
</body>
</html>