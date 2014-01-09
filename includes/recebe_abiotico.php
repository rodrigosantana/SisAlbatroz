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
/*
$lat_in_lan = $_POST["lat_in_lan"];
$lat_fi_lan = $_POST["lat_fi_lan"];
$long_in_lan = $_POST["long_in_lan"];
$long_fi_lan = $_POST["long_fi_lan"];
$data_in_lan = $_POST["data_in_lan"];
$data_fi_lan = $_POST["data_fi_lan"];
$hora_in_lan = $_POST["hora_in_lan"];
$prof_in_lan = $_POST["prof_in_lan"];
$prof_fi_lan = $_POST["prof_fi_lan"];
$rumo_in_lan = $_POST["rumo_in_lan"];
$rumo_fi_lan = $_POST["rumo_fi_lan"];
$dvento_in_lan = $_POST["dvento_in_lan"];
$dvento_fi_lan = $_POST["dvento_fi_lan"];
$vvento_in_lan = $_POST["vvento_in_lan"];
$vvento_fi_lan = $_POST["vvento_fi_lan"];
*/




// Função para inserir as variáveis descritas no VALUES, na tabela GERAL, dentro das colunas determinadas
$query = "INSERT INTO abiotico (embarcacao, lance, isca, alvo, anzol, reg_peso, tingida, tor, obs) VALUES ('$cod_embar', '$lance', '$isca', '$alvo', '$anzol', '$reg_peso',
'$tingida', '$tor', '$obs')";

//var_dump($query);
//exit();

/*
$query = "INSERT INTO abiotico (embarcacao, lance, isca, alvo, anzol, reg_peso, tingida, tor, obs, lat_in_lan, lat_fi_lan, long_in_lan, long_fi_lan, data_in_lan, data_fi_lan,
			hora_in_lan, hora_fi_lan, prof_in_lan, prof_fi_lan, rumo_in_lan, rumo_fin_lan, dvento_in_lan, dvento_fi_lan, vvento_in_lan, vvento_fi_lan, mar_in_lan, mar_fi_lan,
			tar_in_lan, tar_fi_lan, tsmar_in_lan, tsmar_fi_lan, ceu_in_lan, ceu_fi_lan, atm_in_lan, atm_fi_lan,
			lat_in_rec, lat_fi_rec, long_in_rec, long_fi_rec, data_in_rec, data_fi_rec,
			hora_in_rec, hora_fi_rec, prof_in_rec, prof_fi_rec, rumo_in_rec, rumo_fin_rec, dvento_in_rec, dvento_fi_rec, vvento_in_rec, vvento_fi_rec, mar_in_rec, mar_fi_rec,
			tar_in_rec, tar_fi_rec, tsmar_in_rec, tsmar_fi_rec, ceu_in_rec, ceu_fi_rec, atm_in_rec, atm_fi_rec)
	VALUES ('$cod_embar', '$lance', '$isca', '$alvo', '$anzol', '$reg_peso', '$tingida', '$tor', '$obs', '$lat_in_lan', '$lat_fi_lan', '$long_in_lan', '$long_fi_lan',
			'$data_in_lan', '$data_fi_lan', '$hora_in_lan', '$hora_fi_lan', '$prof_in_lan', '$prof_fi_lan', '$rumo_in_lan', '$rumo_fi_lan', '$dvento_in_lan', '$dvento_fi_lan',
			'$vvento_in_lan', '$vvento_fi_lan', '$mar_in_lan', '$mar_fi_lan', '$tar_in_lan', '$tar_fi_lan', '$tsmar_in_lan', '$tsmar_fi_lan', '$ceu_in_lan', '$ceu_fi_lan',
			'$atm_in_lan', '$atm_fi_lan', 
			'$lat_in_rec', '$lat_fi_rec', '$long_in_rec', '$long_fi_rec', '$data_in_rec', '$data_fi_rec', '$hora_in_rec', '$hora_fi_rec', '$prof_in_rec', '$prof_fi_rec',
			'$rumo_in_rec', '$rumo_fi_rec', '$dvento_in_rec', '$dvento_fi_rec', '$vvento_in_rec', '$vvento_fi_rec', '$mar_in_rec', '$mar_fi_rec', '$tar_in_rec', '$tar_fi_rec',
			'$tsmar_in_rec', '$tsmar_fi_rec', '$ceu_in_rec', '$ceu_fi_rec', '$atm_in_rec', '$atm_fi_rec')";
*/

$result = mysql_query($query, $link);

//fechando a conexão com o banco de dados
mysql_close($link);

header("location:abiotico.php");

?>