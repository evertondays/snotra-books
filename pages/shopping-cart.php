<?php
	session_start();
	require('../server/connect.php');

	if(!isset($_SESSION['user_cli'])) {
		header('Location: ../login.php');
		exit();
	} else {
		$client_name = $_SESSION['user_name_cli'];
	}
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
	<link rel="stylesheet" href="../css/book-showcase.css">
	<link rel="stylesheet" href="../css/product.css">

	<title>Carrinho de Compras - SnotraBooks</title>
	<link size="25x25px" rel='shortcut icon' href="../images/favicon.ico" />
</head>
<body>
	<div id="menu">
		<header>
			<div class="logo">
				<a style="color: var(--white);" href="../index.php">SnotraBooks</a>
			</div>
			<div class="user-info">
				<a style="color: var(--red);" href="internal-system/logout.php">Sair <i class="fas fa-sign-out-alt"></i></a>
			</div>
		</header>
	</div>
	<div class="content">
		<center><h1>Olá, <?=$client_name?>!</h1></center>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"
		integrity="sha512-M+hXwltZ3+0nFQJiVke7pqXY7VdtWW2jVG31zrml+eteTP7im25FdwtLhIBTWkaHRQyPrhO2uy8glLMHZzhFog=="
		crossorigin="anonymous">
	</script>
	<script src="../js/referencing-image.js"></script>
	<script>referencingImageShowcase('../images/book/')</script>
</body>
</html>