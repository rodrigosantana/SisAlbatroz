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
$lance = $_POST["lance"];
$data = $_POST["data"];
$combo = $_POST["combo"];
$etiqueta = $_POST["etiqueta"]; 
$boia = $_POST["boia"];
$quant = $_POST["quant"]; 
$lat = $_POST["lat"];
$lon = $_POST["lon"];

$i=0;
$elementos = count($lance);
for ($i=0; $i < $elementos; $i++){
		$query = "INSERT INTO capt_incidental (lance, data, especie, etiqueta, boia_radio, quantidade, lat, lon) 
			VALUES ('$lance[$i]', '$data[$i]', '$combo[$i]', '$etiqueta[$i]', '$boia[$i]', '$quant[$i]', '$lat[$i]', '$lon[$i]')";
		$result = mysql_query($query, $link);
	}

var_dump($query);
var_dump(mysql_error());
exit();
//fechando a conexão com o banco de dados
mysql_close($link);



header("location:capt_inci.php");

?>