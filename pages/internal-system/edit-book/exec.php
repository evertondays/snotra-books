<html>
<head>
	<meta charset="utf-8">
	<title>Enviando requisição</title>
</head>
<body><h1>Aguarde um momento</h1></body>
<?php
	require('../../../server/connect.php');

	// Pegando informações
	$id = mysql_real_escape_string($_POST['id']);
	$title = mysql_real_escape_string($_POST['title']);
	$authors = mysql_real_escape_string($_POST['authors']);
	$description = mysql_real_escape_string($_POST['description']);
	$date = mysql_real_escape_string($_POST['date']);
	$value = mysql_real_escape_string($_POST['value']);
	$category = mysql_real_escape_string($_POST['category']);

	// Lidando com a imagem
	$imgFile = $_FILES['img-file']['tmp_name'];

	if ($imgFile != null) {
		echo "oi";
		// Deletando imagem do BD (se tiver)
		$data = mysql_query('SELECT imagem FROM livros WHERE id = ' . $id, $con);
		$row = mysql_fetch_assoc($data);
	
		$imagem = $row['imagem'];
		$imagem = explode(".", $imagem);
	
		if($imagem[1] != 'google'){
			unlink('../../../images/book/'.$row['imagem']);
		}
		// Fim do delete

		$file_tmp = $_FILES['img-file']['tmp_name'];
		$name = $_FILES['img-file']['name'];
	
		$extension = pathinfo($name, PATHINFO_EXTENSION);
		$extension = strtolower($extension);

		// Verificando tentativa de invasão pela imagem
		$allowed = False;
		$extensionAllowed = array('png', 'jpg', 'jpeg', 'gif');

		for ($i = 0; $i < count($extensionAllowed); $i++){
			if ($extension == $extensionAllowed[$i]){
				$allowed = True;
			}
		}

		if(!$allowed){
			header('Location: index.php?error=ImagemNotAllowed');
			exit();
		}

		// Enviando para o servidor
		$imgName = uniqid(time()) . '.' . $extension;
		$destiny = '../../../images/book/' . $imgName;

		move_uploaded_file($file_tmp, $destiny);

		$query = " UPDATE `livros` SET imagem = '$imgName' WHERE `id` = '$id'";
		mysql_query($query, $con);
	}

	$query = " UPDATE `livros` 
			   SET titulo = '$title', autores = '$authors', descricao = '$description', 
			   ano ='$date', valor = '$value', categoria = '$category'
			   WHERE id = '$id'
	";
	mysql_query($query, $con);

	/*header('Location: ../book-manager/');
	exit();*/

?>
</html>