<?php
	session_start();
	require('../server/connect.php');

	if(!isset($_GET["idItem"])) {
		header('Location: ../index.php');
		exit();
	} else {
		$idItem = $_GET["idItem"];

		$data = mysql_query('SELECT id FROM livros WHERE id = ' . $idItem, $con) or die(mysql_error());
		$row = mysql_fetch_assoc($data);
		$total = mysql_num_rows($data);
	
		if($total == 0){
			header('Location: ../index.php');
			exit();
		} 

		if(!isset($_SESSION['user_cli'])) {
			header('Location: login.php');
			exit();
		} else {
			$client_user = $_SESSION['user_cli'];
			mysql_query("INSERT INTO carrinho (`userCliente`, `idProduto`) VALUES ('$client_user', '$idItem')", $con);
		}

		header('Location: product.php?id='.$idItem);
		exit();
	}
?>