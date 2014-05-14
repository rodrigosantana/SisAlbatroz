<?php

	session_start(); //Abre a sessão. Usado para verificar se o login foi efetuadao

	//Verifica se a variavel da sessão SESS_MEMBER_ID está presente ou não
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: ../index.php");
		exit();
	}


//Abrindo conexão com o servidor e BD
require_once('../database/conexao.php');

//print_r($_POST); // retorna as variáveis que foram enviadas através de POST.


//Definindo as variáveis de conexão com o servidor e BD
$embarcacao = $_POST["comboBarco"];
$mestre = $_POST["comboMestre"]; 
$data_saida = $_POST["data_saida"];
$data_chegada = $_POST["data_chegada"]; 
$obs = $_POST["obs"];
$data_lance = $_POST["data_lance"];
$lance = $_POST["lance"];
$lat = $_POST["lat"];
$lon = $_POST["lon"];
$anzol = $_POST["anzol"];
$isca = $_POST["combo"];
$hora_lan = $_POST["hora_lan"];
$hora_rec = $_POST["hora_rec"];
$ave_capt = $_POST["ave_capt"];
$medida_metiga = $_POST["medida_metiga"];
$mm_uso = $_POST["mm_uso"];

var_dump($_POST);
exit();

$query = "INSERT INTO
	mapa_bordo_geral
		(embarcacao, mestre, data_saida, data_chegada, obs)
	VALUES
		('$embarcacao', '$mestre', '$data_saida', '$data_chegada', '$obs')";
$result = mysql_query($query, $link);
$id_mb = mysql_insert_id();
//var_dump($id_mb);


$i=0;
$elements = count($lance);
while ($i < $elements) {
	$query = "INSERT INTO 
		mapa_bordo_lance 
			(id_mb, lance, data_lance, lat, lon, anzol, isca, hora_lan, hora_rec, ave_capt, mm_uso)
		VALUES 
			('$id_mb', '$lance[$i]', '$data_lance[$i]', '$lat[$i]', '$lon[$i]', '$anzol[$i]', '$isca[$i]', '$hora_lan[$i]', '$hora_rec[$i]',
			'$ave_capt[$i]', '$mm_uso[$i]')";
	$result = mysql_query($query, $link);

	$y = 0;
	$elements2 = count($checkbox);
	while ( $y < $elements2) {
		$query = "INSERT INTO mapa_bordo_mm (id_mb, lance, mm)
				VALUES ('$id_mb', '$lance[$y]', '$medida_metiga[$y]')";
		$result = mysql_query($query, $link);

	$y++;
	}
$i++;
}

/*
$y=0;
	$elementos2 = count($medida_metiga);
	for ($y=0; $y < $elementos2; $y++) {
		$query = "INSERT INTO mapa_bordo_mm (id_mb, lance, mm)
				VALUES ('$id_mb', '$lance[$y]', '$medida_metiga[$y]')";
			$result = mysql_query($query, $link);
	
	}
*/
	

/*
//var_dump($lance);
$i=0;
$elementos = count($lance);
//$elementos2 = count($medida_metiga);
//var_dump($elementos);
for ($i=0; $i < $elementos; $i++){
	// Função para inserir as variáveis descritas no VALUES, na tabela GERAL, dentro das colunas determinadas
	$query = "INSERT INTO 
		mapa_bordo_lance 
			(id_mb, lance, data_lance, lat, lon, anzol, isca, hora_lan, hora_rec, ave_capt, mm_uso)
		VALUES 
			('$id_mb', '$lance[$i]', '$data_lance[$i]', '$lat[$i]', '$lon[$i]', '$anzol[$i]', '$isca[$i]', '$hora_lan[$i]', '$hora_rec[$i]',
			'$ave_capt[$i]', '$mm_uso[$i]')";
	$result = mysql_query($query, $link);

	
	for ($i=0; $i < $elementos2; $i++){
			$query = "INSERT INTO mapa_bordo_mm (id_mb, lance, mm)
				VALUES ('$id_mb', '$lance[$i]', '$medida_metiga[$i]')";
			$result = mysql_query($query, $link);
	}	
	
}
*/


//var_dump($i);
//fechando a conexão com o banco de dados
mysql_close($link);

exit();
header("location:mapa_bordo.php");

?>

       