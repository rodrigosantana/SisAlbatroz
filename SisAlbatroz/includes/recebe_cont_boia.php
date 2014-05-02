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
$lance = $_POST["lance"];
$boia = $_POST["boia"];
$data = $_POST["data"];
$hora = $_POST["hora"]; 
$tagua = $_POST["tagua"];
$prof = $_POST["prof"];
$atm = $_POST["atm"];
$lat = $_POST["lat"];
$lon = $_POST["lon"]; 
$combo = $_POST["combo"];
$cont_esp = $_POST["cont_esp"];


// Função para inserir as variáveis descritas no VALUES, na tabela GERAL, dentro das colunas determinadas

$i=0;
$elementos = count($combo);
for ($i=0; $i < $elementos; $i++){
		$query = "INSERT INTO cont_boia (cruzeiro, lance, boia_radio, data, hora, temp_agua, prof, atm, lat, lon, especie, quantidade)  
		VALUES ('$cruz', '$lance', '$boia', '$data', '$hora', '$tagua', '$atm', '$lat', '$lon', '$combo[$i]', '$cont_esp[$i]')";
		$result = mysql_query($query, $link);
	}


//var_dump($query);
//exit();


//fechando a conexão com o banco de dados
mysql_close($link);

header("location:cont_aves_boia.php");

?>