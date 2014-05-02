<?php
	require('../functions/funcoes.php');

	$obser = $_POST['obser'];						
	$result = select("observador", "id, nome", "WHERE id='$obser'");
		for($i=0;$i<count($result);$i++){
			echo $result[$i]['nome']."<br>";
		}
?>