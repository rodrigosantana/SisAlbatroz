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

//fechando a conexão com o banco de dados
mysql_close($link);



?>

<!DOCTYPE html PUBLIC> <!-- Define o tipo de arquivo que vai ser, necessário para que a página seje interpretada corretamente !-->
<HTML lang="pt-br"> <!--  Abre o arquivo do tipo HTML e defini a linguagem como portugues do Brasil !-->
<HEAD> <!-- Cabeçalho que não vai aparecer para o usuário !-->
<META http-equiv="Content-Type" content="text/html; charset=UTF-8"> <!-- Informações sobre o tipo de texto da página !-->
<TITLE> Cadastro de Viagem </TITLE> <!-- Cabeçalho que vai no titulo da aba do navegador !-->
<LINK rel="stylesheet" type="text/css" href="../css/form.css" />
<LINK rel="stylesheet" type="text/css" href="../css/custom-theme/jquery-ui-1.10.4.custom.css"></LINK>
<script type="text/javascript" src='../js/jquery-1.10.2.js'></script>
<script type="text/javascript" src='../js/jquery-ui-1.10.4.custom.min.js'></script>
<script type="text/javascript" charset='UTF-8'>
	$(document).ready(function(){
		var obser = '<?php echo $cod_obser ?>';
		var embar = '<?php echo $cod_embar ?>';
		var datas = '<?php echo $data_saida ?>';
		var datac = '<?php echo $data_chegada ?>';
		$.post("combo_obser.php", {obser:obser}, function(data){
			$("#obser_nome").append(data);
		})
		$.post("combo_embar.php", {embar:embar}, function(data){
			$("#embar_nome").append(data);
		})
		$.post("consu_cruz.php", {obser:obser, embar:embar, datas:datas, datac:datac}, function(data){
			$("#cod_cruz").append(data);
		})

		$("#dialog").dialog({
			autoOpen: true,
			height: 500,
			width: 600,
			modal: true,
			buttons: [
				{
					text: "Ok",
					click: function() {
						$(location).attr('href', 'embarque.php');
					}
				}
			]
		});

	});
</script>
</HEAD>
<BODY>
    
	<div id="dialog" title="Aviso Importante">
	</br>
		<p>Este é o código identificador do cruzeiro realizado. Favor anotar na capa do processo.</p>
	</br>
		<SPAN id="cod_cruz"> Código do Cruzeiro: </SPAN>
		<SPAN id="obser_nome"> Observador: </SPAN>
		<SPAN id="embar_nome"> Embarcação: </SPAN>
	</div>

</BODY>
</HTML> <!-- Finaliza a páginal HTML !-->

