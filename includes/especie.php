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
	<TITLE>Cadastro de Espécies</TITLE> <!-- Cabeçalho que vai no titulo da aba do navegador !-->
	<script src="jquery-1.10.2.min.js" type="text/javascript" ></script>
	<LINK rel="stylesheet" type="text/css" href="../css/form.css" /> <!-- Faz o link com a página de CSS e chama o arquivo !-->
	</HEAD>

 	<HEADER align="middle">
		<DIV>
	 		<?php include 'menu.php'; ?>
		</DIV>	
	</HEADER> 
 	
 	<BODY>
        <DIV class="box"> <!-- Define o BOX principal com o formulário!-->
            <FORM id="form" method="post" action="recebe_especie.php"> <!-- Tipo de formulário e como as informações vão ser enviadas !-->
                <H1> Cadastro de Espécies </H1> <!-- Cabeçalho da caixa principal do formulário !-->
                
                <DIV class="esquerda"> <!-- Box da coluna da esquerda !-->
                	<LABEL> 
						<SPAN> Categoria: </SPAN>
						<select name="cat" class="input_text">
							<option value="">---Selecione---</option>
							<option value="aves">Aves</option>
							<option value="peixes">Peixes</option>
						</select>
					</LABEL>

					<LABEL> 
						<SPAN> Sub-categoria: </SPAN>
						<select name="subcat" class="input_text">
							<option value="">---Selecione---</option>
							<option value="carti">Cartilaginoso</option>
							<option value="osseo">Ósseo</option>
						</select>
					</LABEL>		
	                
	                <LABEL> 
						<SPAN> Nome popular: </SPAN>
						<INPUT type="text" class="input_text" name="pop" />
					</LABEL>
				</DIV>
					

				<DIV class="direita"> <!-- Box da coluna central do formulário !-->
					<LABEL> 
						<SPAN> Nome pop. em inglês: </SPAN>
						<INPUT type="text" class="input_text" name="poping" />
					</LABEL>

					<LABEL> 
						<SPAN> Nome científico: </SPAN>
						<INPUT type="text" class="input_text" name="cient" />
					</LABEL>
				</DIV>

				<?php include 'botoes.php'; ?>
            
<BR /><BR /><BR /><BR /><BR /><BR /> 
	</BODY>
</HTML> <!-- Finaliza a páginal HTML !-->