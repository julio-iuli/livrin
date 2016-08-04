<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
		<link rel="stylesheet" href="css/w3.css">
	<head>
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>	
	<link rel="stylesheet" href="js/jquery-ui.css">
	<script type="text/javascript">
		var dados;
		$(function(){
			$("#gravar").click(function(){
				dados = $("#formlivro").serialize();
				if(confirm(dados)){
					var envio = "insere_livro.php?" + dados;
					$.get(envio, function(data){
						alert(data);
						location.reload();
						$("#formlivro").trigger('reset');
					});
					
				} else {
					alert('não gravar');
				}
			});
			
		});
	</script>
	
	<body class="w3-container">
	
		<div class="w3-container w3-blue w3-animate-zoom">
			<h1>Inserir Livro<h1>
		</div>
		
		<form id="formlivro" accept-charset='utf-8' method="get" class="w3-container">
		
		<p>
			<label>Título</label>
			<input id="inputtitulo" class="w3-input" type="text" name="titulo" size=100 maxlength=255>
		</p>
		
		<p>
			<label>Autor</label>
			<input id="inputautor" class="w3-input" type="text" name="nomeautor" size=100 maxlength=255>
			<input id="inputautorhidden" type="hidden" name="idautor">
		</p>
		
		<p>
			<label>Editora</label>
			<input id="inputeditora" class="w3-input" type="text" name="nomeeditora" size=100 maxlength=255>
			<input id="inputeditorahidden" type="hidden" name="ideditora">
		</p>
		
		<p>
			<label>Ano</label>
			<input id="inputautor" class="w3-input" type="text" name="anopublicacao" size=100 maxlength=255>			
		</p>
		<?php
			include_once 'conectalivrin.php';
			$res = $con->query("SELECT iddono, nomedono FROM dono");
			while($row = $res->fetch(PDO::FETCH_ASSOC)){
				echo "<input class='w3-radio' type='radio' name='iddono' value='".$row['iddono']."'";
				if($row['nomedono']=="Julio"){echo "checked";};
				echo ">
				<label class='w3-validate'>".$row['nomedono']."</label> ";
			}
		?>

		<input class="w3-radio" type="radio" name="iddono" value="" >
		<label class="w3-validate">Indefinido</label>
		
		<p><input id="gravar" class="w3-btn" value="GRAVAR LIVRO"></p>
		<p><a class="w3-btn" href="livrinconsulta">CONSULTA</a></p>
		<p><a class="w3-btn" href="index.html">VOLTAR</a></p>


		</form>
		
		
	</body>
	<?php
		include_once 'trata_autocomplete.php';
		trata_autocomplete('editora');
		trata_autocomplete('autor');
	?>
</html>
