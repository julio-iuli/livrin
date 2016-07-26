<?php
header('Content-Type: text/html; charset=utf-8');
echo '
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8" >
		<link rel="stylesheet" href="css/w3.css">
	</head>
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>	
	<link rel="stylesheet" href="js/jquery-ui.min.css">
	<script type="text/javascript">
		$(function(){
			$("body").addClass("w3-container");
			$("h1").addClass("w3-container w3-blue w3-animate-zoom");
			$("a, #salvar").addClass("w3-btn");
		});
	</script>

';
?>