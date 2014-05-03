<?php

	session_start(); //Abre a sessão. Usado para verificar se o login foi efetuadao

	//Verifica se a variavel da sessão SESS_MEMBER_ID está presente ou não
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: ../index.php");
		exit();
	}


//Abrindo conexão com o servidor e BD
require_once('../database/conexao.php');

//Definindo as variáveis de conexão com o servidor e BD
//$cod_embar = $_POST["cod_embar"];
$cruz = $_POST["cruz"];

$data = $_POST["data"];
$hora = $_POST["hora"]; 
$lat = $_POST["lat"];
$lon = $_POST["lon"]; 
$toriline = $_POST["toriline"];
$tingida = $_POST["tingida"];
$obs = $_POST["obs"];
$lance = $_POST["lance"];

$cont_id = $_POST["cont_id"];
$cont_hora = $_POST["cont_hora"];
$cont_total = $_POST["cont_total"];
$combo = $_POST["combo"];
$cont_esp = $_POST["cont_esp"];


// Função para inserir as variáveis descritas no VALUES, na tabela GERAL, dentro das colunas determinadas
$query =
"INSERT INTO pds_base (cruzeiro, data, hora, lat, lon, toriline, tingida, obs, lance) 
	VALUES ('$cruz', '$data', '$hora', '$lat', '$lon', '$toriline', '$tingida', '$obs', '$lance')";

$result = mysql_query($query, $link);

$i=0;
$elementos = count($combo);
for ($i=0; $i < $elementos; $i++){
		$query = "INSERT INTO pds_cont (cruzeiro, cont_id, cont_hora, cont_total, especie, cont_esp) 
		VALUES ('$cruz', '$cont_id', '$cont_hora', '$cont_total', '$combo[$i]', '$cont_esp[$i]')";
		$result = mysql_query($query, $link);
	}

//fechando a conexão com o banco de dados
mysql_close($link);

header("location:pordosol.php");

?>