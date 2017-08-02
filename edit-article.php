<?php 
	include 'db/connect.php';
	$id_post = $_GET['id_post'];
	$id_user = $_GET['id_user'];

	$sql = "SELECT * FROM post WHERE id_post =".$id_post."";
	// echo $sql;
	$data = $conn->query($sql);
	$result = $data->fetch_assoc();


	// Tampilkan User
	$sql_user = "SELECT * FROM user";
	$data_user= $conn->query($sql_user);
?>

<!DOCTYPE html>
<html>
<head>
	<title>EDIT ARTICLE</title>
</head>
<body>
	<form action="save-article.php" method="POST" enctype="multipart/form-data">
	<table cellpadding="15">
		<tr>
			<td>title</td>
			<td>:</td>
			<td>
				<input type="hidden" name="id_post" value="<?=$id_post ?>">
				<input type="hidden" name="old_pic" value="<?=$result['picture']?>" />
				<input type="text" name="title" placeholder="title here" value="<?=$result['title']?>">
			</td>
		</tr>
		<tr>
			<td>Content</td>
			<td>:</td>
			<td>
				<textarea name="content" cols="45" rows="25">
					<?=$result['content'];?>
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
					<?php while($row_user=$data_user->fetch_array()){ ?>
					<?php 
						if ($id_user == $row_user['id_user']) {
							$select='selected';
						}else{
							$select = '';
						}
					?>
						<option value="<?=$row_user['id_user'] ?>" <?=$select?>>
							<?=$row_user['user']?>
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
