<?php
	require('server/connect.php');


?>
<!doctype html>
<html lang="pt-br">
<head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700&family=Work+Sans:wght@600&display=swap"
		rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="css/global.css">
	<link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/sitemap.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/footer.css">

	<title>Mapa do site - SnotraBooks</title>
	<link size="25x25px" rel='shortcut icon' href="images/favicon.ico" />
</head>
<body>
	<div id="menu">
		<header>
			<div class="logo">
				<a style="color: var(--white);" href="index.php">SnotraBooks</a>
			</div>
			<div class="user-info">
				<?php
					// Lidando com o cliente cadastrado
					session_start();
					if(!isset($_SESSION['user_cli'])) {
						?> <button onclick="window.location.href='pages/login.php'">Entrar</button> <?php
					} else {
						$client_name = $_SESSION['user_name_cli'];
						$client_user = $_SESSION['user_cli'];

						$total_products_data = mysql_query("SELECT id FROM `carrinho` WHERE userCliente = '$client_user'", $con);
						$total_products = mysql_num_rows($total_products_data);

						?> <a class="account-link" href="pages/shopping-cart.php"><?=$client_name?> <div class="account-link-part">|
						Carrinho (<?=$total_products?>)</div></a><?php
					}
					?>
			</div>
		</header>
	</div>

	<div class="container">
		<div class="wrapper">
			<a href="index.php">Home</a> - Pagina inicial com campos de pesquisa para se encontrar os livros.
		</div>
		<div class="wrapper">
			<a href="pages/login.php">Login</a> - Login de usuário para se poder comprar os produtos.
		</div>
		<div class="wrapper">
			<a href="pages/register.php">Cadastro</a> - Cadastro de cliente na loja.
		</div>
		<div class="wrapper">
			<a href="pages/shopping-cart.php">Carrinho</a> - Lista de todos os produtos do usuário.
		</div>
		<div class="wrapper">
			<a href="pages/shopping-cart.php">Finalização da compra</a> - Inserção dos dados de entrega e finalização de pedido.
		</div>
	</div>

	<?php include('models/footer.php') ?>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"
		integrity="sha512-M+hXwltZ3+0nFQJiVke7pqXY7VdtWW2jVG31zrml+eteTP7im25FdwtLhIBTWkaHRQyPrhO2uy8glLMHZzhFog=="
		crossorigin="anonymous">
	</script>
</body>

</html>