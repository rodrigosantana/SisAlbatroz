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
	<TITLE> Consulta </TITLE> <!-- Cabeçalho que vai no titulo da aba do navegador !-->
	
	<LINK rel="stylesheet" type="text/css" href="../css/form.css" /> <!-- Faz o link com a página de CSS e chama o arquivo !-->
	
	</HEAD>
 	<header align="middle">
 		<DIV>
			<img class="image" src="./img/banner.jpg" alt="banner">
		</DIV>

		<DIV>
			<UL id="menu-bar">
			 <LI class="active"><a href="home.php">Home</a></LI>
			 <LI><a href="#">Formulários</a>
			  <ul>
			   <LI><a href="embarque.php">Embarques</a></LI>
			   <LI><a href="#">Observador</a></LI>
			   <LI><a href="#">Products Sub Menu 3</a></LI>
			   <LI><a href="#">Products Sub Menu 4</a></LI>
			  </UL>
			 </LI>
			 <LI><a href="consulta.php">Consultas</a>
			  <UL>
			   <LI><a href="#">Services Sub Menu 1</a></LI>
			   <LI><a href="#">Services Sub Menu 2</a></LI>
			   <LI><a href="#">Services Sub Menu 3</a></LI>
			   <LI><a href="#">Services Sub Menu 4</a></LI>
			  </UL>
			 </LI>
			 <LI><a href="#">About</a></LI>
			 <LI><a href="index.php">Sair</a></LI>
			</UL>
		</DIV>
	</header>
 	
 	<BODY>
		<DIV id="bloco" class="box3"> <!-- Abre o bloco que contem toda a estrutura da tabela !-->
			<FORM id="tabela" method="post" action="#" enctype="multipart/form-data"> <!-- Cria um documento do tipo formulário !-->
				<H1> Consulta de dados </H1>
				<DIV class='tabela2'> <!-- Utiliza a classe com configurções para a tabela !-->
				<?php //Inicia o código PHP que vai pegar as variáveis do formulário e trabalhar com elas

					$result = select("geral","*",NULL,"ORDER BY id ASC"); // se quiser uma consulta apenas com o nome da tabela e os campos e ordenar os resultados
	
						for($i=0;$i<count($result);$i++){
						}

					echo '<table class="tab" border=1 >'; 

					//exibe a linha com o cabeçalho deficindo a cor de fundo e os nomes
					echo '<tr bgcolor="#1c1c1c">','<font color="#ffffff"></font>';
					echo "<td align='center'> <b>Viagem</b> </td>";
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
					foreach ($result as $dados) {

					//verifica a cor utilizado para o fundo
					$bgcolor = ($i % 2) == 0 ? '#262626' : '#414040';

					//imprime a linha
					echo "<tr bgcolor='$bgcolor'>";

					//exibe as variáveis
					echo "<td align='center'> {$result[$i]['id']} </td>"; // para cada variável FORM[] ira respresentar uma coluna do cabeçalho acima
					echo "<td align='center'> {$result[$i]['cod_obser']} </td>";
					echo "<td align='center'> {$result[$i]['cod_embar']} </td>";
					echo "<td align='center'> {$result[$i]['cod_mestr']} </td>";
					echo "<td align='center'> {$result[$i]['cod_empre']} </td>";
					echo "<td align='center'> {$result[$i]['data_saida']} </td>";
					echo "<td align='center'> {$result[$i]['data_chegada']} </td>";
					echo "<td align='center'> {$result[$i]['financiador']} </td>";
					echo "<td align='center'> {$result[$i]['obs']} </td>";
					echo "</tr>";

					$i++; // a função acima irá se repetir acrescentando um valor a variável $i, sendo repetida enquanto ouver linhas de dados para imprimir
					}
					//finaliza a tabela
					echo '</table>';
				?>
	</BODY>
</HTML> <!-- Finaliza a páginal HTML !-->

