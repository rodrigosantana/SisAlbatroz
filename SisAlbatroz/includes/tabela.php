<?php

session_start(); //Abre a sessão. Usado para verificar se o login foi efetuadao

	//Verifica se a variavel da sessão SESS_MEMBER_ID está presente ou não
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: index.php");
		exit();
	}

	if(isset($_POST)): ?> <!-- Condicional caso exista variáveis que foram enviadas via $_POST. O código, apesar de fechado
								 apresenta dois pontos, o que o mantém aberto o php, porém possibilitando o uso de HTML !-->

<DIV id="bloco"> <!-- Abre o bloco que contem toda a estrutura da tabela !-->
	<DIV id="tabela" class="box2" method="post" action="#" enctype="multipart/form-data"> <!-- Cria um documento do tipo formulário !-->
		<H1> Campo para conferência dos dados preenchidos </H1>
		<DIV class='tabela'> <!-- Utiliza a classe com configurções para a tabela !-->
		<?php //Inicia o código PHP que vai pegar as variáveis do formulário e trabalhar com elas

		//importa o arquivo com funções, incluindo a função de pesquisa genérica ao banco
		require_once('../functions/funcoes.php');
		
		//nomeando as variaveis que foram capturadas do formulário
		$cod_obser = $_POST["comboObservador"];
		$cod_embar = $_POST["comboBarco"]; 
		$cod_mestr = $_POST["comboMestre"];
		$cod_empre = $_POST["comboEmpresa"]; 
		$data_saida = $_POST["data_saida"];
		$data_chegada = $_POST["data_chegada"];
		$financiador = $_POST["financiador"];
		$obs = $_POST["obs"];

		
		//função para fazer a consulta ao BD e retornar a variável relacionada ao ID
		$result = select("observador","nome","WHERE id = '$cod_obser'",NULL);
		$result2 = select("embarcacao","nome","WHERE id = '$cod_embar'",NULL);
		$result3 = select("empresa","nome","WHERE id = '$cod_empre'",NULL);
		$result4 = select("mestre","nome","WHERE id = '$cod_mestr'",NULL);
		for($i=0;$i<count($result);$i++){
			$obser = $result[$i]['nome']; //renomeando a variavel com código que era array para um string para ser utilizado na tabela
			$embar = $result2[$i]['nome'];
			$empre = $result3[$i]['nome'];//Print na tela o resultado desejado
			$mestr = $result4[$i]['nome'];
			}

		// Array com o resultado do query das variáveis	que vão ser utilizadas na tabela
		$dados[] = array($obser, $embar, $mestr, $empre, $data_saida, $data_chegada, $financiador, $obs); 

		//abre a tabela defininfo o a largura e o tamanho da borda
		echo '<table class="tab" border=1>'; 

		//exibe a linha com o cabeçalho deficindo a cor de fundo e os nomes
		echo '<tr bgcolor="#1c1c1c">','<font color="#ffffff"></font>';
		echo "<td align='center'> <b>Observador</b> </td>";
		echo "<td align='center'> <b>Embarca&ccedil;&atilde;o</b> </td>"; //códigos UTF utilizados para deifinir letras com acento e coisas do tipo para serem 
		echo "<td align='center'> <b>Mestre</b> </td>";					 //	interpretados sem erros
		echo "<td align='center'> <b>Empresa</b> </td>";
		echo "<td align='center'> <b>Data de Sa&iacute;da</b> </td>";
		echo "<td align='center'> <b>Data de Chegada</b> </td>";
		echo "<td align='center'> <b>Financiador</b> </td>";
		echo "<td align='center'> <b>Observa&ccedil;&otilde;es</b> </td>";
		echo "</tr>"; // Fecha o cabeçalho 

		$i = 0; // identifica uma variável chamada $i como valor inicial de 0

		//percorre os dados utilizando uma função transformando a variável dados em form
		foreach ($dados as $form) {
			
			//verifica a cor utilizado para o fundo
			$bgcolor = ($i % 2) == 0 ? '#262626' : '#262626';

			//imprime a linha
			echo "<tr bgcolor='$bgcolor'>";
			//exibe as variáveis
			echo "<td align='center'> {$form[0]} </td>"; // para cada variável FORM[] ira respresentar uma coluna do cabeçalho acima
			echo "<td align='center'> {$form[1]} </td>";
			echo "<td align='center'> {$form[2]} </td>";
			echo "<td align='center'> {$form[3]} </td>";
			echo "<td align='center'> {$form[4]} </td>";
			echo "<td align='center'> {$form[5]} </td>";
			echo "<td align='center'> {$form[6]} </td>";
			echo "<td align='center'> {$form[7]} </td>";
			echo "</tr>";

			$i++; // a função acima irá se repetir acrescentando um valor a variável $i, sendo repetida enquanto ouver linhas de dados para imprimir
		}
		//finaliza a tabela
		echo '</table>';
		?>
	    <BUTTON type="submit" name="registrar" class="bregistrar"> Registrar </BUTTON>

	</DIV>
</DIV> 		

<?php else: ?> <!-- Caso nenhuma variável ser enviada da forma $_POST, irá retornar mensagem abaixo !-->

Nenhum dado recebido no método $_POST. 

<?php endif; ?> <!-- Finaliza a condicional IF aberta no início do código fechando toda a estrutura !-->