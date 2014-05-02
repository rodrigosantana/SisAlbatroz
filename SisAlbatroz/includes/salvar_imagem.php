<?php

date_default_timezone_set('America/Sao_Paulo'); // determina o fuso a ser utilizado em funções que utilizam a hora

function recebeImagem($return = "name"){

	//define("DIR", "../arquivos"); // tentativa de fazer a foto ser salva um nível abaixo. Não funciona.
	
	$dir = dirname(__FILE__)."/arquivos/";
	//mkdir()
	extract($_FILES["arquivo"]);
	//var_dump($_FILES["arquivo"]);
	//exit;
	$novoNome = null;
	if($error === 0){ // recebido com sucesso	
		$typesValidos = array("image/jpeg","image/gif","image/png");
		$type = strtolower($type);	
		if(in_array($type,$typesValidos)){
			switch($type){
				case "image/jpeg":
					$origem = imagecreatefromjpeg($tmp_name);
					break;
				case "image/gif":
					$origem = imagecreatefromgif($tmp_name);
					break;
				case "image/png":
					$origem = imagecreatefrompng($tmp_name);
					break;
			}
			list($larguraAntiga,$alturaAntiga) = getimagesize($tmp_name);
			$larguraNova = $larguraAntiga * 1.0;
			$alturaNova = $alturaAntiga * 1.0;
			
			$dimensoes = getimagesize($tmp_name);
			$larguraAntiga = $dimensoes[0];
			$alturaAntiga = $dimensoes[1];
			
			
			$destino = imagecreatetruecolor($larguraNova,$alturaNova);
			imagecopyresampled($destino,$origem,0,0,0,0,$larguraNova,$alturaNova,$larguraAntiga,$alturaAntiga);
			

			ob_start();
			switch($type){
				case "image/jpeg":
					imagejpeg($destino,null,95);
					break;
				case "image/gif":
					imagegif($destino,null,95);
					break;
				case "image/png":
					imagepng($destino);
					break;
			}
			$conteudo = ob_get_contents();
			ob_end_clean();
			
			$ext = pathinfo($name, PATHINFO_EXTENSION);
			$novoNome = 'foto'.".".date("d-m-y_H-i-s").".".$ext;
			$nomeCompleto = $dir.$novoNome;
			$handle = fopen($nomeCompleto,"w");
			fwrite($handle, $conteudo);
			fclose($handle);
			$recebeu = 1;
		}else{
			$recebeu = -1;
		}
	}else{
		// erro
		$recebeu = 0;
	}
	$m = $recebeu;
	if($return == "name")
		return $novoNome;
	if($return == "conteudo")
		return $conteudo;
}
?>
