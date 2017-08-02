<?php 
	include 'db/connect.php';

	$param = $_GET['id_post'];
	$sql = "DELETE FROM post WHERE id_post = ".$param." ";

	// echo $sql;
	$data = $conn->query($sql);
	header("location: article.php");
	// echo "";
?>