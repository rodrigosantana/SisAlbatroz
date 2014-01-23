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
	<TITLE>Captura Incidental</TITLE> <!-- Cabeçalho que vai no titulo da aba do navegador !-->
	<LINK rel="stylesheet" type="text/css" href="../css/form.css" /> <!-- Faz o link com a página de CSS e chama o arquivo !-->
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
			"<label> \
			<SPAN> Lance: </SPAN> <INPUT type='number' class='input_text' id='campo"+qtdeCampos+"' name='lance[]' /> \
			<SPAN> Data: </SPAN> <INPUT type='date' class='input_text' id='campo"+qtdeCampos+"' name='data[]' /> \
			<SPAN> Espécie: </SPAN> <?php $rs = mysql_query("SELECT id, nome_popular FROM especies WHERE categoria = 'peixes' ORDER BY nome_popular");
				dinCombo('comboBarco', $rs, 'id', 'nome_popular');?> \
			</label> \
			<label> \
			<SPAN> Etiqueta: </SPAN> <INPUT type='number' class='input_text' id='campo"+qtdeCampos+"' name='etiqueta[]' /> \
			<SPAN> Boia Rádio: </SPAN> <INPUT type=number' class='input_text' id='campo"+qtdeCampos+"' name='boia[]' /> \
			<SPAN> Quantidade: </SPAN> <input type='number' class='input_text' id='campo"+qtdeCampos+"' name='quant[]'> \
			</label> \
			<label> \
			<SPAN> Latitude: </SPAN> <INPUT type='text' class='input_text' id='campo"+qtdeCampos+"' name='lat[]' /> \
			<SPAN> Longitude: </SPAN> <INPUT type='text' class='input_text' id='campo"+qtdeCampos+"' name='lon[]' /> \
			<input type='button' class='remov' onclick='removerCampo("+qtdeCampos+")' value='Apagar'> \
			</label> \
			<hr/>";
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

 	<HEADER>
 		<?php include 'menu.php'; ?>
 	</HEADER>
 	
 	<BODY>
        <DIV class="box"> <!-- Define o BOX principal com o formulário!-->
            <FORM id="form" method="post" action="recebe_capt_inci.php"> <!-- Tipo de formulário e como as informações vão ser enviadas !-->
                <H1> Captura Incidental </H1> <!-- Cabeçalho da caixa principal do formulário !-->
                
                <DIV class="box4" id="campoPai"> <!-- Box da coluna da esquerda !-->
                	<LABEL> 
						<SPAN> Lance: </SPAN>
						<INPUT type="number" class="input_text" name="lance[]" />
					
						<SPAN> Data: </SPAN>
						<INPUT type="date" class="input_text" name="data[]" />

						<SPAN> Espécie: </SPAN> <!-- Criar uma classe css para o checkbox !-->
						<?php
						    //consulta
						    $rs = mysql_query("SELECT id, nome_popular FROM especies WHERE categoria = 'peixes' ORDER BY nome_popular");
						    //chama a função
						    dinCombo('comboEspe', $rs, 'id', 'nome_popular');
						?>
					</LABEL>
					
					<LABEL> 
						<SPAN> Etiqueta: </SPAN>
						<INPUT type="number" class="input_text" name="etiqueta[]" />

						<SPAN> Boia Rádio: </SPAN>
						<INPUT type="number" class="input_text" name="boia[]" />

						<SPAN> Quantidade: </SPAN>
						<INPUT type="number" class="input_text" name="quant[]" />
					</LABEL>
								
					<LABEL> 
						<SPAN> Latitude: </SPAN>
						<INPUT type="text" class="input_text" name="lat[]" />
					
						<SPAN> Longitude: </SPAN>
						<INPUT type="text" class="input_text" name="lon[]" />
						<input type="button" class="add" value="Adicionar" onclick="addCampos()">
					</LABEL>
					<hr/>
				</DIV>

				<?php include 'botoes.php'; ?>
			</FORM>
		</DIV>
            
<BR /><BR /><BR /><BR /><BR /><BR /> 
	</BODY>
</HTML> <!-- Finaliza a páginal HTML !--> 