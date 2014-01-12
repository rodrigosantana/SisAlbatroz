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
	<META http-equiv="Content-Type" content="text/html; charset=UTF-8" > <!-- Informações sobre o tipo de texto da página !-->
	<TITLE> Observador </TITLE> <!-- Cabeçalho que vai no titulo da aba do navegador !-->
	
	<LINK rel="stylesheet" type="text/css" href="../css/form.css" /> <!-- Faz o link com a página de CSS e chama o arquivo !-->
	</HEAD>

 	<HEADER align="middle">
		<DIV>
	 		<?php include 'menu.php'; ?>
		</DIV>	
	</HEADER>
 	
 	<BODY>
        <DIV class="box"> <!-- Define o BOX principal com o formulário!-->
            <FORM id="form" method="post" action="recebe_observador.php" enctype="multipart/form-data"> <!-- Tipo de formulário e como as informações vão ser enviadas !-->
                <H1> CADASTRO DE OBSERVADOR DE BORDO </H1> <!-- Cabeçalho da caixa principal do formulário !-->
                
                <DIV class="esquerda"> <!-- Box da coluna da esquerda !-->
                	<LABEL>
						<SPAN> Nome: </SPAN>
						<INPUT type="text" class="input_text" name="nome" id='nome' />
					</LABEL>
	                
					<LABEL> 
						<SPAN> CPF: </SPAN>
						<INPUT class="input_text" type="text" name="cpf" />
					</LABEL>

					<LABEL> 
						<SPAN> RG: </SPAN>
						<INPUT class="input_text" type="text" name="rg" />
					</LABEL>

					<LABEL> 
						<SPAN> Telefone: </SPAN>
						<INPUT class="input_text" type="tel" name="tel" />
					</LABEL>
					<LABEL> 
						<SPAN> E-Mail: </SPAN>
						<INPUT type="email" class="input_text" name="email" id='email' />
					</LABEL>
				</DIV>

				<DIV class="direita"> <!-- Box da coluna central do formulário !-->
					<LABEL> 
						<SPAN> Skype: </SPAN>
						<INPUT type="text" class="input_text" name="skype" id='skype' />
					</LABEL>
					<LABEL> 
						<SPAN> Endereço: </SPAN>
						<TEXTAREA class="message" name="ender" id="ender"></TEXTAREA>
						<p class='hint'> Limite de 500 caracteres. </p>
					</LABEL>
					<LABEL>
						<SPAN>Foto (.jpg, .gif, .png; até 2MB)</SPAN>
						<INPUT type="file" name="arquivo" class="input_text" />
					</LABEL>
					
					
				</DIV>

				<?php include 'botoes.php'; ?>
            
<BR /><BR /><BR /><BR /><BR /><BR /> 
	</BODY>
</HTML> <!-- Finaliza a páginal HTML !-->
