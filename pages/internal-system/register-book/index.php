<!doctype html>
<html lang="pt-br">
<head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="../../../css/global.css">
	<link rel="stylesheet" href="../../../css/register-book.css">
	<link rel="stylesheet" href="../../../css/menu-system.css">

	<title>Cadastro de Livros - SnotraBooks</title>
</head>
<body>

	<?php include('../../../models/menu-system.php')?>

	<div class="register-wrapper">
		<div class="exit-button">
			<i class="fas fa-times"></i>
		</div>

		<form class="register" method="post" action="exec.php" enctype="multipart/form-data" autocomplete="off">
			<label id="first-label" for="input-title">Título</label>
			<input id="input-title" name="title" type="text" required>

			<label for="input-authors">Autores</label>
			<input id="input-authors" name="authors" type="text" required>

			<label for="input-description">Descrição</label>
			<textarea id="input-description" name="description" rows="5" type="text" required></textarea>

			<label for="input-date">Ano de lançamento</label>
			<input id="input-date" name="date" class="year" type="text" required>

			<label for="input-category">Categoria</label>
			<select id="input-category" name="category" required>
				<option selected disabled>Selecione uma opção</option>
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

			<label for="input-value">Valor</label>
			<input id="input-value" name="value" class="money" type="text" required>

			<label for="input-value">Inserir imagem própria</label>
			<input id="input-file" name="img-file" type="file" accept="image/*" style="border: none;">
			<input type="hidden" id="input-img-url" name="img-url">

			<button class="register-button" type="submit">Confirmar cadastro!</button>
		</form>
	</div>

	<div class="container">
		<div class="search-box" method="get">
			<input class="input-search" type="text" id="search-book-api" placeholder="Pesquise aqui" autocomplete="off" />
		</div>
		<small>ou</small>
		<button id="manual-register"  onclick="return showRegisterDivByUser()">Cadastrar manualmente</button>
		
		<div class="books"></div>
	</div>

	<!-- JS da Página -->
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script type="text/javascript" src="../../../js/api-key.js"></script>
	<script type="text/javascript" src="../../../js/search-api.js"></script>
	<script type="text/javascript" src="../../../js/register-book.js"></script>

	<!-- Mascara de Valor -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../../js/mask-number-min.js"></script>
	<script>
		$('.money').mask('#.##0,00', { reverse: true });
		$('.year').mask('0000', { reverse: false });
	</script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"
		integrity="sha512-M+hXwltZ3+0nFQJiVke7pqXY7VdtWW2jVG31zrml+eteTP7im25FdwtLhIBTWkaHRQyPrhO2uy8glLMHZzhFog=="
		crossorigin="anonymous">
	</script>

	<!-- Aviso de Erro -->
	<script type="text/javascript">
		let pageUrl = window.location.href;
		let split = pageUrl.split('=');
		let error = split[1];

		if (error == 'NoUrlImage'){
			alert('Não existe nenhuma imagem');

		} else if (error == 'ImagemNotAllowed') {
			alert('Imagem não permitida');

		} else if (error == 'NoCategory') {
			alert('É preciso escolher uma categoria para cadastrar um livro');

		} else if (error == 'none'){
			alert('Cadastro realizado com sucesso');
			
		} else {
			console.log('Sem erros');
		}

	</script>
</body>
</html>