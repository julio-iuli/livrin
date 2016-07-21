<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1; text/html; charset=utf-8" charset="UTF-8" >
		<link rel="stylesheet" href="css/w3.css">
	<head>
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.12.0/jquery-ui.min.js"></script>	
	<link rel="stylesheet" href="js/jquery-ui-1.12.0/jquery-ui.min.css">
	<script type="text/javascript">
		var dados;
		$(function(){
			$("#gravar").click(function(){
				dados = $("#formlivro").serialize();
				if(confirm(dados)){
					var envio = "servidorlivrin.php?" + dados;
					$.get(envio, function(data){
						alert(data);
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
			<input id="inputeditorarhidden" type="hidden" name="ideditora">
		</p>
		
		<p>
			<label>Ano</label>
			<input id="inputautor" class="w3-input" type="text" name="anopublicacao" size=100 maxlength=255>			
		</p>
		
		<input class="w3-radio" type="radio" name="iddono" value="1" checked>
		<label class="w3-validate">Júlio</label>
		
		<input class="w3-radio" type="radio" name="iddono" value="2" >
		<label class="w3-validate">Carlos</label>

		<input class="w3-radio" type="radio" name="iddono" value="" >
		<label class="w3-validate">Indefinido</label>
		
		<p><input id="gravar" class="w3-btn" value="GRAVAR LIVRO"></p>
		<p><a class="w3-btn" href="livrinconsulta">CONSULTA</a></p>
		<p><a class="w3-btn" href="livrin2-inicial.html">VOLTAR</a></p>


		</form>
		
		
	</body>
</html>
