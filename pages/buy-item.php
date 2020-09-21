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
		} 

		// Verificando se não existe um livro igual no BD
		$client_user = $_SESSION['user_cli'];

		$items = mysql_query("SELECT id FROM `carrinho` WHERE userCliente = '$client_user' AND idProduto = '$idItem'", $con);
		$total_items = mysql_num_rows($items);

		if($total_items > 0){
			header('Location: product.php?id='.$idItem);
			exit();
		}

		// Inserindo no BD
		$client_user = $_SESSION['user_cli'];
		mysql_query("INSERT INTO carrinho (`userCliente`, `idProduto`) VALUES ('$client_user', '$idItem')", $con);
		

		header('Location: product.php?id='.$idItem);
		exit();
	}
?>