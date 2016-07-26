<?php
	include_once 'cabeca.php';
	
	
?>

	<body>
		<form>
			<label>Teste</label>
			<input type="text">
		</form>
	</body>
	<script type="text/javascript">
	$(function () {
		var dados2 = $.get("livrin_json.php?tab=editora");
		alert(dados2);
		$("input").autocomplete({
			source: dados2,
			select: function(event, ui){
				event.preventDefault();
				$(this).val(ui.item.label);
			},
			focus: function(event, ui){
				event.preventDefault();
				$(this).val(ui.item.label);
			}
		
		});
	});
		
	</script>
</html>