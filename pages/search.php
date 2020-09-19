<?php
	if(!isset($_GET['search-input'])){
		header('Location: ../index.php');
		exit();
	}

	$query = mysql_real_escape_string($_GET['search-input']);
	$query = urlencode($query);

	header('Location: ../index.php?search='.$query);
	exit();
?>