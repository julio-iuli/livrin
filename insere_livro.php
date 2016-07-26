<?php
	foreach($_REQUEST as $pos => $n){
		if($n == ''){$n = null;}
		${$pos} = $n;
		//echo "$pos => $n \n";
	}

// resolver quando a gente passa uma editora em branco, fica null, ele vai entender como editora nova
	if($titulo==null) {
		echo "Campo de Título vazio!";
	} else	

	if(($idautor == null) && ($ideditora == null) ) {
		echo "autor e editora novos";
		
	} else
	
	if(($idautor != null) && ($ideditora == null) ) {
		echo "editora nova ou null";
	} else
	
	if(($idautor == null) && ($ideditora != null)) {
		echo "autor novo";
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
?>

