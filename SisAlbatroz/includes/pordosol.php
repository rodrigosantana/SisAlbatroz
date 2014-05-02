<?php
	session_start(); //Abre a sessão. Usado para verificar se o login foi efetuadao

	//Verifica se a variavel da sessão SESS_MEMBER_ID está presente ou não
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: ../index.php");
		exit();
	}

	require_once('../database/conexao.php');
	require_once('../functions/funcoes.php'); //importa o arquivo com as funções a serem utilizadas
	include('select.class.php');

?>

<!DOCTYPE html PUBLIC> <!-- Define o tipo de arquivo que vai ser, necessário para que a página seje interpretada corretamente !-->
<HTML lang="pt-br"> <!--  Abre o arquivo do tipo HTML e defini a linguagem como portugues do Brasil !-->
	<HEAD> <!-- Cabeçalho que não vai aparecer para o usuário !-->
	<META http-equiv="Content-Type" content="text/html; charset=UTF-8"> <!-- Informações sobre o tipo de texto da página !-->
	<TITLE>Contagem por-do-sol</TITLE> <!-- Cabeçalho que vai no titulo da aba do navegador !-->
	<LINK rel="stylesheet" type="text/css" href="../css/form.css" /> <!-- Faz o link com a página de CSS e chama o arquivo !-->
	<LINK rel="stylesheet" type="text/css" href="../css//custom-theme/jquery-ui-1.10.4.custom.css"></LINK>
	<script type="text/javascript" src="../js/jquery-1.11.0.js"></script>
	<script type="text/javascript" src='../js/consulta.js'></script>
	<script type="text/javascript" src='../js/jquery-ui-1.10.4.custom.min.js'></script>
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
			"<SPAN> Espécie: </SPAN> <?php $rs = mysql_query("SELECT id, nome_popular FROM especies WHERE categoria = 'aves' ORDER BY nome_popular");
			  dinCombo('comboBarco', $rs, 'id', 'nome_popular');?>\
			<SPAN> Quantidade: </SPAN> <input type='number' class='input_text' id='campo"+qtdeCampos+"' name='cont_esp[]'> \
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
            <FORM id="form" method="post" action="recebe_pordosol.php"> <!-- Tipo de formulário e como as informações vão ser enviadas !-->
                <H1> Contagem por-do-sol </H1> <!-- Cabeçalho da caixa principal do formulário !-->
                
                <DIV class="box4">
                	<h3> Consulta do Código do Cruzeiro </h3>
                	<LABEL>
                		<span> Observador: </span>
                		<select id="obser" name="obser" class="input_text">
						  <?php echo $opt->ShowCategory(); ?>
						</select>
						<span> Embarcação: </span>
						<select id="barco" name="barco" class="input_text">
						  <option value="0">--Bloueado--</option>
						</select>
						<span> Cruzeiro: </span>
						<select id="cruz" name="cruz" class="input_text">
						  <option value="0">--Bloqueado--</option>
						</select>
					</LABEL>
				</DIV>

                <H2> Informações Base </H2>
                <DIV class="esquerda"> <!-- Box da coluna da esquerda !-->
					<LABEL> 
						<SPAN> Data: </SPAN>
						<INPUT type="date" class="input_text" name="data" />
					</LABEL>

					<LABEL> 
						<SPAN> Horário do por-do-sol: </SPAN>
						<INPUT type="time" class="input_text" name="hora" />
					</LABEL>
					
					<LABEL> 
						<SPAN> Latitude: </SPAN>
						<INPUT type="text" class="input_text" name="lat" />
					</LABEL>

					<LABEL> 
						<SPAN> Longitude: </SPAN>
						<INPUT type="text" class="input_text" name="lon" />
					</LABEL>
					
					<LABEL> 
						<SPAN> Lance: </SPAN>
						<INPUT type="number" class="input_text" name="lance" />
					</LABEL>
				</DIV>

				<DIV class="direita"> <!-- Box da coluna central do formulário !-->
					<LABEL>
						<SPAN> Toriline </SPAN>
						<FIELDSET class="input_text">
							<input type="radio" name="toriline" value="s"> Sim </input> 
							<input type="radio" name="toriline" value="n"> Não </input>
						</FIELDSET>
					</LABEL>

					<LABEL>
						<SPAN> Isca tingida </SPAN>
						<FIELDSET class="input_text">
							<input type="radio" name="tingida" value="s"> Sim </input> 
							<input type="radio" name="tingida" value="n"> Não </input>
						</FIELDSET>
					</LABEL>

					<LABEL> 
						<SPAN> Observações </SPAN> 
						<TEXTAREA class="message" name="obs" id="obs"></TEXTAREA>
						<p class='hint'> Limite de 500 caracteres. </p>
					</LABEL>
				</DIV>

				<H2> Contagens </H2>
				<DIV class="box4" id="campoPai">
					<LABEL> 
						<SPAN> Índice da contagem: </SPAN>
						<INPUT type="number" class="input_text" name="cont_id" />
					
						<SPAN> Hora: </SPAN>
						<INPUT type="time" class="input_text" name="cont_hora" />
					 
						<SPAN> Total: </SPAN>
						<INPUT type="number" class="input_text" name="cont_total" />
					</LABEL>
					<hr/>
					<LABEL>
						<SPAN> Espécie: </SPAN>
						<?php
						    //consulta
						    $rs = mysql_query("SELECT id, nome_popular FROM especies WHERE categoria = 'aves' ORDER BY nome_popular");
						    //chama a função
						    dinCombo('comboEspe', $rs, 'id', 'nome_popular');
						?>
						<SPAN> Quantidade: </SPAN>
						<INPUT type="number" class="input_text" name="cont_esp[]" />
						<input type="button" class="add" value="Adicionar" onclick="addCampos()">
					</LABEL>
				</DIV>

				<?php include 'botoes.php'; ?>
            
<BR /><BR /><BR /><BR /><BR /><BR /> 
	</BODY>
</HTML> <!-- Finaliza a páginal HTML !-->
