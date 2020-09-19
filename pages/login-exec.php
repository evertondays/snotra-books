<?php
session_start();
require('../server/connect.php');
 
if(empty($_POST['user']) || empty($_POST['pass'])) {
	header('Location: login.php');
	exit();
}
 
$user = mysql_real_escape_string($_POST['user']);
$pass = mysql_real_escape_string($_POST['pass']);
$query = "select * from clientes where usuario = '{$user}' and senha = md5('{$pass}')";
 
$result = mysql_query($query, $con);
$row = mysql_num_rows($result);

if($row == 1) {
	$_SESSION['user_cli'] = $user;

	$row = mysql_fetch_assoc($result);
	$_SESSION['user_name_cli'] = $row['nome'];

	header('Location: ../index.php');
	exit();
} else {
	$_SESSION['not_authenticator'] = true;
	header('Location: login.php');
	exit();
}
?>