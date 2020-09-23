<?php
	session_start();
	require('../server/connect.php');

	if(!isset($_SESSION['user_cli'])) {
		header('Location: login.php');
		exit();
	}

	$client_name = $_SESSION['user_name_cli'];
	$client_user = $_SESSION['user_cli'];

	mysql_query("DELETE FROM carrinho WHERE userCliente = '$client_user'", $con);
?>

<!doctype html>
<html lang="pt-br">
<head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700&family=Work+Sans:wght@600&display=swap" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="../css/global.css">
	<link rel="stylesheet" href="../css/default.css">
	<link rel="stylesheet" href="../css/menu.css">
	<link rel="stylesheet" href="../css/form.css">
	<link rel="stylesheet" href="../css/login.css">

	<title>Finalizar Pedido - SnotraBooks</title>
	<link size="25x25px" rel='shortcut icon' href="../images/favicon.ico" />
</head>
<body style="background-image: url('../../images/wallpaper-3.png') !important;">
	<div class="container">
		<div class="login-wrapper">
			<h1>A compra foi realizada com sucesso!</h1><br>
			<h2>O prazo de entrega é de 3 dias.</h2><br>
			<a href="../index.php" style="color: var(--primary);">Voltar para a home</a>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"
		integrity="sha512-M+hXwltZ3+0nFQJiVke7pqXY7VdtWW2jVG31zrml+eteTP7im25FdwtLhIBTWkaHRQyPrhO2uy8glLMHZzhFog=="
		crossorigin="anonymous">
	</script>
</body>
</html>