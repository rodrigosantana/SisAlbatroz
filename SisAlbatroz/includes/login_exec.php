<?php //Código de execução do login, verifica com o banco de dados as credenciais e valida a sessão

	//Inicia a sessão
	session_start();
 	
 	// Define as variáveis de conexão com o BD e faz a conexão
	define("SERVER","localhost"); 
	define("USER", "root");
	define("PASSWORD", "anakin88");
	define("DB", "albatroz_login");

/*
	// configurações do hostinger
	define("SERVER","mysql.hostinger.com.br"); 
	define("USER", "u667336753_login");
	define("PASSWORD", "oceano");
	define("DB", "u667336753_login");
*/

	$link=mysql_connect(SERVER,USER,PASSWORD) or die ("Erro de conexão com o SERVIDOR");
	@mysql_select_db(DB, $link) or die("Erro de conexão com o BANCO DE DADOS");
 
	// Array para armazenar os erros de validação 
	$errmsg_arr = array();
 
	//Bandeira de erro de validação 
	$errflag = false;
 
	// Função para sanitizat os valores recebidos do formulário. Previne SQL injection. Tipo de ameaça de segurança.
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
 
	//Sanitiza os valores POST
	$username = clean($_POST['login']);
	$password = clean($_POST['senha']);
 
	//Entra com as validações, retornando mensagens de erro caso falte informações
	if($username == '') {
		$errmsg_arr[] = 'Usuário não encontrado';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Senha não encontrada';
		$errflag = true;
	}
 
	//Se houver entrada de validações, redireciona oara a página de login
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: ../index.php");
		exit();
	}
 
	//Cria a requisição ao servidor
	$qry="SELECT * FROM usuarios WHERE login='$username' AND senha='$password'";
	$result=mysql_query($qry);
 
	//Verifica se a requisição foi bem sucedida ou não
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Caso a requisição seja bem sucedida
			session_regenerate_id(); // Gera um novo ID para a sessão aberta 
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id']; 
			$_SESSION['SESS_FIRST_NAME'] = $member['login'];
			$_SESSION['SESS_LAST_NAME'] = $member['senha'];
			session_write_close();
			header("location: home.php"); // Chama a página após o sucesso do login
			exit();
		}else {
			//Caso o login tenha falhado
			$errmsg_arr[] = 'Nome de usuário e senha não encontrados';
			$errflag = true; // Indica como verdadeira a bandeira de erro de validação
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: ../index.php"); // Caso o login tenha falhado, retorna para a tela inicial do login
				exit();
			}
		}
	}else {
		die("Query Falhou");
	}
?>