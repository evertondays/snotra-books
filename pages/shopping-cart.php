<?php
	session_start();
	require('../server/connect.php');

	if(!isset($_SESSION['user_cli'])) {
		header('Location: login.php');
		exit();
	}

	$client_name = $_SESSION['user_name_cli'];
	$client_user = $_SESSION['user_cli'];

	$data = mysql_query("SELECT * FROM `carrinho` WHERE userCliente = '$client_user'", $con) or die(mysql_error());
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
	<link rel="stylesheet" href="../css/global.css">
	<link rel="stylesheet" href="../css/default.css">
	<link rel="stylesheet" href="../css/menu.css">
	<link rel="stylesheet" href="../css/shopping-cart-table.css">

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
	<div class="container">
		<center><h1 style="font-size: 3rem;">Olá, <?=$client_name?>!</h1></center>

		<table class="table">
			<thead>
				<tr>
					<th class="table-index">#</th>
					<th class="table-img">Capa</th>
					<th>Titulo</th>
					<th class="table-authors">Autores</th>
					<th>Valor</th>
					<th class="table-button">REMOVER</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			if($total > 0) {
				$index = 0;
				do {
					$book_id = $row['idProduto'];
					$index++;

					$book_data = mysql_query("SELECT * FROM `livros` WHERE id = '$book_id'", $con) or die(mysql_error());
					$book_row = mysql_fetch_assoc($book_data);		
			?>
				<tr>
					<th class="table-index"><?=$index?></th>
					<td class="table-img"><img class="book-img" src="<?=$book_row['imagem']?>" alt="Capa do livro"></td>
					<td class="title-table"><?=$book_row['titulo']?></td>
					<td class="table-authors"><?=$book_row['autores']?></td>
					<td class="value">R$ <?=$book_row['valor']?></td>
					<td class="table-button">
						<a href="remove-item.php?id=<?=$book_row['id']?>" onclick="return confirmExclusion(`<?=$book_row['titulo']?>`)">
							<button class="delete-button"><i class="fas fa-trash-alt fa-lg"></i></button>
						</a>
					</td>
				</tr>
			<?php
				}while($row = mysql_fetch_assoc($data));
			} else { ?>

				<br><br><center><h1>Você não tem livros :(</h1></center>
			
			<?php }
			?>
			</tbody>
		</table>
		<div class="result-value"><button onclick="window.location.href='check-out.php'" class="confirm-request">Confirmar pedido</button></div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"
		integrity="sha512-M+hXwltZ3+0nFQJiVke7pqXY7VdtWW2jVG31zrml+eteTP7im25FdwtLhIBTWkaHRQyPrhO2uy8glLMHZzhFog=="
		crossorigin="anonymous">
	</script>
	<script src="../js/referencing-image.js"></script>
	<script src="../js/add-values.js"></script>
	<script>

		function confirmExclusion(nome){
			return confirm(`Você realmente deseja remover o livro '${nome}'?`);
		}

	</script>
	<script>referencingImage('../images/book/')</script>
</body>
</html>