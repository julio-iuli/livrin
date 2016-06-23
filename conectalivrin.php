<?php
		$username = "aluno";
		$password = "123";
		try {
			$con = new PDO('mysql:host=localhost;dbname=livrin', $username, $password);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "conexão feita <br>";
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	
?>