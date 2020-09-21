<?php
	require('../server/connect.php');
	session_start();

	if(isset($_SESSION['user_cli'])){
		$id = mysql_real_escape_string($_GET['id']);
		$client_user = $_SESSION['user_cli'];
	
		mysql_query("DELETE FROM carrinho WHERE idProduto = '$id' AND userCliente = '$client_user'", $con);
		echo "DELETE FROM carrinho WHERE idProduto = '$id' AND userCliente = '$client_user'";
	}

	header('Location: shopping-cart.php');
	exit();
?>