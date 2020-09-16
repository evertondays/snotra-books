<?php
	require('server/connect.php');

	$data = mysql_query('SELECT id, titulo, valor, imagem, autores FROM livros', $con) or die(mysql_error());
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
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/global.css">
	<link rel="stylesheet" href="css/book-showcase.css">

	<title>Home - SnotraBooks</title>
	<link size="25x25px" rel='shortcut icon' href="images/favicon.ico" />
</head>
<body>
	<div id="menu">
		<header>
			<div class="logo">
				SnotraBooks
			</div>
			<div class="user-info">
				Everton Dias | (4) produtos
			</div>
		</header>
		<div class="search">
			<input id="search-book" type="text" placeholder="Pesquise aqui por um livro">
			<button class="search-button">
				Buscar
			</button>
		</div>
		<div class="categories-button">
			Ver categorias <i class="fas fa-chevron-down"></i>
		</div>
		<div class="categories invisible">
			<ul>
				<li>Ação</li>
				<li>Antologias</li>
				<li>Autoajuda</li>
				<li>Aventura</li>
				<li>Biografia</li>
				<li>Ciência</li>
				<li>Contos</li>
				<li>Crônica</li>
				<li>Drama</li>
				<li>Épico</li>
				<li>Fantasia</li>
				<li>Ficção</li>
				<li>Ficção Ciêntifica</li>
				<li>Horror</li>
				<li>Infantojuvenil</li>
				<li>Infantil</li>
				<li>Romance</li>
				<li>Hístoria</li>
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
							<button class="buy-book">Comprar</button>
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
	<script>referencingImageShowcase('images/book/')</script>
</body>
</html>