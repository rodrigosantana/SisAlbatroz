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
$cod_obser = $_POST["comboObservador"];
$cod_embar = $_POST["comboBarco"]; 
$cod_mestr = $_POST["comboMestre"];
$cod_empre = $_POST["comboEmpresa"]; 
$data_saida = $_POST["data_saida"];
$data_chegada = $_POST["data_chegada"];
$financiador = $_POST["financiador"];
$obs = $_POST["obs"];

//Abrindo conexão com o servidor e BD
$link=mysql_connect(SERVER,USER,PASSWORD) or die ("Erro de server imbecil");
@mysql_select_db(DB, $link) or die("Erro de BD seu kbçudo");
mysql_query("set names 'utf8', $link");

// Função para inserir as variáveis descritas no VALUES, na tabela GERAL, dentro das colunas determinadas
mysql_query("INSERT INTO geral (cod_obser, cod_embar, cod_mestr, cod_empre, data_saida, data_chegada, financiador, obs)
	VALUES ('$cod_obser', '$cod_embar', '$cod_mestr', '$cod_empre', '$data_saida', '$data_chegada', '$financiador','$obs')", $link);

$result = mysql_query($query, $link);

//fechando a conexão com o banco de dados
mysql_close($link);

?>