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
	<TITLE> Dados Abióticos </TITLE> <!-- Cabeçalho que vai no titulo da aba do navegador !-->
	
	<LINK rel="stylesheet" type="text/css" href="../css/form.css" /> <!-- Faz o link com a página de CSS e chama o arquivo !-->

	</HEAD>
 	<HEADER align="middle">
		<DIV>
	 		<?php include 'menu.php'; ?>
		</DIV>	
	</HEADER>
 	
 	<BODY>
        <DIV class="box"> <!-- Define o BOX principal com o formulário!-->
            <FORM id="form" method="post" action="recebe_abiotico.php"> <!-- Tipo de formulário e como as informações vão ser enviadas !-->
                
                <H1> Cadastro de Dados Abióticos </H1> <!-- Cabeçalho da caixa principal do formulário !-->
                
                <DIV class="esquerda"> <!-- Box da coluna da esquerda !-->
                	<LABEL> 
						<SPAN> Embarcação: </SPAN>
						<?php
						    //consulta
						    $rs = mysql_query("SELECT id, nome FROM embarcacao ORDER BY nome");
						    //chama a função
						    montaCombo('comboBarco', $rs, 'id', 'nome');
						?>
					</LABEL>
	                
					<LABEL> 
						<SPAN> Lance: </SPAN>
						<INPUT type="number" class="input_text" name="lance" />
					</LABEL>

					<LABEL> 
						<SPAN> Tipo de isca: </SPAN>
						<?php
						    //consulta
						    $rs = mysql_query("SELECT id, nome FROM isca ORDER BY nome");
						    //chama a função
						    montaCombo('comboIsca', $rs, 'id', 'nome');
						?>
					</LABEL>

					<LABEL> 
						<SPAN> Espécies alvo: </SPAN>
						<?php
						    //consulta
						    $rs = mysql_query("SELECT id, nome_popular FROM especies ORDER BY nome_popular");
						    //chama a função
						    montaCombo('comboEspe', $rs, 'id', 'nome_popular');
						?>
					</LABEL>
				</DIV>

				<DIV class="direita"> <!-- Box da coluna central do formulário !-->
					<LABEL> 
						<SPAN> Anzóis: </SPAN>
						<INPUT type="number" class="input_text" name="anzol" />
					</LABEL>
					
					<LABEL>
						<SPAN> Reg. Peso </SPAN>
						<FIELDSET class="input_text">
							<input type="radio" name="reg_peso" value="s"> Sim </input> 
							<input type="radio" name="reg_peso" value="n"> Não </input>
						</FIELDSET>
					</LABEL>

					<LABEL>
						<SPAN> Toriline </SPAN>
						<FIELDSET class="input_text">
							<input type="radio" name="tor" value="s"> Sim </input> 
							<input type="radio" name="tor" value="n"> Não </input>
						</FIELDSET>
					</LABEL>
					<LABEL>
						<SPAN> Isca tingida </SPAN>
						<FIELDSET class="input_text">
							<input type="radio" name="tingida" value="s"> Sim </input> 
							<input type="radio" name="tingida" value="n"> Não </input>
						</FIELDSET>
					</LABEL>
				</DIV>
				
				<H2> Dados do Lançamento </H2>
				<DIV class="esquerda">
				<H3> Início </H3>
					<LABEL> 
						<SPAN> Latitude (decimal): </SPAN>
						<INPUT type="number" class="input_text" name="lat_in_lan" />
					</LABEL>

					<LABEL> 
						<SPAN> Longitude (decimal): </SPAN>
						<INPUT type="number" class="input_text" name="long_in_lan" />
					</LABEL>

					<LABEL> 
						<SPAN> Data: </SPAN>
						<INPUT type="date" class="input_text" name="data_in_lan" />
					</LABEL>

					<LABEL> 
						<SPAN> Hora: </SPAN>
						<INPUT type="time" class="input_text" name="hora_in_lan" />
					</LABEL>

					<LABEL> 
						<SPAN> Profundidade (m): </SPAN>
						<INPUT type="number" class="input_text" name="prof_in_lan" />
					</LABEL>

					<LABEL> 
						<SPAN> Rumo: </SPAN>
						<select name="rumo_in_lan" class="input_text">
							<option value="">---Selecione---</option>
							<option value="N">N</option>
							<option value="NNE">NNE</option>
							<option value="NE">NE</option>
							<option value="ENE">ENE</option>
							<option value="E">E</option>
							<option value="ESE">ESE</option>
							<option value="SE">SE</option>
							<option value="SSE">SSE</option>
							<option value="S">S</option>
							<option value="SSO">SSO</option>
							<option value="SO">SO</option>
							<option value="OSO">OSO</option>
							<option value="O">O</option>
							<option value="ONO">ONO</option>
							<option value="NO">NO</option>
							<option value="NNO">NNO</option>		
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Direção do vento: </SPAN>
						<select name="dvento_in_lan" class="input_text">
							<option value="">---Selecione---</option>
							<option value="N">N</option>
							<option value="NNE">NNE</option>
							<option value="NE">NE</option>
							<option value="ENE">ENE</option>
							<option value="E">E</option>
							<option value="ESE">ESE</option>
							<option value="SE">SE</option>
							<option value="SSE">SSE</option>
							<option value="S">S</option>
							<option value="SSO">SSO</option>
							<option value="SO">SO</option>
							<option value="OSO">OSO</option>
							<option value="O">O</option>
							<option value="ONO">ONO</option>
							<option value="NO">NO</option>
							<option value="NNO">NNO</option>		
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Velocidade do vento (nós): </SPAN>
						<INPUT type="number" class="input_text" name="vvento_in_lan" />
					</LABEL>

					<LABEL> 
						<SPAN> Categoria do Mar: </SPAN>
						<select name="mar_in_lan" class="input_text">
							<option value="">---Selecione---</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Temp. do ar (°C): </SPAN>
						<INPUT type="number" class="input_text" name="tar_in_lan" />
					</LABEL>

					<LABEL> 
						<SPAN> Temp. sup. mar (°C): </SPAN>
						<INPUT type="number" class="input_text" name="tsmar_in_lan" />
					</LABEL>

					<LABEL> 
						<SPAN> Cobert. céu: </SPAN>
						<select name="ceu_in_lan" class="input_text">
							<option value="">---Selecione---</option>
							<option value="1">1 Céu totalmente limpo</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8 Céu totalmente encoberto</option>
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Pressão atm: </SPAN>
						<INPUT type="number" class="input_text" name="atm_in_lan" />
					</LABEL>
				</DIV>

				<DIV class="direita">
				<H3> Fim </H3>
					<LABEL> 
						<SPAN> Latitude (decimal): </SPAN>
						<INPUT type="number" class="input_text" name="lat_fi_lan" />
					</LABEL>

					<LABEL> 
						<SPAN> Longitude (decimal): </SPAN>
						<INPUT type="number" class="input_text" name="long_fi_lan" />
					</LABEL>

					<LABEL> 
						<SPAN> Data: </SPAN>
						<INPUT type="date" class="input_text" name="data_fi_lan" />
					</LABEL>

					<LABEL> 
						<SPAN> Hora: </SPAN>
						<INPUT type="time" class="input_text" name="hora_fi_lan" />
					</LABEL>

					<LABEL> 
						<SPAN> Profundidade: </SPAN>
						<INPUT type="number" class="input_text" name="prof_fi_lan" />
					</LABEL>

					<LABEL> 
						<SPAN> Rumo: </SPAN>
						<select name="rumo_fi_lan" class="input_text">
							<option value="">---Selecione---</option>
							<option value="N">N</option>
							<option value="NNE">NNE</option>
							<option value="NE">NE</option>
							<option value="ENE">ENE</option>
							<option value="E">E</option>
							<option value="ESE">ESE</option>
							<option value="SE">SE</option>
							<option value="SSE">SSE</option>
							<option value="S">S</option>
							<option value="SSO">SSO</option>
							<option value="SO">SO</option>
							<option value="OSO">OSO</option>
							<option value="O">O</option>
							<option value="ONO">ONO</option>
							<option value="NO">NO</option>
							<option value="NNO">NNO</option>		
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Direção do vento: </SPAN>
						<select name="dvento_fi_lan" class="input_text">
							<option value="">---Selecione---</option>
							<option value="N">N</option>
							<option value="NNE">NNE</option>
							<option value="NE">NE</option>
							<option value="ENE">ENE</option>
							<option value="E">E</option>
							<option value="ESE">ESE</option>
							<option value="SE">SE</option>
							<option value="SSE">SSE</option>
							<option value="S">S</option>
							<option value="SSO">SSO</option>
							<option value="SO">SO</option>
							<option value="OSO">OSO</option>
							<option value="O">O</option>
							<option value="ONO">ONO</option>
							<option value="NO">NO</option>
							<option value="NNO">NNO</option>		
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Velocidade do vento (nós): </SPAN>
						<INPUT type="number" class="input_text" name="vvento_fi_lan" />
					</LABEL>

					<LABEL> 
						<SPAN> Categoria do Mar: </SPAN>
						<select name="mar_fi_lan" class="input_text">
							<option value="">---Selecione---</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Temp. ar (°C): </SPAN>
						<INPUT type="number" class="input_text" name="tar_fi_lan" />
					</LABEL>

					<LABEL> 
						<SPAN> Temp. sup. mar (°C): </SPAN>
						<INPUT type="number" class="input_text" name="tsmar_fi_lan" />
					</LABEL>

					<LABEL> 
						<SPAN> Cobert. céu: </SPAN>
						<select name="ceu_fi_lan" class="input_text">
							<option value="">---Selecione---</option>
							<option value="1">1 Céu totalmente limpo</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8 Céu totalmente encoberto</option>
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Pressão atm: </SPAN>
						<INPUT type="number" class="input_text" name="atm_fi_lan" />
					</LABEL>
				</DIV>

				<H2> Dados do Recolhimento </H2>
				<DIV class="esquerda">
				<H3> Início </H3>
					<LABEL> 
						<SPAN> Latitude (decimal): </SPAN>
						<INPUT type="number" class="input_text" name="lat_in_rec" />
					</LABEL>

					<LABEL> 
						<SPAN> Longitude (decimal): </SPAN>
						<INPUT type="number" class="input_text" name="long_in_rec" />
					</LABEL>

					<LABEL> 
						<SPAN> Data: </SPAN>
						<INPUT type="date" class="input_text" name="data_in_rec" />
					</LABEL>

					<LABEL> 
						<SPAN> Hora: </SPAN>
						<INPUT type="time" class="input_text" name="hora_in_rec" />
					</LABEL>

					<LABEL> 
						<SPAN> Profunidade (m): </SPAN>
						<INPUT type="number" class="input_text" name="prof_in_rec" />
					</LABEL>

					<LABEL> 
						<SPAN> Rumo: </SPAN>
						<select name="rumo_in_rec" class="input_text">
							<option value="">---Selecione---</option>
							<option value="N">N</option>
							<option value="NNE">NNE</option>
							<option value="NE">NE</option>
							<option value="ENE">ENE</option>
							<option value="E">E</option>
							<option value="ESE">ESE</option>
							<option value="SE">SE</option>
							<option value="SSE">SSE</option>
							<option value="S">S</option>
							<option value="SSO">SSO</option>
							<option value="SO">SO</option>
							<option value="OSO">OSO</option>
							<option value="O">O</option>
							<option value="ONO">ONO</option>
							<option value="NO">NO</option>
							<option value="NNO">NNO</option>		
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Direção do vento: </SPAN>
						<select name="dvento_in_rec" class="input_text">
							<option value="">---Selecione---</option>
							<option value="N">N</option>
							<option value="NNE">NNE</option>
							<option value="NE">NE</option>
							<option value="ENE">ENE</option>
							<option value="E">E</option>
							<option value="ESE">ESE</option>
							<option value="SE">SE</option>
							<option value="SSE">SSE</option>
							<option value="S">S</option>
							<option value="SSO">SSO</option>
							<option value="SO">SO</option>
							<option value="OSO">OSO</option>
							<option value="O">O</option>
							<option value="ONO">ONO</option>
							<option value="NO">NO</option>
							<option value="NNO">NNO</option>		
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Velocidade do vento (nós): </SPAN>
						<INPUT type="number" class="input_text" name="vvento_in_rec" />
					</LABEL>

					<LABEL> 
						<SPAN> Categoria do Mar: </SPAN>
						<select name="mar_in_rec" class="input_text">
							<option value="">---Selecione---</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Temp. ar (°C): </SPAN>
						<INPUT type="number" class="input_text" name="tar_in_rec" />
					</LABEL>

					<LABEL> 
						<SPAN> Temp. sup. mar (°C): </SPAN>
						<INPUT type="number" class="input_text" name="tsmar_in_rec" />
					</LABEL>

					<LABEL> 
						<SPAN> Cobert. céu: </SPAN>
						<select name="ceu_in_rec" class="input_text">
							<option value="">---Selecione---</option>
							<option value="1">1 Céu totalmente limpo</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8 Céu totalmente encoberto</option>
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Pressão atm: </SPAN>
						<INPUT type="number" class="input_text" name="atm_in_rec" />
					</LABEL>
				</DIV>

				<DIV class="esquerda">
				<H3> Fim </H3>
					<LABEL> 
						<SPAN> Latitude (decimal): </SPAN>
						<INPUT type="number" class="input_text" name="lat_fi_rec" />
					</LABEL>

					<LABEL> 
						<SPAN> Longitude (decimal): </SPAN>
						<INPUT type="number" class="input_text" name="long_fi_rec" />
					</LABEL>

					<LABEL> 
						<SPAN> Data: </SPAN>
						<INPUT type="date" class="input_text" name="data_fi_rec" />
					</LABEL>

					<LABEL> 
						<SPAN> Hora: </SPAN>
						<INPUT type="time" class="input_text" name="hora_fi_rec" />
					</LABEL>

					<LABEL> 
						<SPAN> Profundidade (m): </SPAN>
						<INPUT type="number" class="input_text" name="prof_fi_rec" />
					</LABEL>

					<LABEL> 
						<SPAN> Rumo: </SPAN>
						<select name="rumo_fi_rec" class="input_text">
							<option value="">---Selecione---</option>
							<option value="N">N</option>
							<option value="NNE">NNE</option>
							<option value="NE">NE</option>
							<option value="ENE">ENE</option>
							<option value="E">E</option>
							<option value="ESE">ESE</option>
							<option value="SE">SE</option>
							<option value="SSE">SSE</option>
							<option value="S">S</option>
							<option value="SSO">SSO</option>
							<option value="SO">SO</option>
							<option value="OSO">OSO</option>
							<option value="O">O</option>
							<option value="ONO">ONO</option>
							<option value="NO">NO</option>
							<option value="NNO">NNO</option>		
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Direção do vento: </SPAN>
						<select name="dvento_fi_rec" class="input_text">
							<option value="">---Selecione---</option>
							<option value="N">N</option>
							<option value="NNE">NNE</option>
							<option value="NE">NE</option>
							<option value="ENE">ENE</option>
							<option value="E">E</option>
							<option value="ESE">ESE</option>
							<option value="SE">SE</option>
							<option value="SSE">SSE</option>
							<option value="S">S</option>
							<option value="SSO">SSO</option>
							<option value="SO">SO</option>
							<option value="OSO">OSO</option>
							<option value="O">O</option>
							<option value="ONO">ONO</option>
							<option value="NO">NO</option>
							<option value="NNO">NNO</option>		
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Velocidade vento (nós): </SPAN>
						<INPUT type="number" class="input_text" name="vvento_fi_rec" />
					</LABEL>

					<LABEL> 
						<SPAN> Categoria do Mar: </SPAN>
						<select name="mar_fi_rec" class="input_text">
							<option value="">---Selecione---</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Temp. ar (°C): </SPAN>
						<INPUT type="number" class="input_text" name="tar_fi_rec" />
					</LABEL>

					<LABEL> 
						<SPAN> Temp. sup. mar (°C): </SPAN>
						<INPUT type="number" class="input_text" name="tsmar_fi_rec" />
					</LABEL>

					<LABEL> 
						<SPAN> Cobert. céu: </SPAN>
						<select name="ceu_fi_rec" class="input_text">
							<option value="">---Selecione---</option>
							<option value="1">1 Céu totalmente limpo</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8 Céu totalmente encoberto</option>
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Pressão atm: </SPAN>
						<INPUT type="number" class="input_text" name="atm_fi_rec" />
					</LABEL>
				</DIV>

				<DIV class="centro">
					<LABEL> 
						<SPAN> Observações </SPAN> 
						<TEXTAREA class="message" name="obs" id="obs"></TEXTAREA>
						<p class='hint'> Limite de 500 caracteres. </p>
					</LABEL>
				</DIV>
				
				<?php include 'botoes.php'; ?>
            
<BR /><BR /><BR /><BR /><BR /><BR /> 
	</BODY>
</HTML> <!-- Finaliza a páginal HTML !-->
