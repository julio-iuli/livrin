<?php
	header('Content-Type: text/html; charset=utf-8');
	$username = "aluno";
	$password = "123";
	try {
		$con = new PDO('mysql:host=localhost;dbname=livrin2', $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "conexão feita <br>";
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
	
?>
