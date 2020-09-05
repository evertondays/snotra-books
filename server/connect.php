<?php

require('credentials.php');

$host = "localhost";
$db = "Livraria";

$con = mysql_pconnect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($db, $con);

$mysqli = new mysqli($host, $user, $pass, $db) or die(mysqli_error());

// Formatando em utf-8
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

?>