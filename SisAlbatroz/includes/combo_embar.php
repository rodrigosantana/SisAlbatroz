<?php
	require('../functions/funcoes.php');

	$embar = $_POST['embar'];						
	$result = select("embarcacao", "id, nome", "WHERE id='$embar'");
		for($i=0;$i<count($result);$i++){
			echo $result[$i]['nome']."<br>";
		}
?>