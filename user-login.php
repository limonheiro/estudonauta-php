<!DOCTYPE html>
<html lang="pt-br">

	<?php
		require_once "head.php";
	?>
    <title> <?php echo !empty($busca) ? $busca->fetch_object()->nome  : 'Login'; ?> </title>

    <style>
        div#corpo{
            width: 20%;
            font-size: 15px;
        }
        td{
            padding: 6px;
        }
    </style>
	<body>
		<div id="corpo">
            <?php
                $u = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING) ?? null;
                $p = htmlentities($_POST['senha'], ENT_QUOTES, 'UTF-8') ?? null;
                if(is_null($u)||is_null($p)){
                    require "user-login-form.php";
                }else{
                    $sql = "SELECT usuario, nome, senha, tipo FROM usuarios where usuario = '$u' LIMIT 1";
                    $busca = $banco->query($sql);
                    if(!$busca){
                        echo msg_error("Não foi possivel acessar o banco!");
                    }else if($busca->num_rows > 0 ){
                        $reg = $busca->fetch_object();
                        // echo criarSenha($u,$p).'<br>';
                        // echo gerarHash($u,$p).'<br>';
                        // echo $u.'<br>'.$p.'<br>'.$reg->senha;
                        // echo verificarHash($u, $p, $reg->senha);
                        if(verificarHash($u, $p, $reg->senha)){
                            echo msg_sucess("Login com sucesso!");
                            $_SESSION['user'] = $reg->usuario;
                            $_SESSION['nome'] = $reg->nome;
                            $_SESSION['tipo'] = $reg->tipo;
                            header("refresh:1;url= http://localhost/estudonauta/");
                        }else{
                            echo msg_error("Senha incorreta!");
                            header("refresh:1;url=http://localhost/estudonauta/user-login.php");
                        }

                    }else{
                        echo msg_error("usuario não existe!");
                    }
                }
            ?>
            
        </div>
    </body>
</html>