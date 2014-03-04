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
	<TITLE> Cadastro de Viagem </TITLE> <!-- Cabeçalho que vai no titulo da aba do navegador !-->
	<LINK rel="stylesheet" type="text/css" href="../css/form.css" />
	</HEAD>

 	<HEADER align="middle">
		<DIV>
	 		<?php include 'menu.php'; ?>
		</DIV>	
	</HEADER>
 	
 	<BODY>
        <DIV class="box"> <!-- Define o BOX principal com o formulário!-->
            <FORM id="form" method="post" action="recebe_embarque.php" enctype="multipart/form-data"> <!-- Tipo de formulário e como as informações vão ser enviadas !-->
                <H1> CADASTRO DE VIAGENS </H1> <!-- Cabeçalho da caixa principal do formulário !-->
                
                <DIV class="esquerda"> <!-- Box da coluna da esquerda !-->
	                <LABEL> <!-- Define um campo a ser criado !-->
	                	<SPAN> Observador: </SPAN> <!-- Nome que vai aparecer para o campo criado !-->
	                	<?php
						    //consulta ao banco de dados para pegar a lista desejada para montar o combobox
						    $rs = mysql_query("SELECT id, nome FROM observador ORDER BY nome");
						    //chama a função customizada para criar combobox com dados do banco
						    montaCombo('comboObservador', $rs, 'id', 'nome');
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
						<SPAN> Nome do Mestre: </SPAN>
						<?php
						    //consulta
						    $rs = mysql_query("SELECT id, nome FROM mestre ORDER BY nome");
						     //chama a função
						    montaCombo('comboMestre', $rs, 'id', 'nome');
						?>
					</LABEL>

					<LABEL> 
						<SPAN> Empresa: </SPAN>
						<?php
						    //consulta
						    $rs = mysql_query("SELECT id, nome FROM empresa ORDER BY nome");
						    //chama a função
						    montaCombo('comboEmpresa', $rs, 'id', 'nome');
						?>
					</LABEL>

					<LABEL> 
						<SPAN> Financiador </SPAN>
						<INPUT type="text" class="input_text" name="financiador" id='financiador'/>
						<p class='hint'> Insira o orgão financiador desta viagem </p>
					</LABEL>	
				</DIV>

				<DIV class="direita"> <!-- Box da coluna central do formulário !-->
					<LABEL> 
						<SPAN> Data de Saída: </SPAN>
						<!--  Entrada de dados na forma de data, cria um calendário para selecionar a data !-->
						<INPUT type="date" class="input_text" name="data_saida" id="data_saida"/> 
						<p class="hint"> Marque a data do início da viagem. </p> <!-- Mensagem flutuante que aparece ao colocar o mouse em cima do campo !-->
					</LABEL>
				
					<LABEL> 
						<SPAN> Data de Retorno: </SPAN> 
						<INPUT type="date" class="input_text" name="data_chegada" id="data_chegada"/>
						<p class="hint"> Lembre-se que a data do fim da viagem tem que ser maior que o início da viagem. </p>
					</LABEL>

					<LABEL> 
						<SPAN> Observações </SPAN> 
						<TEXTAREA class="message" name="obs" id="obs"></TEXTAREA>
						<p class='hint'> Limite de 500 caracteres. </p>
					</LABEL>
				</DIV>

				<?php include 'botoes.php'; ?>

            </FORM> 
        </DIV>    
		
<BR /><BR /><BR /><BR /><BR /><BR /> 
	</BODY>
</HTML> <!-- Finaliza a páginal HTML !-->

