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
$cruz = $_POST["cruz"];
$lance = $_POST["lance"];
$isca = $_POST["comboIsca"]; 
$alvo = $_POST["comboAlvo"];
$anzol = $_POST["anzol"]; 
$reg_peso = $_POST["reg_peso"];
$tingida = $_POST["tingida"];
$tor = $_POST["tor"];
$obs = $_POST["obs"];

$lat_in_lan = $_POST["lat_in_lan"];
$lat_fi_lan = $_POST["lat_fi_lan"];
$long_in_lan = $_POST["long_in_lan"];
$long_fi_lan = $_POST["long_fi_lan"];
$data_in_lan = $_POST["data_in_lan"];
$data_fi_lan = $_POST["data_fi_lan"];
$hora_in_lan = $_POST["hora_in_lan"];
$hora_fi_lan = $_POST["hora_fi_lan"];
$prof_in_lan = $_POST["prof_in_lan"];
$prof_fi_lan = $_POST["prof_fi_lan"];
$rumo_in_lan = $_POST["rumo_in_lan"];
$rumo_fi_lan = $_POST["rumo_fi_lan"];
$dvento_in_lan = $_POST["dvento_in_lan"];
$dvento_fi_lan = $_POST["dvento_fi_lan"];
$vvento_in_lan = $_POST["vvento_in_lan"];
$vvento_fi_lan = $_POST["vvento_fi_lan"];
$mar_in_lan = $_POST["mar_in_lan"];
$mar_fi_lan = $_POST["mar_fi_lan"];
$tar_in_lan = $_POST["tar_in_lan"];
$tar_fi_lan = $_POST["tar_fi_lan"];
$tsmar_in_lan = $_POST["tsmar_in_lan"];
$tsmar_fi_lan = $_POST["tsmar_fi_lan"];
$ceu_in_lan = $_POST["ceu_in_lan"];
$ceu_fi_lan = $_POST["ceu_fi_lan"];
$atm_in_lan = $_POST["atm_in_lan"];
$atm_fi_lan = $_POST["atm_fi_lan"];

$lat_in_rec = $_POST["lat_in_rec"];
$lat_fi_rec = $_POST["lat_fi_rec"];
$long_in_rec = $_POST["long_in_rec"];
$long_fi_rec = $_POST["long_fi_rec"];
$data_in_rec = $_POST["data_in_rec"];
$data_fi_rec = $_POST["data_fi_rec"];
$hora_in_rec = $_POST["hora_in_rec"];
$hora_fi_rec = $_POST["hora_fi_rec"];
$prof_in_rec = $_POST["prof_in_rec"];
$prof_fi_rec = $_POST["prof_fi_rec"];
$rumo_in_rec = $_POST["rumo_in_rec"];
$rumo_fi_rec = $_POST["rumo_fi_rec"];
$dvento_in_rec = $_POST["dvento_in_rec"];
$dvento_fi_rec = $_POST["dvento_fi_rec"];
$vvento_in_rec = $_POST["vvento_in_rec"];
$vvento_fi_rec = $_POST["vvento_fi_rec"];
$mar_in_rec = $_POST["mar_in_rec"];
$mar_fi_rec = $_POST["mar_fi_rec"];
$tar_in_rec = $_POST["tar_in_rec"];
$tar_fi_rec = $_POST["tar_fi_rec"];
$tsmar_in_rec = $_POST["tsmar_in_rec"];
$tsmar_fi_rec = $_POST["tsmar_fi_rec"];
$ceu_in_rec = $_POST["ceu_in_rec"];
$ceu_fi_rec = $_POST["ceu_fi_rec"];
$atm_in_rec = $_POST["atm_in_rec"];
$atm_fi_rec = $_POST["atm_fi_rec"];


// Função para inserir as variáveis descritas no VALUES, na tabela GERAL, dentro das colunas determinadas
$query1 = "INSERT INTO abi_geral 
			(cruzeiro, lance, isca, especie_alvo, anzois, reg_peso, toriline, isca_tingida, obs) 
			VALUES 
			('$cruz', '$lance', '$isca', '$alvo', '$anzol', '$reg_peso','$tingida', '$tor', '$obs')";

$query2 = "INSERT INTO abi_lance 
			(cruzeiro, lat_in_lan, lat_fi_lan, long_in_lan, long_fi_lan, data_in_lan, data_fi_lan, hora_in_lan, hora_fi_lan, prof_in_lan, prof_fi_lan, 
				rumo_in_lan, rumo_fin_lan, dvento_in_lan, dvento_fi_lan, vvento_in_lan, vvento_fi_lan, mar_in_lan, mar_fi_lan, tar_in_lan, tar_fi_lan, 
				tsmar_in_lan, tsmar_fi_lan, ceu_in_lan, ceu_fi_lan, atm_in_lan, atm_fi_lan) 
			VALUES 
			('$cruz', '$lat_in_lan', '$lat_fi_lan', '$long_in_lan', '$long_fi_lan', '$data_in_lan', '$data_fi_lan', '$hora_in_lan', '$hora_fi_lan', 
				'$prof_in_lan', '$prof_fi_lan', '$rumo_in_lan', '$rumo_fi_lan', '$dvento_in_lan', '$dvento_fi_lan', '$vvento_in_lan', '$vvento_fi_lan', 
				'$mar_in_lan', '$mar_fi_lan', '$tar_in_lan', '$tar_fi_lan', '$tsmar_in_lan', '$tsmar_fi_lan', '$ceu_in_lan', '$ceu_fi_lan', 
				'$atm_in_lan', '$atm_fi_lan')";

$query3 = "INSERT INTO abi_rec 
			(cruzeiro, lat_in_rec, lat_fi_rec, long_in_rec, long_fi_rec, data_in_rec, data_fi_rec, hora_in_rec, hora_fi_rec, prof_in_rec, prof_fi_rec, 
				rumo_in_rec, rumo_fin_rec, dvento_in_rec, dvento_fi_rec, vvento_in_rec, vvento_fi_rec, mar_in_rec, mar_fi_rec, tar_in_rec, tar_fi_rec, 
				tsmar_in_rec, tsmar_fi_rec, ceu_in_rec, ceu_fi_rec, atm_in_rec, atm_fi_rec) 
			VALUES 
			('$cruz', '$lat_in_rec', '$lat_fi_rec', '$long_in_rec', '$long_fi_rec', '$data_in_rec', '$data_fi_rec', '$hora_in_rec', '$hora_fi_rec', 
				'$prof_in_rec', '$prof_fi_rec', '$rumo_in_rec', '$rumo_fi_rec', '$dvento_in_rec', '$dvento_fi_rec', '$vvento_in_rec', '$vvento_fi_rec', 
				'$mar_in_rec', '$mar_fi_rec', '$tar_in_rec', '$tar_fi_rec', '$tsmar_in_rec', '$tsmar_fi_rec', '$ceu_in_rec', '$ceu_fi_rec', 
				'$atm_in_rec', '$atm_fi_rec')";


$result1 = mysql_query($query1, $link);
$result2 = mysql_query($query2, $link);
$result3 = mysql_query($query3, $link);

//fechando a conexão com o banco de dados
mysql_close($link);

//var_dump($query1);
//var_dump($query2);
//var_dump($query3);



header("location:abiotico.php");

?>