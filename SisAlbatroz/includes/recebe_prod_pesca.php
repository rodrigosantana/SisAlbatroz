<?php

	session_start(); //Abre a sessão. Usado para verificar se o login foi efetuadao

	//Verifica se a variavel da sessão SESS_MEMBER_ID está presente ou não
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: ../index.php");
		exit();
	}


//Abrindo conexão com o servidor e BD
require_once('../database/conexao.php');

$cruz = $_POST["cruz"];
$lance = $_POST["lance"];
$data = $_POST["data"];
$boia = $_POST["boia"];
$especie = $_POST["combo"];
$cont_esp = $_POST["cont_esp"];
$preda = $_POST["preda"];


$i=0;
$elementos = count($especie);
for ($i=0; $i < $elementos; $i++){
		$query = "INSERT INTO prod_pesca (cruzeiro, lance, data, boia, especie, quantidade, predacao)
			VALUES ('$cruz', '$lance', '$data', '$boia', '$especie[$i]', '$cont_esp[$i]', '$preda[$i]')";
		$result = mysql_query($query, $link);
	}

//fechando a conexão com o banco de dados
mysql_close($link);

header("location:prod_pesca.php");

?>