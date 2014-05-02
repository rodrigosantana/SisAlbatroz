<?php

	session_start(); //Abre a sessão. Usado para verificar se o login foi efetuadao

	//Verifica se a variavel da sessão SESS_MEMBER_ID está presente ou não
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: ../index.php");
		exit();
	}


//Abrindo conexão com o servidor e BD
require_once('../database/conexao.php');

$lance = $_POST['lance'];
$especie = $_POST['especie'];
$embarcacao = $_POST['embarcacao'];

$i=0;
$elementos = count($lance);
for ($i=0; $i < $elementos; $i++)
	{
		$query = "INSERT INTO capt_incidental (lance, especie, embarcacao) VALUES ('$lance[$i]', '$especie[$i]', '$embarcacao[$i]')";
		$result = mysql_query($query, $link);
	}

mysql_close($link);

header("location:capt_inci2.php");
?>
