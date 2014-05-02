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
	
	<LINK rel="stylesheet" type="text/css" href="../css/form.css" /> <!-- Faz o link com a página de CSS e chama o arquivo !-->

	<SCRIPT type="text/javascript" src="jquery-1.10.2.min.js"></SCRIPT> <!-- Chama o arquivo com as funcções jquery !-->
    <!-- Chama uma função Ajax utilizando o Jquery. Função tuilizada para chamar a tabela na mesma página. !-->
    <SCRIPT type="text/javascript">
        $(document).ready(function(){   // Carrega a função junto com o documento 
            $('form .submeter').click(function(){ // Determina a ação da função ao clicar no botão da classe dentro do form
                var url = 'tabela.php'; // determina a variável url, sendo de onde vai vir a tabela
                var data = $(this).parents('form').serialize(); // determina a variável de dados com a relação e a função de serializr
                $.post(url,data,function(r){ // função com as varáveis
                    $('#retorna-envio-do-formulario').html(r); //determina a classe do que vai ocorrer após o botão ser clicado
                });
                return false;
            }).parents('form').removeClass('hide'); // ainda a descobrir a função da classe .hide e pq ela é removida. Analisar.
        });
    </SCRIPT> 
	</HEAD>

 	<HEADER align="middle">
		<DIV>
	 		<?php include 'includes/menu.php'; ?>
		</DIV>	
	</HEADER>
 	
 	<BODY>
        <DIV class="box"> <!-- Define o BOX principal com o formulário!-->
            <FORM id="form" method="post" action="#" enctype="multipart/form-data"> <!-- Tipo de formulário e como as informações vão ser enviadas !-->
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
						<INPUT type="text" class="input_text" name="financiador" id='financiador' required='required' />
						<p class='hint'> Insira o orgão financiador desta viagem </p>
					</LABEL>	
				</DIV>

				<DIV class="direita"> <!-- Box da coluna central do formulário !-->
					<LABEL> 
						<SPAN> Data de Saída: </SPAN>
						<!--  Entrada de dados na forma de data, cria um calendário para selecionar a data !-->
						<INPUT type="date" class="input_text" name="data_saida" id="data_saida" required="required"/> 
						<p class="hint"> Marque a data do início da viagem. </p> <!-- Mensagem flutuante que aparece ao colocar o mouse em cima do campo !-->
					</LABEL>
				
					<LABEL> 
						<SPAN> Data de Retorno: </SPAN> 
						<INPUT type="date" class="input_text" name="data_chegada" id="data_chegada" required="required" />
						<p class="hint"> Lembre-se que a data do fim da viagem tem que ser maior que o início da viagem. </p>
					</LABEL>

					<LABEL> 
						<SPAN> Observações </SPAN> 
						<TEXTAREA class="message" name="obs" id="obs"></TEXTAREA>
						<p class='hint'> Limite de 500 caracteres. </p>
					</LABEL>
				</DIV>

				<?php include 'botoes.php'; ?>
				
            <DIV id="retorna-envio-do-formulario"> </DIV> <!-- indica o local aonde vai aparecer a tabela chamada pelo Ajax !-->	 		
            </FORM> 
        </DIV>    
        
            <?php // Funcção condicional para ocorrer após ser pressionado o botão REGISTRAR. O mesmo vai capturar as variáveis e enviar para o banco

				if(isset($_POST["registrar"])) {
					
				//Definindo as variáveis de conexão com o servidor e BD
				$cod_obser = $_POST["comboObservador"];
				$cod_embar = $_POST["comboBarco"]; 
				$cod_mestr = $_POST["comboMestre"];
				$cod_empre = $_POST["comboEmpresa"]; 
				$data_saida = $_POST["data_saida"];
				$data_chegada = $_POST["data_chegada"];
				$financiador = $_POST["financiador"];
				$obs = $_POST["obs"];

				//Abrindo conexão com o servidor e BD
				$link=mysql_connect(SERVER,USER,PASSWORD) or die ("Erro de server imbecil");
				@mysql_select_db(DB, $link) or die("Erro de BD seu kbçudo");
				mysql_query("set names 'utf8', $link");

				// Função para inserir as variáveis descritas no VALUES, na tabela GERAL, dentro das colunas determinadas
				mysql_query("INSERT INTO geral (cod_obser, cod_embar, cod_mestr, cod_empre, data_saida, data_chegada, financiador, obs)
					VALUES ('$cod_obser', '$cod_embar', '$cod_mestr', '$cod_empre', '$data_saida', '$data_chegada', '$financiador','$obs')", $link);

				//fechando a conexão com o banco de dados
				mysql_close($link);
				}

			?>

       
<BR /><BR /><BR /><BR /><BR /><BR /> 
	</BODY>
</HTML> <!-- Finaliza a páginal HTML !-->