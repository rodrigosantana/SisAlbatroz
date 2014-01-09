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
	<TITLE>Contagem de Aves por Boia</TITLE> <!-- Cabeçalho que vai no titulo da aba do navegador !-->
	
	<LINK rel="stylesheet" type="text/css" href="../css/form.css" /> <!-- Faz o link com a página de CSS e chama o arquivo !-->
	</HEAD>

 	<HEADER align="middle">
		<DIV>
	 		<?php include 'menu.php'; ?>
		</DIV>	
	</HEADER>
 	
 	<BODY>
        <DIV class="box"> <!-- Define o BOX principal com o formulário!-->
            <FORM id="form" method="post" action="recebe_cont_aves_boia.php"> <!-- Tipo de formulário e como as informações vão ser enviadas !-->
                <H1> Contagem de aves na boia </H1> <!-- Cabeçalho da caixa principal do formulário !-->
                
                <DIV class="esquerda"> <!-- Box da coluna da esquerda !-->
                	<LABEL> 
						<SPAN> Observador: </SPAN>
						<?php
						    //consulta
						    $rs = mysql_query("SELECT id, nome FROM observador ORDER BY nome");
						    //chama a função
						    montaCombo('comboObser', $rs, 'id', 'nome');
						?>
					</LABEL>

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
						<SPAN> Cruzeiro: </SPAN>
						<?php
						    //consulta
						    $rs = mysql_query("SELECT viagem, viagem FROM geral ORDER BY viagem");
						    //chama a função
						    montaCombo('comboCruz', $rs, 'viagem', 'viagem');
						?>
					</LABEL>

					<LABEL> 
						<SPAN> Lance: </SPAN>
						<INPUT type="number" class="input_text" name="lance" />
					</LABEL>
	                
	                <LABEL> 
						<SPAN> Cod. Boia Rádio: </SPAN>
						<INPUT type="number" class="input_text" name="codboiaradio" />
					</LABEL>

					<LABEL> 
						<SPAN> Data: </SPAN>
						<INPUT type="date" class="input_text" name="data" />
					</LABEL>

					<LABEL> 
						<SPAN> Hora: </SPAN>
						<INPUT type="time" class="input_text" name="hora" />
					</LABEL>

					<LABEL> 
						<SPAN> Temp. da água (°C): </SPAN>
						<INPUT type="text" class="input_text" name="tagua" />
					</LABEL>
				</DIV>

				<DIV class="direita"> <!-- Box da coluna central do formulário !-->
					<LABEL> 
						<SPAN> Profundidade (metros): </SPAN>
						<INPUT type="number" class="input_text" name="prof" />
					</LABEL>

					<LABEL> 
						<SPAN> Pressão Atm: </SPAN>
						<INPUT type="number" class="input_text" name="atm" />
					</LABEL>

					<LABEL> 
						<SPAN> Latitude: </SPAN>
						<INPUT type="text" class="input_text" name="lat" />
					</LABEL>

					<LABEL> 
						<SPAN> Longitude: </SPAN>
						<INPUT type="text" class="input_text" name="long" />
					</LABEL>

	                <LABEL> 
						<SPAN> Espécies: </SPAN> <!-- Criar uma classe css para o checkbox !-->
						<INPUT type="text" class="input_text" name="especie" />
					</LABEL>

					 <LABEL> 
						<SPAN> Aves não identificadas: </SPAN> <!-- Criar uma classe css para o checkbox !-->
						<INPUT type="text" class="input_text" name="ave_noid" />
					</LABEL>

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