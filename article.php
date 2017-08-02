<?php 
	include "db/connect.php";

	$sql = 'SELECT post.id_post,post.title, post.content, post.picture, post.tanggal, post.id_user,user.user FROM post, user WHERE post.id_user = user.id_user';

	$data = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>List Post</title>
</head>
<body>
	<br/>
	<a href="new-article.php">NEW POST</a>
	<br/>
	<br/>
	<form method="GET" action="cari-article.php">
		<input type="text" name="cari"> 
		<button type="submit">
			CARI
		</button>
	</form>
	<br>
	<table border="1" cellpadding="10">
		<tr>
			<td>Title</td>
			<td>Picture</td>
			<td>Content</td>
			<td>Tanggal</td>
			<td>User</td>
			<td>Action</td>
		</tr>
		<?php while($result = $data->fetch_array()) { ?>
			<tr>
				<td><?php echo $result['title']?></td>
				<td>
					<img src="uploads/<?=$result['picture'] ?>" height="80px" width="60px" />
				</td>
				<td><?php echo $result['content']?></td>
				<td><?php echo $result['tanggal']?></td>
				<td><?php echo $result['user']?></td>
				<td><a href='edit-article.php?id_post=<?php echo $result['id_post']?>&id_user=<?=$result['id_user'] ?>'>EDIT</a> | <a href='delete-article.php?id_post=<?php echo $result['id_post']?>'>DELETE</a></td>
			</tr>
		<?php } ?>
	</table>
</body>
</html>