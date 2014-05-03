<?php

	session_start(); //Abre a sessão. Usado para verificar se o login foi efetuadao

	//Verifica se a variavel da sessão SESS_MEMBER_ID está presente ou não
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: ../index.php");
		exit();
	}


//Abrindo conexão com o servidor e BD
require_once('../database/conexao.php');
include("salvar_imagem.php");

//Definindo as variáveis de conexão com o servidor e BD
$nome = $_POST["nome"];
$cpf = $_POST["cpf"]; 
$rg = $_POST["rg"];
$tel = $_POST["tel"]; 
$email = $_POST["email"];
$ender = $_POST["ender"];
$skype = $_POST["skype"];
$imagem = recebeImagem();

//var_dump(mysql_error());
//exit();


// Função para inserir as variáveis descritas no VALUES, na tabela GERAL, dentro das colunas determinadas
mysql_query("INSERT INTO observador (nome, cpf, rg, tel, email, skype, endereco, foto)
	VALUES ('$nome', '$cpf', '$rg', '$tel', '$email', '$skype', '$ender', '$imagem')", $link);

//fechando a conexão com o banco de dados
mysql_close($link);

header("location:observador.php");

?>