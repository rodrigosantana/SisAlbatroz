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

<!DOCTYPE HTML PUBLIC> <!-- Define o tipo de arquivo que vai ser, necessário para que a página seje interpretada corretamente !-->
<HTML lang="pt-br"> <!--  Abre o arquivo do tipo HTML e defini a linguagem como portugues do Brasil !-->
	<HEAD> <!-- Cabeçalho que não vai aparecer para o usuário !-->
	<META http-equiv="Content-Type" content="text/html; charset=UTF-8"> <!-- Informações sobre o tipo de texto da página !-->
	<TITLE>Produção Pesqueira</TITLE> <!-- Cabeçalho que vai no titulo da aba do navegador !-->
	
	<LINK rel="stylesheet" type="text/css" href="../css/form.css" /></LINK> <!-- Faz o link com a página de CSS e chama o arquivo !-->
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
			"<SPAN> Espécie: </SPAN> <?php $rs = mysql_query("SELECT id, nome_popular FROM especies WHERE categoria = 'peixes' ORDER BY nome_popular");
			  dinCombo('comboBarco', $rs, 'id', 'nome_popular');?>\
			<SPAN> Quantidade: </SPAN> <input type='number' class='input_text' id='campo"+qtdeCampos+"' name='cont_esp[]' /> \
			<SPAN> Predação: </SPAN> <INPUT type='text' class='input_text' id='campo"+qtdeCampos+"' name='preda[]' /> \
			<input type='button' class='remov' onclick='removerCampo("+qtdeCampos+")' value='Apagar'>";
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
            <FORM id="form" method="post" action="recebe_prod_pesca.php"> <!-- Tipo de formulário e como as informações vão ser enviadas !-->
                <H1> Produção Pesqueira </H1> <!-- Cabeçalho da caixa principal do formulário !-->
                
                <DIV class="box4" id='campoPai'>
                	<LABEL> 
						<SPAN> Cruzeiro: </SPAN>
						<INPUT type="text" class="input_text" name="cruz" />
						<SPAN> Observador: </SPAN>
						<INPUT type="text" class="input_text" name="obser" />
						<SPAN> Embarcação: </SPAN>
						<INPUT type="text" class="input_text" name="barco" />
					</LABEL>
                	<br/>
					<LABEL> 
						<SPAN> Lance: </SPAN>
						<INPUT type="number" class="input_text" name="lance" />
					
						<SPAN> Data: </SPAN>
						<INPUT type="date" class="input_text" name="data" />
					
						<SPAN> Boia Rádio: </SPAN>
						<INPUT type="number" class="input_text" name="boia" />
					</LABEL>
					<hr/>
					<LABEL> 
						<SPAN> Espécies: </SPAN>
						<?php
						    //consulta
						    $rs = mysql_query("SELECT id, nome_popular FROM especies WHERE categoria = 'peixes' ORDER BY nome_popular");
						    //chama a função
						    dinCombo('comboEspe', $rs, 'id', 'nome_popular');
						?>

						<SPAN> Quantidade: </SPAN>
						<INPUT type="number" class="input_text" name="cont_esp[]" />
					
						<SPAN> Predação: </SPAN>
						<INPUT type="text" class="input_text" name="preda[]" />
						<input type="button" class="add" value="Adicionar" onclick="addCampos()">
					</LABEL>
				</DIV>
				
				<?php include 'botoes.php'; ?>
            </FORM>
        </DIV>
<BR /><BR /><BR /><BR /><BR /><BR /> 
	</BODY>
</HTML> <!-- Finaliza a páginal HTML !--> 