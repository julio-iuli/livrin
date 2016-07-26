<?php
	header('Content-Type: text/html; charset=utf-8');
	$tab = $_REQUEST['tab'];
	function dados_json($tab) {
		include_once 'conectalivrin.php';		
		$query = "select nome$tab as label, id$tab as value from $tab order by nome$tab"; 
		try {
			$res = $con->query($query);
			$array = array();
			while($row = $res->fetch(PDO::FETCH_ASSOC)) {
				$array[] = $row;
			}
			return json_encode($array);
		} catch (PDOException $e) {
			echo "<script type='text/javscript'> alert($e);</script>";
		}
	}
	
	echo dados_json($tab);
?>