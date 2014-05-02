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
$categ = $_POST["categ"];
$subcateg = $_POST["subcateg"];
$pop = $_POST["pop"];
$poping = $_POST["poping"];
$cient = $_POST["cient"]; 

// Função para inserir as variáveis descritas no VALUES, na tabela GERAL, dentro das colunas determinadas
mysql_query("INSERT INTO especies (categoria, sub_categoria, nome_popular, nome_pop_ingles, nome_cient)
	VALUES ('$categ', '$subcateg', '$pop', '$poping', '$cient')", $link);

//fechando a conexão com o banco de dados
mysql_close($link);

header("location:especie.php");

?>

