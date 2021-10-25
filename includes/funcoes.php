<?php
	function thumb($arq):string
	{
		$direct = "fotos/{$arq}"; 
		if(is_null($direct) || !file_exists($direct)){
			return "fotos/indisponivel.png";
		}else{
			return $direct;
		}
	}

	function voltar(){
		return '<a href="http://localhost/estudonauta/"> <i class="material-icons">arrow_back</i> </a>';
	}

	function msg_sucess($msg){
		$resp = "<div id='sucess'><i class='material-icons'>check_circle</i> $msg</div>";
		return $resp;
	}

	function msg_warning($msg){
		$resp = "<div id='warning'><i class='material-icons'>warning</i> $msg</div>";
		return $resp;
	}

	function msg_error($msg){
		$resp= "<div id='error'><i class='material-icons'>error</i> $msg</div>";
		return $resp;
	}
?>
