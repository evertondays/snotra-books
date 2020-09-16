<?php
	require('../../../server/connect.php');

	$data = mysql_query('SELECT id, titulo, imagem, valor FROM livros', $con) or die(mysql_error());
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

	<!-- CSS -->
	<link rel="stylesheet" href="../../../css/global.css">
	<link rel="stylesheet" href="../../../css/manager-table.css">
	<link rel="stylesheet" href="../../../css/menu-system.css">

	<title>Controle de Livros - SnotraBooks</title>
</head>
<body>

	<?php include('../../../models/menu-system.php')?>

	<div class="container">
		<table class="book-table">
			<thead>
				<tr>
					<th>#</th>
					<th class="table-img">Imagem</th>
					<th>Título</th>
					<th class="table-value">Valor</th>
					<th>Editar</th>
					<th>Deletar</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				if($total > 0) {
					do {
			?>
						<tr>
							<th><?=$row['id']?></th>
							<th class="table-img"><img class="book-img" src="<?=$row['imagem']?>"></th>
							<th><?=$row['titulo']?></th>
							<th class="table-value">R$ <?=$row['valor']?></th>
							<th><button class="edit button" onclick="window.location.href='../edit-book/index.php?id=<?=$row['id']?>'"><i class="fas fa-cog"></i></button></th>

							<th>
								<a href="delete-exec.php?id=<?=$row['id']?>" 
									onclick="return confirmExclusion('<?=$row['titulo']?>')">

									<button class="delete button"><i class="fas fa-trash-alt"></i></button>
								</a>
							</th>
						</tr>
				<?php
					}while($row = mysql_fetch_assoc($data));
				}
			?>
			</tbody>
		</table>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"
		integrity="sha512-M+hXwltZ3+0nFQJiVke7pqXY7VdtWW2jVG31zrml+eteTP7im25FdwtLhIBTWkaHRQyPrhO2uy8glLMHZzhFog=="
		crossorigin="anonymous">
	</script>
	<script src="../../../js/referencing-image.js"></script>
	<script src="../../../js/confim-exclusion.js"></script>
	<script>referencingImage('../../../images/book/')</script>
</body>
</html>