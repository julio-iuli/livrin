<?php
	function trata_autocomplete ($input){
		echo "
		<script type='text/javascript'>
		$(function () {
			$('#input$input').keypress(function () {
				$('#input${input}hidden').val('');
			});
			$.get('livrin_json.php?tab=$input', function(data){
				$('#input$input').autocomplete({
					source: JSON.parse(data),
					select: function(event, ui){
						event.preventDefault();
						$(this).val(ui.item.label);
						$('#input${input}hidden').val(ui.item.value);
					},
					focus: function(event, ui){					
						$(this).val(ui.item.label);
					}		
				});	
			});		
		});		
		</script>
		";
	}
?>