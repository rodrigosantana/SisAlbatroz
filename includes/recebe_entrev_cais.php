<?php

	session_start(); //Abre a sessão. Usado para verificar se o login foi efetuadao

	//Verifica se a variavel da sessão SESS_MEMBER_ID está presente ou não
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: ../index.php");
		exit();
	}

//Abrindo conexão com o servidor e BD
require_once('../database/conexao.php');

//print_r($_POST); // retorna as variáveis que foram enviadas através de POST.

//Definindo as variáveis de conexão com o servidor e BD
// Dados gerais
$respo = $_POST["respo"];
$data = $_POST["data"]; 
$empresa = $_POST["comboEmpresa"];
$estado = $_POST["estado"]; 
$cidade = $_POST["cidade"];
$barco = $_POST["comboBarco"];
$porto_saida = $_POST["porto_saida"];
$data_saida = $_POST["data_saida"];
$hora_saida = $_POST["hora_saida"];
$data_chegada = $_POST["data_chegada"];
$hora_chegada = $_POST["hora_chegada"];
$dias_mar = $_POST["dias_mar"];
$dias_pesca = $_POST["dias_pesca"];
$petrecho = $_POST["comboPetrecho"];

//Area de pesca
$area_pesca = $_POST["area_pesca"];
$prof_ini = $_POST["prof_ini"];
$prof_fin = $_POST["prof_fin"];

$query = "INSERT INTO
	entrevista_geral
		(data, responsavel_campo, embarcacao, empresa, estado, cidade, porto_saida, data_saida, hora_saida, data_chegada, hora_chegada, dias_mar, dias_pesca, petrecho)
	VALUES
		('$data', '$respo', '$barco', '$empresa', '$estado', '$cidade', '$porto_saida', '$data_saida', '$hora_saida', '$data_chegada', '$hora_chegada', '$dias_mar',
			'$dias_pesca', '$petrecho')";
$result = mysql_query($query, $link);

$id_entre = mysql_insert_id(); //retornar a ID que vai ser atribuida a inserção no banco

$i=0;
$elementos = count($area_pesca);
for ($i=0; $i < $elementos; $i++){
		$query = "INSERT INTO entrevista_area_pesca (id_entre, nome, prof_inicial, prof_final)
			VALUES ('$id_entre', '$area_pesca[$i]', '$prof_ini[$i]', '$prof_fin[$i]')";
		$result = mysql_query($query, $link);
	}

switch ($petrecho) {
	case '1':
		//Arrasto
		$arst_tipo = $_POST["arst_tipo"];
		$arst_dia = $_POST["arst_dia"];
		$arst_tmp_medio = $_POST["arst_tmp_medio"];

		$query = "INSERT INTO
			entrevista_arrasto
				(id_entre, tipo, arrasto_dia, tempo_medio)
			VALUES
				('$id_entre', '$arst_tipo', '$arst_dia', '$arst_tmp_medio')";
		$result = mysql_query($query, $link);

		break;

	default:
		echo "Default";
		break;
}	

//continuar adicionar Switch Case para cada tipo de petrecho de acordo com a seleção.

exit;
//Petrechos
//Espinhel pelágico
$esp_p_qtd = $_POST["esp_p_qtd"];
$esp_p_lances_dia = $_POST["esp_p_lances_dia"];
$esp_p_hora_ini_lan = $_POST["esp_p_hora_ini_lan"];
$esp_p_hora_fin_lan = $_POST["esp_p_hora_fin_lan"];
$esp_p_hora_ini_rec = $_POST["esp_p_hora_ini_rec"];
$esp_p_hora_fin_rec = $_POST["esp_p_hora_fin_rec"];
$esp_p_tori = $_POST["esp_p_tori"];
$esp_p_listk = $_POST["esp_p_listk"];

//Espinhel de superfície
$esp_s_qtd = $_POST["esp_s_qtd"];
$esp_s_lances_dia = $_POST["esp_s_lances_dia"];
$esp_s_hora_ini_lan = $_POST["esp_s_hora_ini_lan"];
$esp_s_hora_fin_lan = $_POST["esp_s_hora_fin_lan"];
$esp_s_hora_ini_rec = $_POST["esp_s_hora_ini_rec"];
$esp_s_hora_fin_rec = $_POST["esp_s_hora_fin_rec"];
$esp_s_tori = $_POST["esp_s_tori"];

//Espinhel de fundo
$esp_f_qtd = $_POST["esp_f_qtd"];
$esp_f_lances_dia = $_POST["esp_f_lances_dia"];
$esp_f_hora_ini_lan = $_POST["esp_f_hora_ini_lan"];
$esp_f_hora_fin_lan = $_POST["esp_f_hora_fin_lan"];
$esp_f_hora_ini_rec = $_POST["esp_f_hora_ini_rec"];
$esp_f_hora_ini_rec = $_POST["esp_f_hora_ini_rec"];
$esp_f_tori = $_POST["esp_f_tori"];



//Cerco
$cerco_rede_comp = $_POST["cerco_rede_comp"];
$cerco_rede_alt = $_POST["cerco_rede_alt"];
$cerco_tmp_cer = $_POST["cerco_tmp_cer"];
$cerco_tmp_rec = $_POST["cerco_tmp_rec"];
$cerco_qtd = $_POST["cerco_qtd"];

//Emalhe
$ema_tipo = $_POST["ema_tipo"];
$ema_rede_comp = $_POST["ema_rede_comp"];
$ema_rede_alt = $_POST["ema_rede_alt"];
$ema_pano_lance = $_POST["ema_pano_lance"];
$ema_tempo_lan = $_POST["ema_tempo_lan"];
$ema_tempo_rec = $_POST["ema_tempo_rec"];
$ema_regime = $_POST["ema_regime"];

//Vara e isca viva
$vara_dia_isca = $_POST["vara_dia_isca"];
$vara_dia_cape = $_POST["vara_dia_cape"];
$vara_total_lance = $_POST["vara_total_lance"];
$vara_qtd_pessoas = $_POST["vara_qtd_pessoas"];
$vara_boia = $_POST["vara_boia"];

//Linha de mão
$linha_qtd = $_POST["linha_qtd"];
$linha_anzol_linha = $_POST["linha_anzol_linha"];
$linha_lance_dia = $_POST["linha_lance_dia"];
$linha_regime = $_POST["linha_regime"];
$linha_hora_in = $_POST["linha_hora_in"];
$linha_hora_fi = $_POST["linha_hora_fi"];
$linha_pet = $_POST["linha_pet"];
$linha_pet_outros = $_POST["linha_pet_outros"];




mysql_close($link);

header("location:entrev_cais.php");

?>