<?php
	foreach($_REQUEST as $pos => $n){
		if($n == ''){$n = null;}
		${$pos} = $n;
		//echo "$pos => $n \n";
	}
	
	if($titulo == null) {
		echo "Campo de Título vazio!";
	} else if($nomeautor == null) {
		echo "Autor inválido";
	} else {
		include_once 'conectalivrin.php';
		
		// trata anopublicacao e dono
		$anopublicacao = ($anopublicacao == null) ? 'null' : $anopublicacao;
		$iddono = ($iddono == null) ? 'null' : $iddono;
		
		// trata autor:
		if($idautor==null) {
			$con->query("INSERT INTO autor(nomeautor) value ('$nomeautor');");
			$idautor = $con->lastInsertId();
		}
		
		// trata editora:
		if($ideditora == null && $nomeeditora != null) {
			$con->query("INSERT INTO editora(nomeeditora) value ('$nomeeditora')");
			$ideditora = $con->lastInsertId();
		} else {
			$ideditora = ($ideditora==null) ? 'null' : $ideditora;
		}
		
		$query = "INSERT INTO livro(titulo, autor_idautor, editora_ideditora, anopublicacao, dono_iddono) VALUE ('$titulo', $idautor, $ideditora, $anopublicacao, $iddono);";
		try {
			$con->query($query);
			echo "dados do livro salvos! \n $query";
		} catch (PDOException $e){
			echo $e->getMessage();
		}
		
	}
/*
// resolver quando a gente passa uma editora em branco, fica null, ele vai entender como editora nova
	if($titulo==null) {
		echo "Campo de Título vazio!";
	} else	

	if(($idautor == null) && ($ideditora == null) ) {
		echo "autor e editora nova ou null \n ";
		$anopublicacao = ($anopublicacao==null) ? 'null' : $anopublicacao;
		$iddono = ($iddono==null) ? 'null' : $iddono;
		$tratoeditora = ($nomeeditora==null) ? "set @editoranova := null;" : "INSERT INTO editora(nomeeditora) value('$nomeeditora'); @ideditoranova := last_insert_id();";
		$query = "INSERT INTO autor(nomeautor) value('$nomeautor'); set @idautornovo := last_insert_id(); $tratoeditora INSERT INTO livro(titulo, autor_idautor, editora_ideditora, anopublicacao, dono_iddono) value('$titulo', @idautornovo, @ideditoranova, $anopublicacao, $iddono);";
		echo $query;
		
	} else
	
	if(($idautor != null) && ($ideditora == null) ) {
		echo "autor já registrado e editora nova ou null";
	} else
	
	if(($idautor == null) && ($ideditora != null)) {
		echo "autor novo e editora já registrada";
	} else
	
	if(($idautor != null) && ($ideditora != null)) {
		//echo "autor e editora já existentes no banco de dados \n";
		$anopublicacao = ($anopublicacao==null) ? 'null' : $anopublicacao;
		$iddono = ($iddono==null) ? 'null' : $iddono;
		$query = "insert into livro(titulo, autor_idautor, editora_ideditora, anopublicacao, dono_iddono) value('$titulo', $idautor, $ideditora, $anopublicacao, $iddono);";
		//echo $query;
		try{
			include_once 'conectalivrin.php';
			if($con->query($query)){echo 'dados salvos com sucesso!!';}			
		} catch (PDOException $e){
			echo $e->getMessage();
		}
	}
*/
?>

