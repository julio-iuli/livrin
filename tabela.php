<?php
	function criar_tabela($nome) {
		echo '
		<body>
		<h1>'. strtoupper($nome) . '</h1>
		<fieldset>
			<legend>INCLUIR '. strtoupper($nome) . '</legend>
				<form accept-charset="utf-8" action="categoria.php" method="GET">
					<input id="input'.$nome.'" type="text" name="nome'.$nome.'">
					<br><br>
					<input type="submit" value="Salvar">
					<input id="hidden'.$nome.'" type="hidden" name="muda'.$nome.'" disabled>
				</form>
			<a href="livrin2-inicial.html">VOLTAR</a>
		</fieldset>
		<table class="w3-table-all">
			<thead>
				<td></td>
				<td>'. strtoupper($nome) .'</td>
			</thead>
			<tbody>
			</tbody>
		</table>
		</body>
		</html>
		';
	}
?>