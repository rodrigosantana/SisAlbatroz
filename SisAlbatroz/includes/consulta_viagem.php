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

<!DOCTYPE HTML PUBLIC> <!-- Define o tipo de arquivo que vai ser, necessário para que a página seje interpretada corretamente !-->
<HTML lang="pt-br"> <!--  Abre o arquivo do tipo HTML e defini a linguagem como portugues do Brasil !-->
	<HEAD> <!-- Cabeçalho que não vai aparecer para o usuário !-->
	<META http-equiv="Content-Type" content="text/html; charset=UTF-8"> <!-- Informações sobre o tipo de texto da página !-->
	<TITLE>Produção Pesqueira</TITLE> <!-- Cabeçalho que vai no titulo da aba do navegador !-->
	
	<LINK rel="stylesheet" type="text/css" href="../css/form.css" /></LINK> <!-- Faz o link com a página de CSS e chama o arquivo !-->
	<script type="text/javascript" src="../js/jquery-1.11.0.js"></script>
    <script type="text/javascript">
	    $(document).ready(function(){
	        $("select#barco").attr("disabled","disabled");
	        $("select#cruz").attr("disabled","disabled");
	        $("select#obser").change(function(){
	            $("select#barco").attr("disabled","disabled");
	            $("select#barco").html("<option>Aguarde...</option>");
	            var id = $("select#obser option:selected").attr('value');
	            $.post("select_barco.php", {id:id}, function(data){
	                $("select#barco").removeAttr("disabled");
	                $("select#barco").html(data);
	                $("select#barco").change(function(){
	                $("select#cruz").attr("disabled","disabled");
	                $("select#cruz").html("<option>Aguarde...</option>");
	                var id2 = $("select#barco option:selected").attr('value');
	                var id1 = $("select#obser option:selected").attr('value');
	                $.post("select_cruz.php", {id2:id2, id1:id1}, function(data){
	                    $("select#cruz").removeAttr("disabled");
	                    $("select#cruz").html(data);
	                    });
	                });
	            });
	        });
	        $("form#select_form").submit(function(){
	            var cat = $("select#obser option:selected").attr('value');
	            var type = $("select#barco option:selected").attr('value');
	            var type2 = $("select#cruz option:selected").attr('value');
	            if(cat>0 && type>0 && type2>0)
	            {
	                var result = $("select#cruz option:selected").html();
	                $("#result").html('Código do cruzeiro: '+result);
	            }
	            else
	            {
	                $("#result").html("Selecione um código de cruzeiro");
	            }
	            return false;
	        });
	    });
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
                
                <DIV class="box4">
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
				
				<?php include 'botoes.php'; ?>
            </FORM>
        </DIV>
<BR /><BR /><BR /><BR /><BR /><BR />
	</BODY>
</HTML> <!-- Finaliza a páginal HTML !--> 