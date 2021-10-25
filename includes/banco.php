<?php	
	setlocale(LC_ALL,'pt_BR.UTF8');
	mb_internal_encoding('UTF8'); 
	mb_regex_encoding('UTF8');
	
	$banco = new mysqli('localhost', 'root', "", "bd_games");
	if($banco->connect_errno){
		echo "<p>Encontrado um é erro: {$banco->errno} --> {$banco->connect_error}";
		die();
	}
	
	$banco->query("SET NAMES 'utf8'");
	$banco->query("SET character_set_connection=utf8");
	$banco->query("SET character_set_client=utf8");
	$banco->query("SET character_set_results=utf8");
?>
