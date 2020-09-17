<?php
session_start();
if(!$_SESSION['user']) {
	header('Location: ../../pages/internal-system/login.php');
	exit();
}
?>