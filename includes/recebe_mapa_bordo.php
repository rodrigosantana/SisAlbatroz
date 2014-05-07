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
$isca = $_POST["comboIsca"];
$hora_lan = $_POST["hora_lan"];
$hora_rec = $_POST["hora_rec"];
$ave_capt = $_POST["ave_capt"];
$medida_metiga = $_POST["medida_metiga"];
$mm_uso = $_POST["mm_uso"];


$query = "INSERT INTO
	mapa_bordo_geral
		(embarcacao, mestre, data_saida, data_chegada, obs)
	VALUES
		('$embarcacao', '$mestre', '$data_saida', '$data_chegada', '$obs')";
$result = mysql_query($query, $link);

//Consulta ao banco para retorar o id_mb que a entrada anterior acabou de receber automaticamente do banco de dados
$sql = "SELECT id_mb FROM mapa_bordo_geral 
	WHERE embarcacao='$embarcacao' 
	AND mestre='$mestre' 
	AND data_saida='$data_saida'
	AND data_chegada='$data_chegada'";

$rs = mysql_query($sql, $link);
$rs2 = mysql_fetch_array($rs);
$id_mb = $rs2['id_mb'];


// Função para inserir as variáveis descritas no VALUES, na tabela GERAL, dentro das colunas determinadas
$query = "INSERT INTO 
	mapa_bordo_lance 
		(id_mb, lance, data_lance, lat, lon, anzol, isca, hora_lan, hora_rec, ave_capt, mm_uso)
	VALUES 
		('$id_mb', '$lance', '$data_lance',  '$lat', '$lon', '$anzol', '$isca', '$hora_lan', '$hora_rec', 
		'$ave_capt', '$mm_uso')";

$result = mysql_query($query, $link);


$i=0;
$elementos = count($medida_metiga);
for ($i=0; $i < $elementos; $i++){
		$query = "INSERT INTO mapa_bordo_mm (id_mb, lance, mm)
			VALUES ('$id_mb', '$lance', '$medida_metiga[$i]')";
		$result = mysql_query($query, $link);
	}

//fechando a conexão com o banco de dados
mysql_close($link);

//var_dump($query);
exit;

header("location:barco.php");

?>

       