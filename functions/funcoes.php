<?php // Arquivo com todas as funções a serem utilizadas nos códigos, caso este arquivo tenha sido chamado no código, a função pode ser utilizada a partir
	 // do nome da função

// Função para criar combobox utilizando dados do banco de dados, usando os valores de ID e aparecendo a descrição dos IDs
function montaCombo($nome, $id, $rs, $valor, $descricao){
   	echo("<select name='$nome' class='combobox' id='$id'>n");
	echo("t<option>--Selecione--</option>n");
	while ($obj = mysql_fetch_object($rs)){			
		echo("t<option value='".$obj->$valor."'> ". $obj->$descricao." </option>n");
	}
	echo("</select>");
}

//Função monta combo para utilizar css modificado para os forms dinamicos
function dinCombo($nome, $rs, $valor, $descricao){
   	echo("<select  class='combobox' name='combo[]'>n");
	echo("t<option>--Selecione--</option>n");
	while ($obj = mysql_fetch_object($rs)){			
		echo("t<option value='".$obj->$valor."'> ". $obj->$descricao." </option>n");
	}
	echo("</select>");
}

// Modo de utilização: 
// $rs = mysql_query("SELECT id, campo FROM tabela ORDER BY campo"); //exemplo de uso da função
?>

<?php 	// Função de consulta genéria ao banco de dados, com diversas opções de resposta
function select($tabela, $campo, $where=NULL, $order=NULL){
	$conn = mysql_connect("localhost","root","anakin88"); // editar host, usuario, senha
	mysql_select_db("albatroz_sis",$conn); // editar para o seu banco de dados
	$sql = "SELECT {$campo} FROM {$tabela} {$where} {$order}"; 
	$query = mysql_query($sql);
	$sql_rows = "SELECT {$campo} FROM {$tabela} {$where}"; //se tiver 'echo' antes da linha, ira aparecer a query
	$query_rows = mysql_query($sql_rows);
	$num = mysql_num_fields($query_rows);
	for($y = 0; $y < $num; $y++){ 
		$names[$y] = mysql_field_name($query_rows,$y);
	}
	for($k=0;$resultado = mysql_fetch_array($query);$k++){
		for($i = 0; $i < $num; $i++){ 
			$resultados[$k][$names[$i]] = $resultado[$names[$i]];
		}
	}
	mysql_close($conn);
	return $resultados; // retorna um array com os resultados da consulta
}
 
/**
*	Modo de utilização
*
*	//$result = select("clientes","*",NULL,"ORDER BY nome ASC"); // se quiser uma consulta apenas com o nome da tabela e os campos e ordenar os resultados
*	
*	//$result = select("clientes","*","WHERE id = '1'",NULL); // se quiser utilizar uma condição na consulta e não ordernar o resultado
*
*	//$result = select("clientes","nome, id, cidade"); // se quiser uma consulta apenas com o nome da tabela e os campos
*
*	for($i=0;$i<count($result);$i++){
*
*		echo $result[$i]['nome']."<br>";
*	
*		echo $result[$i]['id']."<br>";
*	
*		echo $result[$i]['cidade']."<br>";
*	}
*
*	
*/
?>

<?php 	// Função de consulta genéria ao banco de dados, com diversas opções de resposta
/*
function select($tabela, $campo, $where=NULL, $order=NULL){
	$conn = mysql_connect("localhost","root",""); // editar host, usuario, senha
	mysql_select_db("albatroz_sis",$conn); // editar para o seu banco de dados
	$sql = "SELECT {$campo} FROM {$tabela} {$where} {$order}"; 
	$query = mysql_query($sql);
	$sql_rows = "SELECT {$campo} FROM {$tabela} {$where}"; //se tiver 'echo' antes da linha, ira aparecer a query
	$query_rows = mysql_query($sql_rows);
	$num = mysql_num_fields($query_rows);
	for($y = 0; $y < $num; $y++){ 
		$names[$y] = mysql_field_name($query_rows,$y);
	}
	for($k=0;$resultado = mysql_fetch_array($query);$k++){
		for($i = 0; $i < $num; $i++){ 
			$resultados[$k][$names[$i]] = $resultado[$names[$i]];
		}
	}
	mysql_close($conn);
	return $resultados; // retorna um array com os resultados da consulta
}
*/
?>

