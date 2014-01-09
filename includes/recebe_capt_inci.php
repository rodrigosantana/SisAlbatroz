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
$cod_embar = $_POST["comboBarco"];
$lance = $_POST["lance"];
$isca = $_POST["isca"]; 
$alvo = $_POST["alvo"];
$anzol = $_POST["anzol"]; 
$reg_peso = $_POST["reg_peso"];
$tingida = $_POST["tingida"];
$tor = $_POST["tor"];
$obs = $_POST["obs"];


// Função para inserir as variáveis descritas no VALUES, na tabela GERAL, dentro das colunas determinadas
$query = "INSERT INTO abiotico (embarcacao, lance, isca, alvo, anzol, reg_peso, tingida, tor, obs) VALUES ('$cod_embar', '$lance', '$isca', '$alvo', '$anzol', '$reg_peso',
'$tingida', '$tor', '$obs')";

$result = mysql_query($query, $link);

//fechando a conexão com o banco de dados
mysql_close($link);

header("location:abiotico.php");

?>