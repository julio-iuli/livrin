<?php
	$a1 = $_REQUEST['tab'];
	$a2 = $_REQUEST['nometab'];
	$a3 = $_REQUEST['novodado'];
	
	$query = "INSERT INTO " . $a1 . "(" . $a2 . ") value ('" . $a3 . "');";
	include_once 'conectalivrin.php';
	try {
		$con->query($query);
	} catch (PDOException $e) {
			echo '<script type="text/javascript">alert("' . $e->getMessage() . '");</script>';
	}
		
	
?>