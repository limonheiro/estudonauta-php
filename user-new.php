<!DOCTYPE html>
<html lang="pt-br">

	<?php
		require_once "head.php";
	?>

	<body>
		<div id="corpo">
           <?php
            if(isAdmin()){
                if(!isset($_POST['usuario'])){
                    require_once 'user-new-form.php';
                    echo voltar();
                }else{
                    $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING) ?? null;
                    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING) ?? null;
                    $tipo = filter_var($_POST['tipo'], FILTER_SANITIZE_STRING) ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;

                    $array = isValue($_POST['usuario'], $nome, $senha1, $senha2, $tipo);
                    if(empty($array)){
                        $senha = gerarHash($usuario, $senha1);
                        $q = "INSERT INTO usuarios (usuario, nome, senha, tipo) VALUES('$usuario', '$nome', '$senha', '$tipo')";
                        if($banco->query($q)){
                            echo msg_sucess("Usuario cadastrado com sucesso");
                        }else{
                            echo msg_error("Erro ao cadastrar o usuario. Erro: ".$banco->errno);
                        }
                    }else{
                        foreach($array as $a){
                            echo $a;
                        }
                    }
                    // header('refresh:1;url=user-new.php');
                }
            }else{
                echo msg_error("Área restrita!");
                header('refresh:1;url=index.php');
            }
            
           ?>
        </div>
    </body>
</html>