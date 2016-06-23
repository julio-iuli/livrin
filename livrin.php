<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8" >
		<link rel="stylesheet" href="css/w3.css">
	<head>
	
	<script type="text/javascript" src="js/livrin.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		function alteraLivro(id_livro) {
			
		}
	</script>
	
	<body>
	
	<?php
		include "conectalivrin.php"; 
		
		if(isset($_REQUEST['titulo']) && $_REQUEST['titulo'] == '') {
			echo "<script>alert('falta o título');</script>";
		}
		
		if(@$_REQUEST['titulo'] != '' && $_REQUEST['nome_autor'] == '' && $_REQUEST['id_autor'] == '' ) {
			echo "<script>alert('falta o autor');</script>";
		}
		
		if(@$_REQUEST['titulo'] != '' && $_REQUEST['nome_autor'] != '' && $_REQUEST['id_autor'] == '' ) {
			//echo "insere: <br>" . $_REQUEST['titulo'] . "<br>" . $_REQUEST['nome_autor'] . $_REQUEST['dono'] ;
			$stmt = $con->prepare ("
			insert into tb_autor (ds_nome_autor) value(:nome_autor);
			insert into tb_livro (ds_titulo, tb_autor_id_autor, tb_dono_id_dono) values (:titulo, last_insert_id(), :dono);");
			$stmt->execute(array(
				':titulo'		=> $_REQUEST['titulo'], 
				':nome_autor' 	=> $_REQUEST['nome_autor'],
				':dono' 		=> $_REQUEST['dono']
			));
		}
		
		if(@$_REQUEST['titulo'] != '' && $_REQUEST['nome_autor'] == '' && $_REQUEST['id_autor'] != '' ) {
			//echo "insere: <br>" . $_REQUEST['titulo'] . "<br>" . $_REQUEST['id_autor'] . $_REQUEST['dono'];
			$stmt = $con->prepare("insert into tb_livro (ds_titulo, tb_autor_id_autor, tb_dono_id_dono) values (:titulo, :id_autor, :dono);");
			$stmt->execute(array(':titulo' => $_REQUEST['titulo'], ':id_autor' => $_REQUEST['id_autor'], ':dono' => $_REQUEST['dono']));
		}
		
		if(@$_REQUEST['titulo'] != '' && $_REQUEST['nome_autor'] != '' && $_REQUEST['id_autor'] != '' ) {
			echo "<script>alert('autor dobrado');</script>";
		}
		
		if(@$_REQUEST['action'] == 'del') {
			$stmt = $con->prepare("delete from tb_livro where id_livro = :id_livro;");
			$stmt->execute(array(':id_livro' => $_REQUEST['id_livro']));
		} 
		
		
	
	?>
	
		<div class="w3-container w3-blue">
			<h1>Inserir Livro<h1>
		</div>
		
		<form action="livrin.php" method="get" class="w3-container">
		
		<p>
			<label>Título</label>
			<input class="w3-input" type="text" name="titulo" size=100 maxlength=100>
		</p>
		
		<p>
			<label>Autor</label>
			<input class="w3-input" type="text" name="nome_autor" size=50 maxlength=50>
		</p>
		
		<p>
			<label>Autor já cadastrado</label>
			<select name="id_autor">
				<option value=""></option>
				<?php
					include "conectalivrin.php";
					$result = $con->query('select ds_nome_autor, id_autor from tb_autor order by ds_nome_autor;');
					while($row = $result->fetch()) {
						echo "<option value='" . $row['id_autor'] . "'>" . $row['ds_nome_autor'] . "</option>";
						
					}
				?>
				
			</select>
		</p>

		
		<input class="w3-radio" type="radio" name="dono" value="2" checked>
		<label class="w3-validate">Júlio</label>
		
		<input class="w3-radio" type="radio" name="dono" value="3" >
		<label class="w3-validate">Carlos</label>

		<input class="w3-radio" type="radio" name="dono" value="1" >
		<label class="w3-validate">Indefinido</label>
		
		<p>
			<input class="w3-btn" type="submit" value="Gravar">
		</p>

		</form>
		
		<br><br>
		<div class="w3-container">
			<button class="w3-btn">Voltar</button>
		</div>
		<br><br>
		<div class="w3-container w3-blue">
			<h1>Consulta dos livros<h1>
		</div>
		
		<div class="w3-container">
			<table border="1">
				<tr>
					<td> Título </td>
					<td> Autor </td>
					<td> Dono </td>
					<td> Deletar </td>
					
				</tr>
				<?php
					include "conectalivrin.php";
					$result = $con->query("
					SELECT ds_titulo as titulo, id_livro as id, ds_nome_autor as autor, ds_nome_dono as dono
					FROM 
					tb_livro, tb_autor, tb_dono 
					WHERE 
					tb_livro.tb_autor_id_autor = tb_autor.id_autor 
					AND 
					tb_livro.tb_dono_id_dono = tb_dono.id_dono 
					ORDER BY ds_titulo ;");
					
					while ($row = $result->fetch()) {
						echo "<tr>";
						echo 	"<td>" . $row['titulo'] . "</td>" . 
								"<td>" . $row['autor'] . "</td>" .
								"<td>" . $row['dono'] . "</td>" .
								"<td><a onclick=\"return confirm('Certeza?');\" href=livrin.php?action=del&id_livro=". $row['id'] . ">APAGAR</a></td>";
								"<td><a onclick=\"return confirm('Certeza?');\">ALTERAR</a></td>";
								
						echo 	"</tr>";
					}
				
				?>
			</table>				

		</div>
	</body>
</html>