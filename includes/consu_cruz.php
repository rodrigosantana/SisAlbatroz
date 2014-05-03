<?php
	require('../functions/funcoes.php');
	require('../database/conexao.php');

$obser = $_POST['obser'];
$embar = $_POST['embar'];
$datas = $_POST['datas'];
$datac = $_POST['datac'];
$result = mysql_query("SELECT viagem, cod_obser, cod_embar, data_saida, data_chegada FROM geral 
						WHERE cod_obser='$obser' AND cod_embar='$embar' AND data_saida='$datas' AND data_chegada='$datac' ");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}

while ($row = mysql_fetch_array($result)) {
	echo $row['viagem']."<br>";
}

?>

