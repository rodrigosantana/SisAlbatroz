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
$nome = $_POST["nome"];
$reg = $_POST["reg"]; 
$fab = $_POST["fab"];
$comp = $_POST["comp"]; 
$mat = $_POST["mat"];
$capac = $_POST["capac"];
$arq_bruta = $_POST["arq_bruta"];
$conserv = $_POST["conserv"];
$tripu = $_POST["tripu"];

// Função para inserir as variáveis descritas no VALUES, na tabela GERAL, dentro das colunas determinadas
mysql_query("INSERT INTO embarcacao (nome, registro, fabricacao, comprimento, material, capacidade, arque_bruta, conservacao, tripulacao)
	VALUES ('$nome', '$reg', '$fab', '$comp', '$mat', '$capac', '$arq_bruta', '$conserv', '$tripu')", $link);

//fechando a conexão com o banco de dados
mysql_close($link);

header("location:barco.php");

?>

       