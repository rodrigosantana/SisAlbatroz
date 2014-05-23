<?php
	session_start(); //Abre a sessão. Usado para verificar se o login foi efetuadao

	//Verifica se a variavel da sessão SESS_MEMBER_ID está presente ou não
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: ../index.php");
		exit();
	}

	require_once('../database/conexao.php');
	require_once('../functions/funcoes.php'); //importa o arquivo com as funções a serem utilizadas

?>

<!DOCTYPE html PUBLIC> <!-- Define o tipo de arquivo que vai ser, necessário para que a página seje interpretada corretamente !-->
<HTML lang="pt-br"> <!--  Abre o arquivo do tipo HTML e defini a linguagem como portugues do Brasil !-->
	<HEAD> <!-- Cabeçalho que não vai aparecer para o usuário !-->
	<META http-equiv="Content-Type" content="text/html; charset=UTF-8"> <!-- Informações sobre o tipo de texto da página !-->
	<TITLE> Entrevista de Cais </TITLE> <!-- Cabeçalho que vai no titulo da aba do navegador !-->
	<LINK rel="stylesheet" type="text/css" href="../css/form.css" />
	<LINK rel="stylesheet" type="text/css" href="../css//custom-theme/jquery-ui-1.10.4.custom.css"></LINK>
	<script type="text/javascript" src='../js/consulta.js'></script>
	<script type="text/javascript" src='../js/jquery-1.10.2.js'></script>
	<script type="text/javascript" src='../js/jquery-ui-1.10.4.custom.min.js'></script>
	<script type="text/javascript" src='../js/entrev_cais_pet.js'></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#data").datepicker({dateFormat: 'yy-mm-dd'});
			$("#data_saida").datepicker({dateFormat: 'yy-mm-dd'});
			$("#data_chegada").datepicker({dateFormat: 'yy-mm-dd'});
		});
	</script>
	<script type="text/javascript">
		var qtdeCampos = 0;
		function addCampos() {
		var objPai = document.getElementById("campoPai");
		//Criando o elemento DIV;
		var objFilho = document.createElement("label");
		//Definindo atributos ao objFilho:
		objFilho.setAttribute("id","filho"+qtdeCampos);
		//Inserindo o elemento no pai:
		objPai.appendChild(objFilho);
		//Escrevendo algo no filho recém-criado:
		document.getElementById("filho"+qtdeCampos).innerHTML =
			"<SPAN> Nome da área: </SPAN> <INPUT type='text' class='input_text' name='area_pesca[]' id='campo"+qtdeCampos+"' /> \
			<SPAN> Profundidade inicial: </SPAN> <INPUT type='number' class='input_text' name='prof_ini[]' id='campo"+qtdeCampos+"' value='aa-mm-dd' /> \
			<SPAN> Profundidade final: </SPAN> <INPUT type='number' class='input_text' name='prof_fin[]' id='campo"+qtdeCampos+"' /> \
			<input type='button' class='remov' onclick='removerCampo("+qtdeCampos+")' value='Apagar'> ";
			 
		qtdeCampos++;
		}

		function removerCampo(id) {
		var objPai = document.getElementById("campoPai");
		var objFilho = document.getElementById("filho"+id);

		//Removendo o DIV com id específico do nó-pai:
		var removido = objPai.removeChild(objFilho);
		}
	</script>
	</HEAD>
 	<HEADER align="middle">
		<DIV>
	 		<?php include 'menu.php'; ?>
		</DIV>	
	</HEADER>

	<BODY>
        <DIV class="box"> <!-- Define o BOX principal com o formulário!-->
            <FORM id="form" method="post" action="recebe_entrev_cais.php"> <!-- Tipo de formulário e como as informações vão ser enviadas !-->
                <H1> ENTREVISTA DE CAIS </H1> <!-- Cabeçalho da caixa principal do formulário !-->
                <br>

                <H2> Informações Gerais </H2>		
				<DIV class="box4" id="geral">
					<LABEL> 
						<SPAN> Responsável de campo: </SPAN>
						<INPUT type="text" class="input_text" name="respo" />

						<SPAN> Data: </SPAN>
						<INPUT type="text" class="input_text" name="data" id="data" value='aa - mm - dd'/> 

						<SPAN> Empresa: </SPAN>
						<?php
						    //consulta
						    $rs = mysql_query("SELECT id, nome FROM empresa ORDER BY nome");
						    //chama a função
						    montaCombo('comboEmpresa', 'combo_empre', $rs, 'id', 'nome');
						?>
					</LABEL>

					<LABEL>
						<SPAN> Estado: </SPAN>
						<INPUT type="text" class="input_text" name="estado" />

						<SPAN> Cidade: </SPAN>
						<INPUT type="text" class="input_text" name="cidade" />

						<SPAN> Embarcação: </SPAN>
						<?php
						    //consulta
						    $rs = mysql_query("SELECT id, nome FROM embarcacao ORDER BY nome");
						    //chama a função
						    montaCombo('comboBarco', 'combo_embar', $rs, 'id', 'nome');
						?>
					</LABEL>

					<LABEL> 
						<SPAN> Porto de saída: </SPAN>
						<INPUT type="text" class="input_text" name="porto_saida" />

						<SPAN> Data de saída: </SPAN>
						<INPUT type="text" class="input_text" name="data_saida" id="data_saida" value='aa - mm - dd'/> 

						<SPAN> Hora de saída: </SPAN>
						<INPUT type="time" class="input_text" name="hora_saida" id="hora_saida"/> 
					</LABEL>

					<LABEL> 
						<SPAN> Data de chegada: </SPAN>
						<INPUT type="text" class="input_text" name="data_chegada" id="data_chegada" value='aa - mm - dd'/> 

						<SPAN> Hora de chegada: </SPAN>
						<INPUT type="time" class="input_text" name="hora_chegada" id="hora_chegada"/>

						<SPAN> Dias de mar: </SPAN>
						<INPUT type="number" class="input_text" name="dias_mar" />
					</LABEL>

					<LABEL>
						<SPAN> Dias de pesca: </SPAN>
						<INPUT type="number" class="input_text" name="dias_pesca" />

						<SPAN> Petrecho: </SPAN>
						<?php
						    //consulta
						    $rs = mysql_query("SELECT id, nome FROM petrecho ORDER BY nome");
						    //chama a função
						    montaCombo('comboPetrecho', 'combo_petrecho', $rs, 'id', 'nome');
						?>
					</LABEL>
				</DIV> 

				<H2> Áreas de Pesca </H2>
				<DIV class="box4" id="campoPai">
					<LABEL> 
						<SPAN> Nome da área: </SPAN>
						<INPUT type="text" class="input_text" name="area_pesca[]" />

						<SPAN> Profundidade inicial: </SPAN>
						<INPUT type="number" class="input_text" name="prof_ini[]" id="prof_ini" /> 

						<SPAN> Profundidade final: </SPAN>
						<INPUT type="number" class="input_text" name="prof_fin[]" id="prof_fin" />
						<input type="button" class="add" value="Adicionar" onclick="addCampos()">
					</LABEL>
				</DIV> 

				<DIV class="box4" id="esp_pela">
					<H2> Espinhel Pelágico </H2>
					<br/>
					<br/>
					<LABEL> 
						<SPAN> Número de espinhéis: </SPAN>
						<INPUT type="number" class="input_text" name="esp_p_qtd" />

						<SPAN> Número de lances por dia: </SPAN>
						<INPUT type="number" class="input_text" name="esp_p_lances_dia" /> 

						<SPAN> Hora de inicial do lançamento: </SPAN>
						<INPUT type="time" class="input_text" name="esp_p_hora_ini_lan" /> 
					</LABEL>

					<LABEL>
						<SPAN> Hora de final do lançamento: </SPAN>
						<INPUT type="time" class="input_text" name="esp_p_hora_fin_lan" /> 

						<SPAN> Hora de inicial do recolhimento: </SPAN>
						<INPUT type="time" class="input_text" name="esp_p_hora_ini_rec" /> 

						<SPAN> Hora de final do recolhimento: </SPAN>
						<INPUT type="time" class="input_text" name="esp_p_hora_fin_rec" /> 
					</LABEL>

					<LABEL> 
						<SPAN> Toriline: </SPAN>
						<FIELDSET class="input_text">
							<input type="radio" name="esp_p_tori" value="s"> Sim &nbsp</input> 
							<input type="radio" name="esp_p_tori" value="n"> Não </input>
						</FIELDSET>

						<SPAN> Light-stick: </SPAN>
						<FIELDSET class="input_text">
							<input type="radio" name="esp_p_listk" value="s"> Sim &nbsp</input> 
							<input type="radio" name="esp_p_listk" value="n"> Não </input>
						</FIELDSET>
					</LABEL>
				</DIV> 

				<DIV class="box4" id="esp_sup">
					<H2> Espinhel de Superfície </H2>
					<br/>
					<br/>
					<LABEL> 
						<SPAN> Número de espinhéis: </SPAN>
						<INPUT type="number" class="input_text" name="esp_s_qtd" />

						<SPAN> Número de lances por dia: </SPAN>
						<INPUT type="number" class="input_text" name="esp_s_lances_dia" /> 

						<SPAN> Hora de inicial do lançamento: </SPAN>
						<INPUT type="time" class="input_text" name="esp_s_hora_ini_lan" /> 
					</LABEL>

					<LABEL>
						<SPAN> Hora de final do lançamento: </SPAN>
						<INPUT type="time" class="input_text" name="esp_s_hora_fin_lan" /> 

						<SPAN> Hora de inicial do recolhimento: </SPAN>
						<INPUT type="time" class="input_text" name="esp_s_hora_ini_rec" /> 

						<SPAN> Hora de final do recolhimento: </SPAN>
						<INPUT type="time" class="input_text" name="esp_s_hora_fin_rec" /> 
					</LABEL>

					<LABEL> 
						<SPAN> Toriline: </SPAN>
						<FIELDSET class="input_text">
							<input type="radio" name="esp_S_tori" value="s"> Sim &nbsp</input> 
							<input type="radio" name="esp_S_tori" value="n"> Não </input>
						</FIELDSET>
					</LABEL>
				</DIV>

				<DIV class="box4" id="esp_fund">
					<H2> Espinhel de Fundo </H2>
					<br/>
					<br/>
					<LABEL> 
						<SPAN> Número de espinhéis: </SPAN>
						<INPUT type="number" class="input_text" name="esp_f_qtd" />

						<SPAN> Número de lances por dia: </SPAN>
						<INPUT type="number" class="input_text" name="esp_f_lances_dia" /> 

						<SPAN> Hora de inicial do lançamento: </SPAN>
						<INPUT type="time" class="input_text" name="esp_f_hora_ini_lan" /> 
					</LABEL>

					<LABEL>
						<SPAN> Hora de final do lançamento: </SPAN>
						<INPUT type="time" class="input_text" name="esp_f_hora_fin_lan" /> 

						<SPAN> Hora de inicial do recolhimento: </SPAN>
						<INPUT type="time" class="input_text" name="esp_f_hora_ini_rec" /> 

						<SPAN> Hora de final do recolhimento: </SPAN>
						<INPUT type="time" class="input_text" name="esp_f_hora_ini_rec" /> 
					</LABEL>

					<LABEL> 
						<SPAN> Toriline: </SPAN>
						<FIELDSET class="input_text">
							<input type="radio" name="esp_f_tori" value="s"> Sim &nbsp</input> 
							<input type="radio" name="esp_f_tori" value="n"> Não </input>
						</FIELDSET>
					</LABEL>
				</DIV> 

				<DIV class="box4" id="arrasto">
					<H2> Arrasto </H2>
					<br/>
					<br/>
					<LABEL> 
						<SPAN> Tipo de arrasto: </SPAN>
						<FIELDSET class="input_text">
							<input type="radio" name="arst_tipo" value="simples"> Simples &nbsp</input> 
							<input type="radio" name="arst_tipo" value="duplo"> Duplo </input>
						</FIELDSET>

						<SPAN> Número de arrastos por dia: </SPAN>
						<INPUT type="number" class="input_text" name="arst_dia" /> 

						<SPAN> Tempo médio dos arrastos: </SPAN>
						<INPUT type="time" class="input_text" name="arst_tmp_medio" /> 
					</LABEL>
				</DIV>

				<DIV class="box4" id="cerco">
					<H2> Cerco </H2>
					<br/>
					<br/>
					<LABEL> 
						<SPAN> Comprimento da rede (m): </SPAN>
						<INPUT type="number" class="input_text" name="cerco_rede_comp" />

						<SPAN> Altura da rede (m): </SPAN>
						<INPUT type="number" class="input_text" name="cerco_rede_alt" /> 

						<SPAN> Tempo estimado do cercamento: </SPAN>
						<INPUT type="time" class="input_text" name="cerco_tmp_cer" /> 
					</LABEL>

					<LABEL>
						<SPAN> Tempo estimado do recolhimento: </SPAN>
						<INPUT type="time" class="input_text" name="cerco_tmp_rec" /> 

						<SPAN> Número de cercos totais: </SPAN>
						<INPUT type="number" class="input_text" name="cerco_qtd" /> 
					</LABEL>
				</DIV> 

				<DIV class="box4" id="emalhe">
					<H2> Emalhe </H2>
					<br/>
					<br/>
					<LABEL> 
						<SPAN> Tipo de rede: </SPAN>
						<FIELDSET class="input_text">
							<input type="radio" name="ema_tipo" value="fundo"> Fundo &nbsp</input> 
							<input type="radio" name="ema_tipo" value="boiada"> Boiada </input>
						</FIELDSET>

						<SPAN> Comprimento do pano (m): </SPAN>
						<INPUT type="number" class="input_text" name="ema_rede_comp" />

						<SPAN> Altura do pano (m): </SPAN>
						<INPUT type="number" class="input_text" name="ema_rede_alt" /> 
					</LABEL>

					<LABEL>
						<SPAN> Número de panos por lance: </SPAN>
						<INPUT type="number" class="input_text" name="ema_pano_lance" /> 

						<SPAN> Tempo estimado de lançamento: </SPAN>
						<INPUT type="time" class="input_text" name="ema_tempo_lan" /> 

						<SPAN> Tempo estimado de recolhimento: </SPAN>
						<INPUT type="time" class="input_text" name="ema_tempo_rec" /> 
					</LABEL>

					<LABEL> 
						<SPAN> Regime de trabalho: </SPAN>
						<FIELDSET class="input_text">
							<input type="radio" name="ema_regime" value="integral"> Integral &nbsp</input> 
							<input type="radio" name="ema_regime" value="diurno"> Diurno &nbsp </input>
							<input type="radio" name="ema_regime" value="noturno"> Noturno </input>
						</FIELDSET>
					</LABEL>
				</DIV> 

				<DIV class="box4" id="varaisca">
					<H2> Vara e Isca Viva </H2>
					<br/>
					<br/>
					<LABEL> 
						<SPAN> Dias na isca: </SPAN>
						<INPUT type="number" class="input_text" name="vara_dia_isca" />

						<SPAN> Dias capeando: </SPAN>
						<INPUT type="number" class="input_text" name="vara_dia_cape" /> 

						<SPAN> Número total de lances: </SPAN>
						<INPUT type="number" class="input_text" name="vara_total_lance" />  
					</LABEL>

					<LABEL>
						<SPAN> Número de pescadores: </SPAN>
						<INPUT type="number" class="input_text" name="vara_qtd_pessoas" />

						<SPAN> Bóia: </SPAN>
						<FIELDSET class="input_text">
							<input type="radio" name="vara_boia" value="sim"> Sim &nbsp</input> 
							<input type="radio" name="vara_boia" value="nao"> Não </input>
						</FIELDSET>
					</LABEL>
				</DIV> 

				<DIV class="box4" id="linha">
					<H2> Linha de mão </H2>
					<br/>
					<br/>
					<LABEL> 
						<SPAN> Número de linhas: </SPAN>
						<INPUT type="number" class="input_text" name="linha_qtd" />

						<SPAN> Número de anzóis por linha: </SPAN>
						<INPUT type="number" class="input_text" name="linha_anzol_linha" /> 

						<SPAN> Número de lances por dia: </SPAN>
						<INPUT type="number" class="input_text" name="linha_lance_dia" />  
					</LABEL>

					<LABEL>
						<SPAN> Regime de trabalho: </SPAN>
						<FIELDSET class="input_text2">
							<input type="radio" name="linha_regime" value="matutino"> Matutino &nbsp</input> 
							<input type="radio" name="linha_regime" value="vespertino"> Vespertino &nbsp </input>
							<input type="radio" name="linha_regime" value="diurno"> Diurno &nbsp</input> 
							<input type="radio" name="linha_regime" value="noturno"> Noturno &nbsp </input>
							<input type="radio" name="linha_regime" value="24horas"> 24 horas </input>
						</FIELDSET>

						<SPAN class="span2"> Hora inicial: </SPAN>
						<INPUT type="time" class="input_text" name="linha_hora_in" />

						<SPAN class="span2"> Hora final: </SPAN>
						<INPUT type="time" class="input_text" name="linha_hora_fi" />
					</LABEL>

					<LABEL>
						<SPAN> Petrechos utilizados: </SPAN>
						<FIELDSET class="input_text2">
							<input type="checkbox" name="linha_pet" value="matutino"> Matutino &nbsp</input> 
							<input type="checkbox" name="linha_pet" value="vespertino"> Vespertino &nbsp </input>
							<input type="checkbox" name="linha_pet" value="diurno"> Diurno &nbsp</input> 
							<input type="checkbox" name="linha_pet" value="noturno"> Noturno &nbsp </input>
							<input type="checkbox" name="linha_pet" value="24horas"> 24 horas </input>
						</FIELDSET>

						<SPAN > Outros: </SPAN>
						<INPUT type="text" class="input_text2" name="linha_pet_outros" />
					</LABEL>
				</DIV>
				<?php include 'botoes.php'; ?>
            </FORM>
        </DIV>   
<BR /><BR /><BR /><BR /><BR /><BR /> 
	</BODY>
</HTML> <!-- Finaliza a páginal HTML !-->				

