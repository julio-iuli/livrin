<?php
	function criar_tabela($nome) {
		echo '
		<body>
		<h1>'. strtoupper($nome) . '</h1>
		<fieldset>
			<legend>INCLUIR '. strtoupper($nome) . '</legend>
				<form accept-charset="utf-8" method="GET">
					<input id="entrada'.$nome.'" type="text" name="novodado">
					<br><br>
					<input id = "salvar" type="button" value="Salvar">
					
					<input id="hidden'.$nome.'" type="hidden" name="muda'.$nome.'" disabled>
					<input type="hidden" name="tabela" value="'.$nome.'" >
					<input type="hidden" name="colnome" value="nome'.$nome.'" >
					
					
				</form>
			<a href="livrin2-inicial.html">VOLTAR</a>
		</fieldset>
		<table class="w3-table-all">
			<thead>
				<td></td>
				<td>'. strtoupper($nome) .'</td>
			</thead>
			<tbody>';
		
		include "conectalivrin.php";
		
		echo '
				<tr>
					<td>teste</td>
					<td>teste</td>
				</tr>
		';
		
		echo 	
			'</tbody>
		</table>
		</body>
		<script>
			$(function(){
				$("#salvar").click(function(){
					var dados = $("form").serialize();
					alert(dados);
				});
			});
		</script>
		
		
		</html>
		';
		
		
		
	}
?>