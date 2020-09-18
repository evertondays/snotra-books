<?php 
	session_start();
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
	<link rel="stylesheet" href="../css/global.css">
	<link rel="stylesheet" href="../css/login.css">
	<link rel="stylesheet" href="../css/form.css">

	<title>Cadastro - SnotraBooks</title>
	<link size="25x25px" rel='shortcut icon' href="../../images/favicon.ico" />
</head>
<body style="background-image: url('../images/wallpaper-2.jpg') !important;">
	<div class="container">
		<div class="login-wrapper">
			<h1>Cadastro</h1>
			<form action="register-exec.php" method="post" autocomplete="off">
			<div class="input-group">
					<label for="name">Nome:</label>
					<input id="name" name="name" type="text" required>
				</div>
				<div class="input-group">
					<label for="user">Usuário:</label>
					<input id="user" name="user" type="text" required>
				</div>
				<div class="input-group">
					<label for="pass">Senha:</label>
					<input id="pass" name="pass" type="password" required>
				</div>
				
				<button type="submit" class="btn">Cadastrar</button>
			</form>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"
		integrity="sha512-M+hXwltZ3+0nFQJiVke7pqXY7VdtWW2jVG31zrml+eteTP7im25FdwtLhIBTWkaHRQyPrhO2uy8glLMHZzhFog=="
		crossorigin="anonymous">
	</script>
</body>
</html>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"
		integrity="sha512-M+hXwltZ3+0nFQJiVke7pqXY7VdtWW2jVG31zrml+eteTP7im25FdwtLhIBTWkaHRQyPrhO2uy8glLMHZzhFog=="
		crossorigin="anonymous">
	</script>
</body>
</html>