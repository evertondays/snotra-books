<?php
	require('../server/connect.php');

	if(!isset($_GET["id"])) {
		header('Location: ../index.php');
		exit();
	} else {
		$id = $_GET["id"];
	
		if($id == "") {
			header('Location: ../index.php');
			exit();
		}
	}

	$data = mysql_query('SELECT * FROM livros WHERE id = ' . $id, $con) or die(mysql_error());
	$row = mysql_fetch_assoc($data);
	$total = mysql_num_rows($data);

	if($total == 0){
		header('Location: ../index.php');
		exit();
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
	<link rel="stylesheet" href="../css/default.css">
	<link rel="stylesheet" href="../css/global.css">
	<link rel="stylesheet" href="../css/menu.css">
	<link rel="stylesheet" href="../css/book-showcase.css">
	<link rel="stylesheet" href="../css/product.css">
	<link rel="stylesheet" href="../css/footer.css">

	<title>SnotraBooks</title>
	<link size="25x25px" rel='shortcut icon' href="../images/favicon.ico" />
</head>
<body>
	<div id="menu">
		<header>
			<div class="logo">
				<a style="color: var(--white);" href="../index.php">SnotraBooks</a>
			</div>
			<div class="user-info">
				<?php
				// Lidando com o cliente cadastrado
				session_start();
				if(!isset($_SESSION['user_cli'])) {
					?> <button onclick="window.location.href='login.php'">Entrar</button> <?php
				} else {
					$client_name = $_SESSION['user_name_cli'];
					$client_user = $_SESSION['user_cli'];

					$total_products_data = mysql_query("SELECT id FROM `carrinho` WHERE userCliente = '$client_user'", $con);
					$total_products = mysql_num_rows($total_products_data);

					?> <a class="account-link" href="pages/shopping-cart.php"><?=$client_name?> <div class="account-link-part">| Carrinho (<?=$total_products?>)</div></a><?php
				}
				?>

			</div>
		</header>
	</div>
	<div class="content">
		<?php do{ ?>
			<div class="book-infos">
				<div class="title"><?=$row['titulo']?></div>
				<div class="product-image"><img src="<?=$row['imagem']?>" alt="Capa do Livro" class="product-image book-img"></div>
				
				<div class="details">
					<div class="info">
						<h2>Autores:</h2>
						<h1><?=$row['autores']?></h1>
					</div>
					<div class="info">
						<h2>Categoria:</h2>
						<h1><?=$row['categoria']?></h1>
					</div>
					<div class="info">
						<h2>Ano:</h2>
						<h1><?=$row['ano']?></h1>
					</div>
					<div class="info">
						<h2>Valor:</h2>
						<h1>R$ <?=$row['valor']?></h1>
					</div>
				</div>

				<button onclick="window.location.href='buy-item.php?idItem=<?=$row['id']?>'" class="buy-book button-product"><i style="margin-right: 1rem;" class="fas fa-shopping-cart fa-lg"></i>Adicionar ao carrinho</button>
			</div>
			<div class="description">
				<h2>Sinopse</h2>
				<?=$row['descricao']?>
			</div>
		<?php } while($row = mysql_fetch_assoc($data)); ?>
	</div>
	<center><h1>Talvez você também goste</h1></center><br>
	<div class="container">
		<div class="books">
			<?php
				$data = mysql_query("SELECT * FROM livros WHERE id != $id LIMIT 6", $con) or die(mysql_error());
				$row = mysql_fetch_assoc($data);
				$total = mysql_num_rows($data);

			do { 
			?>
				<div id="book-<?=$row['id']?>" class="book">
					<div class="background" style="background-image: url('<?=$row['imagem']?>')"></div>
					<center><img src="<?=$row['imagem']?>" alt="Capa do livro" class="img-book"></center>
					<div class="infos">
						<h1><?=$row['titulo']?></h1>
						<h2><?=$row['autores']?></h2>
						<div class="value">R$ <?=$row['valor']?></div>
						<button onclick="window.location.href='product.php?id=<?=$row['id']?>'" class="buy-book">Comprar</button>
					</div>
				</div>
			<?php } while($row = mysql_fetch_assoc($data)); ?>
		</div>
	</div>

	<?php include('../models/footer.php') ?>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"
		integrity="sha512-M+hXwltZ3+0nFQJiVke7pqXY7VdtWW2jVG31zrml+eteTP7im25FdwtLhIBTWkaHRQyPrhO2uy8glLMHZzhFog=="
		crossorigin="anonymous">
	</script>
	<script src="../js/referencing-image.js"></script>
	<script>referencingImage('../images/book/')</script>
</body>
</html>