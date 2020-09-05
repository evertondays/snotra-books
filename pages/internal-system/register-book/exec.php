<html>
<head>
	<meta charset="utf-8">
	<title>Enviando requisição</title>
</head>
<body><h1>Aguarde um momento</h1></body>
<?php
	//error_reporting(0)
	require('../../../server/connect.php');

	// Pegando informações
	$title = mysql_real_escape_string($_POST['title']);
	$authors = mysql_real_escape_string($_POST['authors']);
	$description = mysql_real_escape_string($_POST['description']);
	$date = mysql_real_escape_string($_POST['date']);
	$value = mysql_real_escape_string($_POST['value']);

	// Verificando se a categoria existente
	if(isset($_POST['category']))
	{
		$category = mysql_real_escape_string($_POST['category']);
	} else {
		header('Location: index.php?error=NoCategory');
		exit();
	}

	// Lidando com a imagem
	$imgFile = $_FILES['img-file']['tmp_name'];

	if ($imgFile != null) {
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
	} else {
		if($_POST['img-url'] != 'undefined') {
			$imgName = mysql_real_escape_string($_POST['img-url']);

		} else {
			header('Location: index.php?error=NoUrlImage');
			exit();
		}
	}

	$queryDados = " INSERT INTO `livros` (`titulo`, `autores`, `descricao`, `ano`, `categoria`, `valor`, `imagem`)
				    VALUES ('$title', '$authors', '$description', '$date', '$category', '$value', '$imgName')
	";
	mysql_query($queryDados, $con);

	header('Location: index.php?error=none');
	exit();
?>
</html>
