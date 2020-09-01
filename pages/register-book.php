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
	<link rel="stylesheet" href="../css/global.css">
	<link rel="stylesheet" href="../css/register-book.css">

	<title>Hello, world!</title>
</head>
<body>
	<div class="register-wrapper">
		<div class="exit-button">
			<i class="fas fa-times"></i>
		</div>

		<form class="register" action="" autocomplete="off">
			<label id="first-label" for="input-title">Título</label>
			<input id="input-title" type="text">

			<label for="input-authors">Autores</label>
			<input id="input-authors" type="text">

			<label for="input-description">Descrição</label>
			<textarea id="input-description" rows="3" type="text"></textarea>

			<label for="input-date">Ano de lançamento</label>
			<input id="input-date" class="year" type="text">

			<label for="input-category">Categoria</label>
			<select id="input-category">
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
				<option value="Ficção Ciêntifica">Ficção Ciêntifica</option>
				<option value="Ficção Histórica">Ficção Histórica</option>
				<option value="Hístoria">Hístoria</option>
				<option value="Horror">Horror</option>
				<option value="Infantojuvenil">Infantojuvenil</option>
				<option value="Infantil">Infantil</option>
				<option value="Romance">Romance</option>
			</select>

			<label for="input-value">Valor</label>
			<input id="input-value" class="money" type="text">

			<button class="register-button" type="submit">Confirmar cadastro!</button>
		</form>
	</div>

	<div class="container">
		<input class="input-search" type="text" id="search-book-api" />
		<div class="books">
			<div id="book-1" class="book">
				<div class="image-div">
					<img src="../images/livro.jpg" class="img-livro">
				</div>
				<div class="infos">
					<h1>Harry Potter</h1>
					<h2>Lucas Hernandes</h2>
					<div class="description">oi</div>
					<div class="date">2004</div>
					<div class="button-div">
						<button class="pre-register" onclick="return showRegisterDivByAPI('book-1')">Cadastrar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- JS da Página -->
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>>
	<script type="text/javascript" src="../js/api-key.js"></script>
	<script type="text/javascript" src="../js/search-api.js"></script>
	<script type="text/javascript" src="../js/register-book.js"></script>

	<!-- Mascara de Valor -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/mask-number-min.js"></script>
	<script>
		$('.money').mask('#.##0,00', { reverse: true });
		$('.year').mask('####', { reverse: false });
		
	</script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"
		integrity="sha512-M+hXwltZ3+0nFQJiVke7pqXY7VdtWW2jVG31zrml+eteTP7im25FdwtLhIBTWkaHRQyPrhO2uy8glLMHZzhFog=="
		crossorigin="anonymous">
	</script>
</body>
</html>