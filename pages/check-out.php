<?php
	session_start();
	require('../server/connect.php');

	if(!isset($_SESSION['user_cli'])) {
		header('Location: ../login.php');
		exit();
	}

	$client_name = $_SESSION['user_name_cli'];
	$client_user = $_SESSION['user_cli'];
	
	$data = mysql_query("SELECT * FROM `carrinho` WHERE userCliente = '$client_user'", $con);
	$row = mysql_fetch_assoc($data);
	$total_products = mysql_num_rows($data);

	if($total_products == 0){
		header('Location: ../index.php');
		exit();
	}

	$total = 0;

	do {
		$idProduto = $row['idProduto'];
		
		$book_data = mysql_query("SELECT valor FROM `livros` WHERE id = '$idProduto'", $con);
		$book_row = mysql_fetch_assoc($book_data);

		$moneyValue = str_replace(",", ".", $book_row['valor']);
		$moneyValue = floatval($moneyValue);

		$total += $moneyValue;
	} while($row = mysql_fetch_assoc($data));

	if(($total % 1) == 0){
		$total = $total . ",00";
	} else {
		$total = str_replace(".", ",", $total);
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
	<link rel="stylesheet" href="../css/form.css">
	<link rel="stylesheet" href="../css/check-out.css">

	<title>Finalizar Pedido - SnotraBooks</title>
	<link size="25x25px" rel='shortcut icon' href="../images/favicon.ico" />
</head>
<body>
	<div id="menu">
		<header>
			<div class="logo">
				<a style="color: var(--white);" href="../index.php">SnotraBooks</a>
			</div>
			<div class="user-info">
				<a href="shopping-cart.php"><i class="fas fa-arrow-left" style="margin-right: 5px"></i> Voltar</i></a>
			</div>
		</header>
	</div>
	<div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 2rem;">
		<h1>Endereço de entrega</h1><br>
		<form style="width: 100%;">
			<div class="input-line">
				<select style="width: 30%; margin-right: 1rem;">
					<option selected disabled>Estado</option>
					<option value="AC">Acre</option>
					<option value="AL">Alagoas</option>
					<option value="AP">Amapá</option>
					<option value="AM">Amazonas</option>
					<option value="BA">Bahia</option>
					<option value="CE">Ceará</option>
					<option value="DF">Distrito Federal</option>
					<option value="ES">Espírito Santo</option>
					<option value="GO">Goiás</option>
					<option value="MA">Maranhão</option>
					<option value="MT">Mato Grosso</option>
					<option value="MS">Mato Grosso do Sul</option>
					<option value="MG">Minas Gerais</option>
					<option value="PA">Pará</option>
					<option value="PB">Paraíba</option>
					<option value="PR">Paraná</option>
					<option value="PE">Pernambuco</option>
					<option value="PI">Piauí</option>
					<option value="RJ">Rio de Janeiro</option>
					<option value="RN">Rio Grande do Norte</option>
					<option value="RS">Rio Grande do Sul</option>
					<option value="RO">Rondônia</option>
					<option value="RR">Roraima</option>
					<option value="SC">Santa Catarina</option>
					<option value="SP">São Paulo</option>
					<option value="SE">Sergipe</option>
					<option value="TO">Tocantins</option>
				</select>
				<input type="text" required placeholder="Cidade">
			</div>
			<br><br>
			<input type="text" required placeholder="Bairro"><br><br>
			<div class="input-line">
				<input type="text" style="width: 80%; margin-right: 1rem;" required placeholder="Rua">
				<input type="text" style="width: 20%;" required placeholder="n°"><br>
			</div>
			<br>
			<input type="text" placeholder="Complemento"><br><br>
		</form>
		<br><h1>Forma de pagamento</h1><br>

		<div style="display: flex; justify-content: center;">
			<label class=".container-radio" style="margin-right: 1rem;">Boleto
				<input type="radio" name="radio">
			</label>
			<label class=".container-radio">Cartão
				<input type="radio" name="radio">
			</label>
		</div>
		
		<div class="check-out">
			Você tem <?=$total_products?> produtos no valor total de R$ <?=$total?>
			<button type="button" onclick="window.location.href='check-out-exec.php'" class="confirm-request">Finalizar compra</button>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"
		integrity="sha512-M+hXwltZ3+0nFQJiVke7pqXY7VdtWW2jVG31zrml+eteTP7im25FdwtLhIBTWkaHRQyPrhO2uy8glLMHZzhFog=="
		crossorigin="anonymous">
	</script>
</body>
</html>