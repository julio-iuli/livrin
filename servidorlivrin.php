<?php
	
	include 'conectalivrin.php';
	//$id_livro = $_REQUEST['id_livro'];
	
	$campo = 'ds_titulo';
	$tabela = 'tb_livro';
	$termo1 = 'id_livro';
	$termo2 = 2;
	
	$sql = 'SELECT ' . $campo . ' FROM ' . $tabela . ' WHERE ' . $termo1 . " = " . $termo2;
	echo $sql . '<br>';
	$res = $con->query($sql);
	var_dump($res);
	$row = $res->fetch();
	var_dump($row);
	
?>