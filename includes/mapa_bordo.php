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
	<TITLE> Mapa de Bordo </TITLE> <!-- Cabeçalho que vai no titulo da aba do navegador !-->
	<LINK rel="stylesheet" type="text/css" href="../css/form.css" />
	<LINK rel="stylesheet" type="text/css" href="../css//custom-theme/jquery-ui-1.10.4.custom.css"></LINK>
	<script type="text/javascript" src='../js/consulta.js'></script>
	<script type="text/javascript" src='../js/jquery-1.10.2.js'></script>
	<script type="text/javascript" src='../js/jquery-ui-1.10.4.custom.min.js'></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#data_saida").datepicker({dateFormat: 'yy-mm-dd'});
			$("#data_chegada").datepicker({dateFormat: 'yy-mm-dd'});
			$("#data").datepicker({dateFormat: 'yy-mm-dd'});
		});
	</script>
	<script type="text/javascript">
		var qtdeCampos = 0;
		function addCampos() {
		var objPai = document.getElementById("campoPai");
		//Criando o elemento DIV;
		var objFilho = document.createElement("div");
		//Definindo atributos ao objFilho:
		objFilho.setAttribute("id","filho"+qtdeCampos);
		//Inserindo o elemento no pai:
		objPai.appendChild(objFilho);
		//Escrevendo algo no filho recém-criado:
		document.getElementById("filho"+qtdeCampos).innerHTML =
			"<LABEL> \
				<SPAN> Lance: </SPAN> <INPUT type='number' class='input_text' name='lance[]' id='campo"+qtdeCampos+"' /> \
				<SPAN> Data: </SPAN> <INPUT type='date' class='input_text' name='data_lance[]' id='campo"+qtdeCampos+"' value='aa-mm-dd' /> \
				<SPAN> Total de anzóis: </SPAN> <INPUT type='number' class='input_text' name='anzol[]' id='campo"+qtdeCampos+"' /> \
			</LABEL> \
			<LABEL> \
				<SPAN> Latitude (decimal): </SPAN> <INPUT type='number' class='input_text' name='lat[]' id='campo"+qtdeCampos+"' /> \
				<SPAN> Longitude (decimal): </SPAN> <INPUT type='number' class='input_text' name='lon[]' id='campo"+qtdeCampos+"' /> \
				<SPAN> Tipo de isca: </SPAN> <?php $rs = mysql_query("SELECT id, nome FROM isca ORDER BY nome"); dinCombo('comboIsca', $rs, 'id', 'nome'); ?> \
			</LABEL> \
			<LABEL> \
				<SPAN> Hora início da largada: </SPAN> <INPUT type='time' class='input_text' name='hora_lan[]' id='campo"+qtdeCampos+"' /> \
				<SPAN> Hora fim da largada: </SPAN> <INPUT type='time' class='input_text' name='hora_rec[]' id='campo"+qtdeCampos+"' /> \
				<SPAN> Ave capturada: </SPAN> \
					<FIELDSET class='input_text' > \
						<input type='radio' name='ave_capt[]"+qtdeCampos+"' value='s'> Sim &nbsp</input> \
						<input type='radio' name='ave_capt[]"+qtdeCampos+"' value='n'> Não </input> \
					</FIELDSET> \
			</LABEL> \
			<LABEL> \
				<SPAN> Medida metigadora: </SPAN> \
				<FIELDSET class='input_text2'> \
					<input type='checkbox' name='medida_metiga"+qtdeCampos+"[]' value='toriline' id='campo"+qtdeCampos+"'> Toriline &nbsp</input> \
					<input type='checkbox' name='medida_metiga"+qtdeCampos+"[]' value='larga_notu' id='campo"+qtdeCampos+"'> Largada noturna &nbsp</input> \
					<input type='checkbox' name='medida_metiga"+qtdeCampos+"[]' value='isca_ting' id='campo"+qtdeCampos+"'> Isca tingida &nbsp</input> \
					<input type='checkbox' name='medida_metiga"+qtdeCampos+"[]' value='reg_peso' id='campo"+qtdeCampos+"'> Regime de peso </input> \
				</FIELDSET> \
				<SPAN> Uso da medida metigadora: </SPAN> \
				<FIELDSET class='input_text'> \
					<input type='radio' name='mm_uso[]"+qtdeCampos+"' value='total' id='campo"+qtdeCampos+"'> Total &nbsp</input> \
					<input type='radio' name='mm_uso[]"+qtdeCampos+"' value='parcial' id='campo"+qtdeCampos+"'> Parcial </input> \
				</FIELDSET> \
				<input type='button' class='remov' onclick='removerCampo("+qtdeCampos+")' value='Apagar'> \
			</LABEL> \
			<hr/> "; 
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
            <FORM id="form" method="post" action="recebe_mapa_bordo.php"> <!-- Tipo de formulário e como as informações vão ser enviadas !-->
                <H1> MAPA DE BORDO </H1> <!-- Cabeçalho da caixa principal do formulário !-->
                <br>

                <H2> Informações Gerais </H2>
                <DIV class="esquerda"> <!-- Box da coluna da esquerda !-->
                	<LABEL> 
						<SPAN> Embarcação: </SPAN>
						<?php
						    //consulta
						    $rs = mysql_query("SELECT id, nome FROM embarcacao ORDER BY nome");
						    //chama a função
						    montaCombo('comboBarco', 'combo_embar', $rs, 'id', 'nome');
						?>
					</LABEL>
	                
	                <LABEL> 
						<SPAN> Nome do Mestre: </SPAN>
						<?php
						    //consulta
						    $rs = mysql_query("SELECT id, nome FROM mestre ORDER BY nome");
						     //chama a função
						    montaCombo('comboMestre', 'combo_mestre', $rs, 'id', 'nome');
						?>
					</LABEL>
				</DIV>

				<DIV class="direita"> <!-- Box da coluna central do formulário !-->
					<LABEL> 
						<SPAN> Data de Chegada: </SPAN> 
						<INPUT type="text" class="input_text" name="data_chegada" id="data_chegada" value='aa-mm-dd' />
						<p class="hint"> Lembre-se que a data do fim da viagem tem que ser maior que o início da viagem. </p>
					</LABEL>

					<LABEL> 
						<SPAN> Data de Saída: </SPAN>
						<!--  Entrada de dados na forma de data, cria um calendário para selecionar a data !-->
						<INPUT type="text" class="input_text" name="data_saida" id="data_saida" value='aa-mm-dd'/> 
						<p class="hint"> Marque a data do início da viagem. </p> <!-- Mensagem flutuante que aparece ao colocar o mouse em cima do campo !-->
					</LABEL>
				</DIV>

				<DIV class="centro">
					<LABEL> 
						<SPAN> Observações: </SPAN> 
						<TEXTAREA class="message" name="obs" id="obs"></TEXTAREA>
						<p class='hint'> Limite de 500 caracteres. </p>
					</LABEL>
				</DIV>

				<H2> Dados do Lançamento </H2>
				<DIV class="box4" id="campoPai">
					<LABEL> 
						<SPAN> Lance: </SPAN>
						<INPUT type="number" class="input_text" name="lance[]" />

						<SPAN> Data: </SPAN>
						<!--  Entrada de dados na forma de data, cria um calendário para selecionar a data !-->
						<INPUT type="text" class="input_text" name="data_lance[]" id="data" value='aa-mm-dd'/> 

						<SPAN> Total de anzóis: </SPAN>
						<INPUT type="number" class="input_text" name="anzol[]" />
					</LABEL>

					<LABEL>
						<SPAN> Latitude (decimal): </SPAN>
						<INPUT type="number" class="input_text" name="lat[]" />

						<SPAN> Longitude (decimal): </SPAN>
						<INPUT type="number" class="input_text" name="lon[]" />

						<SPAN> Tipo de isca: </SPAN>
						<?php
						    //consulta
						    $rs = mysql_query("SELECT id, nome FROM isca ORDER BY nome");
						    //chama a função
						    dinCombo('comboIsca', $rs, 'id', 'nome');
						?>
					</LABEL>

					<LABEL> 
						<SPAN> Hora início da largada: </SPAN>
						<INPUT type="time" class="input_text" name="hora_lan[]" />

						<SPAN> Hora fim da largada: </SPAN>
						<INPUT type="time" class="input_text" name="hora_rec[]" />

						<SPAN> Ave capturada: </SPAN>
						<FIELDSET class="input_text">
							<input type="radio" name="ave_capt[]" value="s"> Sim &nbsp</input> 
							<input type="radio" name="ave_capt[]" value="n"> Não </input>
						</FIELDSET>
					</LABEL>

					<LABEL>
						<SPAN> Medida metigadora: </SPAN>
						<FIELDSET class="input_text2">
							<input type="checkbox" name="medida_metiga[]" value="toriline"> Toriline &nbsp</input> 
							<input type="checkbox" name="medida_metiga[]" value="larga_notu"> Largada noturna &nbsp</input>
							<input type="checkbox" name="medida_metiga[]" value="isca_ting"> Isca tingida &nbsp</input>
							<input type="checkbox" name="medida_metiga[]" value="reg_peso"> Regime de peso </input>
						</FIELDSET>

						<SPAN> Uso da medida metigadora: </SPAN>
						<FIELDSET class="input_text">
							<input type="radio" name="mm_uso[]" value="total"> Total &nbsp</input> 
							<input type="radio" name="mm_uso[]" value="parcial"> Parcial </input>
						</FIELDSET>
						<input type="button" class="add" value="Adicionar" onclick="addCampos()">
					</LABEL>
					<hr/>
				</DIV> 

				<?php include 'botoes.php'; ?>
            
<BR /><BR /><BR /><BR /><BR /><BR /> 
	</BODY>
</HTML> <!-- Finaliza a páginal HTML !-->