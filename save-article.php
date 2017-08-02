<?php 
	include 'db/connect.php';

	$param = $_POST;
	
	// manangkap file yang akan diupload
	$file_img = $_FILES;

	echo "<pre>";
	print_r($param);
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

			//delete file lama
			// echo $upload_path.$param['old_pic'];
			if(!empty($param['old_pic'])){
				unlink($upload_path.$param['old_pic']);
			}
			// query insert database
			$sql = "UPDATE post 
			  		SET 
			  			title= '".$param['title']."',
			  			content = '".$param['content']."',
			  			picture = '".$file_name."',
			  			tanggal = now(),
			  			id_user = '".$param['user']."'
			  		WHERE 
			  			id_post = '".$param['id_post']."'

			  		";

			// echo $sql;
			$data = $conn->query($sql);
			header("location: article.php");
		}

	}else{
		echo "Inputan tidak boleh kosong";
	}
?>