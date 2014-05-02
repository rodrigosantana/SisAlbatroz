<?php

	// Define as variáveis de conexão com o servidor e o banco de dados
	define("SERVER","localhost"); 
	define("USER", "root");
	define("PASSWORD", "anakin88");
	define("DB", "albatroz_sis");

	/*
	// configurações do hostinger
	define("SERVER","mysql.hostinger.com.br"); 
	define("USER", "u667336753_aocea");
	define("PASSWORD", "oceano");
	define("DB", "u667336753_alba");
	*/

	// Cria a variável de conxeão com o servidor e banco e realiza a conexão
	$link=mysql_connect(SERVER, USER, PASSWORD) or die ("Erro de conexão com o SERVIDOR");
	@mysql_select_db(DB, $link) or die ("Erro de conexão com o BANCO DE DADOS");
	mysql_query("set names 'utf8', $link");

?>