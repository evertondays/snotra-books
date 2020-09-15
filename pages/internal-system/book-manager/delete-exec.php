<html>
<head>
	<meta charset="utf-8">
	<title>Enviando requisição</title>
</head>
<body><h1>Aguarde um momento</h1></body>
<?php
	require('../../../server/connect.php');

	$id = mysql_real_escape_string($_GET['id']);

	// Deletando imagem do servidor
	$data = mysql_query('SELECT imagem FROM livros WHERE id = ' . $id, $con);
	$row = mysql_fetch_assoc($data);

	$imagem = $row['imagem'];
	$imagem = explode(".", $imagem);

	if($imagem[1] != 'google'){
		unlink('../../../images/book/'.$row['imagem']);
	}

	// Deletando livro do bd 
	mysql_query('DELETE FROM livros WHERE id = ' . $id, $con);


	header('Location: index.php');
	exit();
?>
</html>