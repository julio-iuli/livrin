<?php
	function criar_tabela($tab) {
		echo '
		<body>
		<h1>'. strtoupper($tab) . '</h1>
		<fieldset>
			<legend>INCLUIR '. strtoupper($tab) . '</legend>
				<form accept-charset="utf-8" method="GET">
					<input id="entrada'.$tab.'" type="text" name="novodado">
					<br><br>
					<input id = "salvar" type="button" value="Salvar">
					
					<input id="hidden'.$tab.'" type="hidden" name="muda'.$tab.'" disabled>
					<input type="hidden" name="tab" value="'.$tab.'" >
					<input type="hidden" name="nometab" value="nome'.$tab.'" >
					
					
				</form>
			<a href="livrin2-inicial.html">VOLTAR</a>
		</fieldset>
		<table class="w3-table-all">
			<thead>
				<td></td>
				<td>'. strtoupper($tab) .'</td>
			</thead>
			<tbody>';
		
		include "conectalivrin.php";

		//pegando os dados no BD e colando na tabela
		$idtab = "id".$tab;
		$nometab = "nome".$tab;
		
		try {
			$query = "select " . $idtab . ", " . $nometab . " from " . $tab;
			//echo '<script type="text/javascript">alert("' . $query . '");</script>';
			$res = $con->query($query);
			//$res = $con->query('select iddono, nomedono from dono order by nomedono');
			while($row = $res->fetch(PDO::FETCH_ASSOC)) {
				echo '
						<tr>
							<td>'.$row[$idtab].'</td>
							<td>'.$row[$nometab].'</td>
						</tr>
				';
			}
		} catch(PDOException $e) {
			echo '<script type="text/javascript">alert("' . $e->getMessage() . '");</script>';
		}
		
		
		echo 	
			'</tbody>
		</table>
		</body>
		<script>
			$(function(){
				$("#salvar").click(function(){
					var dados = $("form").serialize();
					var seg = "tabela_insere.php?" + dados;
					$.get(seg, function(){
						alert("nome inserido com sucesso");
						location.reload();
					});
				});
			});
		</script>
		
		
		</html>
		';
		
		
		
	}
?>