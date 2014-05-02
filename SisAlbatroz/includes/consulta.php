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
	<TITLE> Consulta de Dados </TITLE> <!-- Cabeçalho que vai no titulo da aba do navegador !-->
	<LINK rel="stylesheet" type="text/css" href="../css/form.css" /> <!-- Faz o link com a página de CSS e chama o arquivo !-->
	</HEAD>
 	
 	 <HEADER>
 		<?php include 'menu.php'; ?>
 	</HEADER>
 	
 	<BODY>
		<DIV id="bloco" class="box3"> <!-- Abre o bloco que contem toda a estrutura da tabela !-->
			<FORM id="tabela" method="post" action="#" enctype="multipart/form-data"> <!-- Cria um documento do tipo formulário !-->
				<H1> Consulta de dados </H1>
				<DIV class='tabela2'> <!-- Utiliza a classe com configurções para a tabela !-->
				<table class='tab' border="1">
					<thead>
						<tr>
							<th>Viagem</th>
							<th>Observador</th>
							<th>Embarcação</th>
							<th>Mestre</th>
							<th>Empresa</th>
							<th>Data de Saída</th>
							<th>Data de Chegada</th>
							<th>Financiador</th>
							<th>Observações</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = 
								"SELECT
								geral.cod_obser,
								geral.cod_embar,
								geral.cod_mestr,
								geral.cod_empre,
								geral.data_saida AS data_saida,
								geral.data_chegada AS data_chegada,
								geral.financiador AS financiador,
								geral.obs AS obs,
								geral.viagem AS viagem,
								observador.nome AS observador,
								embarcacao.nome as embarcacao,
								mestre.nome AS mestre,
								empresa.nome AS empresa
								FROM geral, observador, embarcacao, mestre, empresa
								WHERE geral.cod_obser = observador.id AND
								geral.cod_embar = embarcacao.id AND
								geral.cod_mestr = mestre.id AND
								geral.cod_empre = empresa.id
								ORDER BY viagem";
								

						$result = mysql_query($query);
						while($dados = mysql_fetch_array($result)):
						?>


						<tr class='tabcorpo'>
							<td><?php echo $dados["viagem"] ?></td>
							<td><?php echo $dados["observador"] ?></td>
							<td><?php echo $dados["embarcacao"] ?></td>
							<td><?php echo $dados["mestre"] ?></td>
							<td><?php echo $dados["empresa"] ?></td>
							<td><?php echo $dados["data_saida"] ?></td>
							<td><?php echo $dados["data_chegada"] ?></td>
							<td><?php echo $dados["financiador"] ?></td>
							<td><?php echo $dados["obs"] ?></td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</FORM>
		</DIV>
	</BODY>
</HTML> <!-- Finaliza a páginal HTML !-->

