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
// Dados gerais
$respo = $_POST["respo"];
$data = $_POST["data"]; 
$empresa = $_POST["comboEmpresa"];
$estado = $_POST["estado"]; 
$cidade = $_POST["cidade"];
$barco = $_POST["comboBarco"];
$porto_saida = $_POST["porto_saida"];
$data_saida = $_POST["data_saida"];
$hora_saida = $_POST["hora_saida"];
$data_chegada = $_POST["data_chegada"];
$hora_chegada = $_POST["hora_chegada"];
$dias_mar = $_POST["dias_mar"];
$dias_pesca = $_POST["dias_pesca"];
$petrecho = $_POST["comboPetrecho"];

//Area de pesca
$area_pesca = $_POST["area_pesca"];
$prof_ini = $_POST["prof_ini"];
$prof_fin = $_POST["prof_fin"];

//Petrechos
//Espinhel pelágico
$esp_p_qtd = $_POST["esp_p_qtd"];
$esp_p_lances_dia = $_POST["esp_p_lances_dia"];
$esp_p_hora_ini_lan = $_POST["esp_p_hora_ini_lan"];
$esp_p_hora_fin_lan = $_POST["esp_p_hora_fin_lan"];
$esp_p_hora_ini_rec = $_POST["esp_p_hora_ini_rec"];
$esp_p_hora_fin_rec = $_POST["esp_p_hora_fin_rec"];
$esp_p_tori = $_POST["esp_p_tori"];
$esp_p_listk = $_POST["esp_p_listk"];

//Espinhel de superfície
$esp_s_qtd = $_POST["esp_s_qtd"];
$esp_s_lances_dia = $_POST["esp_s_lances_dia"];
$esp_s_hora_ini_lan = $_POST["esp_s_hora_ini_lan"];
$esp_s_hora_fin_lan = $_POST["esp_s_hora_fin_lan"];
$esp_s_hora_ini_rec = $_POST["esp_s_hora_ini_rec"];
$esp_s_hora_fin_rec = $_POST["esp_s_hora_fin_rec"];
$esp_s_tori = $_POST["esp_s_tori"];

//Espinhel de fundo



$mm_uso = $_POST["mm_uso"];
$mm_uso = $_POST["mm_uso"];
$mm_uso = $_POST["mm_uso"];



var_dump($_POST);
exit();

$query = "INSERT INTO
	entrevista_geral
		(embarcacao, mestre, data_saida, data_chegada, obs)
	VALUES
		('$embarcacao', '$mestre', '$data_saida', '$data_chegada', '$obs')";
$result = mysql_query($query, $link);
$id_mb = mysql_insert_id();
//var_dump($id_mb);


mysql_close($link);

header("location:entrev_cais.php");

?>