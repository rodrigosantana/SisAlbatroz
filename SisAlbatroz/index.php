<!DOCTYPE html> <!-- página inicial com os campos de login e senha que irá redirecionar para o arquivo login_exec.php para validação das credenciais
				     e irá redirecioar para o restante das páginas, caso a validação seje verdadeira !-->
<?php
	//Abre a sessão
	session_start();	
	//Limpa as variáveis guardadas na sessão
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<HTML lang="pt-br">
	<HEAD>
		<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<TITLE> Acesso ao Sistema </TITLE>
		<LINK rel="stylesheet" type="text/css" href="./css/login.css" />
	</HEAD>
	<BODY>
		<header>
			<img class="imagem" width="100%" src="./img/banner.jpg" alt="banner">
		</header>
		
		<form name="loginform" action="./includes/login_exec.php" method="post" class="login">  <!-- Determina o tipo de arquivo e para onde irá as variáveis e o método de envio !-->
			<table width="309" border="0" align="center" cellpadding="2" cellspacing="5"> <!-- usar o css para modificar o campo !--> <!-- Determina as especificações da tabela !-->
			  <tr>
			    <td colspan="2">
					<!--Código para imprimir a messagem de entrada de validação -->
					 <?php
						if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
						echo '<ul class="err">';
						foreach($_SESSION['ERRMSG_ARR'] as $msg) {
							echo '<li>',$msg,'</li>'; 
							}
						echo '</ul>';
						unset($_SESSION['ERRMSG_ARR']);
						}
					?>
				</td>
			  </tr>

			<p>
		      <label for="login">Usuário:</label>
		      <input type="text" name="login" id="login">
		    </p>

		    <p>
		      <label for="password">Senha:</label>
		      <input type="password" name="senha" id="password">
		    </p>

		    <p class="login-submit">
		      <button type="submit" class="login-button">Login</button>
		    </p>
		    
		  </form>

	</BODY>

</HTML>
       


