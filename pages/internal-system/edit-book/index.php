<?php
	require('../login-verification.php');
	require('../../../server/connect.php');

	if(!isset($_GET["id"])) {
		header('Location: ../book-manager');
		exit();
	} else {
		$id = $_GET["id"];
	
		$data = mysql_query('SELECT * FROM livros WHERE id = ' . $id, $con) or die(mysql_error());
		$row = mysql_fetch_assoc($data);
		$total = mysql_num_rows($data);
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

	<!-- CSS -->
	<link rel="stylesheet" href="../../../css/global.css">
	<link rel="stylesheet" href="../../../css/form.css">
	<link rel="stylesheet" href="../../../css/edit-book.css">
	<link rel="stylesheet" href="../../../css/menu-system.css">

	<title>Edição de Livro - SnotraBooks</title>
</head>
<body>

	<?php include('../../../models/menu-system.php')?>

	<div class="container">
		<form method="post" action="exec.php" enctype="multipart/form-data" autocomplete="off">
		<input type="hidden" name="id" value="<?=$row['id']?>">

			<div class="input-group">
				<label for="input-title">Título</label>
				<input id="input-title" name="title" type="text" required value="<?=$row['titulo']?>">
			</div>

			<div class="input-group">
				<label for="input-authors">Autores</label>
				<input id="input-authors" name="authors" type="text" required value="<?=$row['autores']?>">
			</div>

			<div class="input-group">
				<label for="input-description">Descrição</label>
				<textarea id="input-description" name="description" rows="7" type="text" required ><?=$row['descricao']?></textarea>
			</div>

			<div class="input-group">
				<label for="input-date">Ano de lançamento</label>
				<input id="input-date" name="date" class="year" type="text" value="<?=$row['ano']?>" required>
			</div>

			<div class="input-group">
				<label for="input-category">Categoria</label>
				<select id="input-category" name="category" value="<?=$row['categoria']?>">
					<option value="Ação">Ação</option>
					<option value="Antologias">Antologias</option>
					<option value="Autoajuda">Autoajuda</option>
					<option value="Aventura">Aventura</option>
					<option value="Biografia">Biografia</option>
					<option value="Ciência">Ciência</option>
					<option value="Contos">Contos</option>
					<option value="Crônica">Crônica</option>
					<option value="Drama">Drama</option>
					<option value="Épico">Épico</option>
					<option value="Fantasia">Fantasia</option>
					<option value="Ficção">Ficção</option>
					<option value="Ficção Ciêntifica">Ficção Ciêntifica</option>
					<option value="Hístoria">Hístoria</option>
					<option value="Horror">Horror</option>
					<option value="Infantojuvenil">Infantojuvenil</option>
					<option value="Infantil">Infantil</option>
					<option value="Romance">Romance</option>
				</select>
			</div>

			<div class="input-group">
				<label for="input-value">Valor</label>
				<input id="input-value" name="value" class="money" type="text" required value="<?=$row['valor']?>">
			</div>

			<div class="input-group-img">
				<img src="<?=$row['imagem']?>" alt="Capa do livro" class="book-img">
				<input id="input-file" name="img-file" type="file" accept="image/*" style="border: none;">
				<input type="hidden" id="input-img-url" name="img-url" value="<?=$row['imagem']?>">
			</div>

			<button class="register-button" type="submit">Confirmar edição</button>
		</form>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"
		integrity="sha512-M+hXwltZ3+0nFQJiVke7pqXY7VdtWW2jVG31zrml+eteTP7im25FdwtLhIBTWkaHRQyPrhO2uy8glLMHZzhFog=="
		crossorigin="anonymous">
	</script>
	<script src="../../../js/referencing-image.js"></script>
	<script>referencingImage('../../../images/book/')</script>

	<!-- Mascara de Valor -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../../js/mask-number-min.js"></script>
	<script>
		$('.money').mask('#.##0,00', { reverse: true });
		$('.year').mask('0000', { reverse: false });
	</script>
</body>
</html>