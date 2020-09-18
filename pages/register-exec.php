<?php
require('../server/connect.php');

$name = mysql_real_escape_string($_POST['name']);
$user = mysql_real_escape_string($_POST['user']);
$pass = md5(mysql_real_escape_string($_POST['pass']));

$query = "INSERT INTO clientes (`nome`, `usuario`, `senha`) VALUES ('$name', '$user', '$pass')";
mysql_query($query, $con);

echo $name . ' ' .  $user . ' ' . $pass;

header('Location: ../index.php');
exit();

?>