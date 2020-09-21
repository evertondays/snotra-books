<?php
	require('server/connect.php');


	if(isset($_GET['search'])){
		$search = urldecode($_GET['search']);
		$query = "SELECT id, titulo, valor, imagem, autores FROM livros WHERE titulo LIKE '%$search%'";
	}
	else if (isset($_GET['category']))
	{
		$category = urldecode($_GET['category']);
		$query = "SELECT id, titulo, valor, imagem, autores FROM livros WHERE categoria = '$category'";
	} else {
		$query = 'SELECT id, titulo, valor, imagem, autores FROM livros';
	}

	$data = mysql_query($query . " LIMIT 12", $con) or die(mysql_error());
	$row = mysql_fetch_assoc($data);
	$total = mysql_num_rows($data);
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
	<link rel="stylesheet" href="css/global.css">
	<link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/book-showcase.css">

	<title>Home - SnotraBooks</title>
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

					?> <a href="pages/shopping-cart.php"><?=$client_name?> | Carrinho (<?=$total_products?>)</a><?php
				}
				?>

			</div>
		</header>
		<form class="search" action="pages/search.php" method="get" style="width: 100%;" autocomplete="off">
			<input name="search-input"id="search-book" type="text" placeholder="Pesquise aqui por um livro">
			<button class="search-button" type="submit">Buscar</button>
		</form>
		<div class="categories-button">
			Ver categorias <i class="fas fa-chevron-down"></i>
		</div>
		<div class="categories invisible">
			<ul>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Ação')?>'">Ação</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Antologias')?>'">Antologias</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Autoajuda')?>'">Autoajuda</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Aventura')?>'">Aventura</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Biografia')?>'">Biografia</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Ciência')?>'">Ciência</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Contos')?>'">Contos</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Crônica')?>'">Crônica</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Drama')?>'">Drama</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Épico')?>'">Épico</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Fantasia')?>'">Fantasia</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Ficção')?>'">Ficção</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Ficção Ciêntifica')?>'">Ficção Ciêntifica</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Horror')?>'">Horror</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Infantojuvenil')?>'">Infantojuvenil</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Infantil')?>'">Infantil</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Romance')?>'">Romance</li>
				<li onclick="window.location.href='index.php?category=<?=urlencode('Hístoria')?>'">Hístoria</li>
			</ul>
		</div>
	</div>
		<?php if($total > 0) { ?>
				<div class="container">
					<div class="books">

				<?php do { ?>

					<div id="book-<?=$row['id']?>" class="book">
						<div class="background" style="background-image: url('<?=$row['imagem']?>')"></div>
						<center><img src="<?=$row['imagem']?>" alt="Capa do livro" class="img-book"></center>
						<div class="infos">
							<h1><?=$row['titulo']?></h1>
							<h2><?=$row['autores']?></h2>
							<div class="value">R$ <?=$row['valor']?></div>
							<button class="buy-book" onclick="window.location.href='pages/product.php?id=<?=$row['id']?>'">Comprar</button>
						</div>
					</div>

				<?php } while($row = mysql_fetch_assoc($data)); ?>

					</div>
				</div>
		<?php } else { ?>

			<div class="no-results">
				<div class="no-results-wrapper">
					<h1><i class="fas fa-exclamation-triangle"></i></h1>
					<h1>Ops! Acho que acabaram os livros :(</h1>
					<h2>Mas não se preocupe, volte mais tarde ou prossiga para a home</h2>
					<a href="index.php">Voltar para a home</a>
				</div>
			</div>

		<?php } ?>

	<script src="js/menu.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"
		integrity="sha512-M+hXwltZ3+0nFQJiVke7pqXY7VdtWW2jVG31zrml+eteTP7im25FdwtLhIBTWkaHRQyPrhO2uy8glLMHZzhFog=="
		crossorigin="anonymous">
	</script>
	<script src="js/referencing-image.js"></script>
	<script src="js/search-form.js"></script>
	<script>referencingImageShowcase('images/book/')</script>
</body>
</html>