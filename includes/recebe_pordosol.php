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
//$cod_cruz = $_POST["cod_cruz"];
$data = $_POST["data"];
$pds_hora = $_POST["pds_hora"]; 
$lat = $_POST["lat"];
$lon = $_POST["lon"]; 
$tor = $_POST["tor"];
$tingida = $_POST["tingida"];
$obs = $_POST["obs"];
$lance = $_POST["lance"];

$cont_id = $_POST["cont_id"];
$cont_hora = $_POST["cont_hora"];
$cont_total = $_POST["cont_total"];
$especie = $_POST["especie"];
$esp_cont = $_POST["esp_cont"];


// Função para inserir as variáveis descritas no VALUES, na tabela GERAL, dentro das colunas determinadas
$query = "INSERT INTO pds_base (data, pds_hora, lat, lon, toriline, isca_tingida, obs, lance) VALUES ('$data', '$pds_hora', '$lat', '$lon', '$tor', '$tingida', '$obs', '$lance')";
$result = mysql_query($query, $link);

$query = "INSERT INTO pds_base ("




//mysql_error();
//var_dump($result);

 
//fechando a conexão com o banco de dados
mysql_close($link);

header("location:pordosol.php");

?>