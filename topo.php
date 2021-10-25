<?php
	echo "<header>";
	if(empty($_SESSION['user'])){
		echo "<a href='user-login.php'>Entrar</a>";
	}else{
		echo "Olá, <strong>".$_SESSION['nome']."</strong> | <a href='user-edit.php'>Meus Dados</a> | ";
		if(isAdmin()){
			echo "<a href='user-new.php'>Novo Usuário</a> | Novo Jogo | ";
		}
		echo "<a href='sair.php'>Sair</a>";
		echo " ({$_SESSION['tipo']})";
	}
	echo "</header>";
?>
