<?php 
	include 'db/connect.php';

	$sql_user = "SELECT * FROM user";
	$data_user= $conn->query($sql_user);
	// $row = $data->fetch_array();
	// print_r($row);
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Article</title>
</head>
<body>
	<form action="new-article.php" method="POST" enctype="multipart/form-data">
	<table cellpadding="15">
		<tr>
			<td>title</td>
			<td>:</td>
			<td>
				<input type="text" name="title" placeholder="title here">
			</td>
		</tr>
		<tr>
			<td>Content</td>
			<td>:</td>
			<td>
				<textarea name="content" cols="20" rows="5">
					
				</textarea>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<input type="file" name="picture" />
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<select name="user">
					<optgroup label="--User--">
					<?php while($row=$data_user->fetch_array()){ ?>
						<option value=<?=$row['id_user']?>>
							<?=$row['user'] ?>
						</option>
					<?php } ?>
					</optgroup>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<button type="submit">
					<h3>Save Post</h3>
				</button>
			</td>
		</tr>
	</table>
	</form>
</body>
</html>
<?php 
	$param = $_POST;
	
	// manangkap file yang akan diupload
	$file_img = $_FILES;

	echo "<pre>";
	print_r($file_img);
	echo "</pre>";

	// print_r($param);

	if (!empty($param)) {
		
		//mengambil waktu saat ini
		$waktu = date('Ymdhis');
		//mengambil type file
		$file_type = $file_img['picture']['type'];

		// kondisi untuk file type yang akan di upload
		if ($file_type == 'image/png') {
			$file_name = $waktu.".png";
		}if ($file_type == 'image/jpg' || $file_type == 'image/jpeg') {
			$file_name = $waktu.".jpg";
		} else {
			echo "File harus berekstensi png atau jpg";
			exit;
		}
		
		// echo "$file_name";

		// mendapatkan tmp url dan lokasi uplads
		$url_tmp = $file_img['picture']['tmp_name'];
		$upload_path = "./uploads/";
		// echo $url_tmp;
		// echo $url_tmp."/".$file_name;


		// upload prosess
		// move_uploaded_file(filename, destination)
		// digunakan untuk memindahkan file yang akan di upload
		if (move_uploaded_file($url_tmp, $upload_path.$file_name)) {
		// query insert database
		$sql = "INSERT INTO post(title, content, picture,tanggal, id_user) VALUES('".$param['title']."', '".$param['content']."', '".$file_name."',now(), ".$param['user'].") ";

		// // echo $sql;
		$data = $conn->query($sql);
		header("location: article.php");
		}

	}else{
		echo "Inputan tidak boleh kosong";
	}

?>