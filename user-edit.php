<?php
    require_once "__modelo.php";
    if (!isLoged()){
        echo "É necessario fazer o <a href='user-login.php'>login</a>.";
    }elseif(!isset($_POST['nome'])){
        include 'user-edit-form.php';
    }else{
        $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING) ?? null;
        $tipo = filter_var($_POST['tipo'], FILTER_SANITIZE_STRING) ?? null;
        $senha1 = $_POST['senha1'] ?? null;
        $senha2 = $_POST['senha2'] ?? null;
        $u = $_SESSION['user'];
        $nullSenha = empty($senha1) && empty($senha2) ? 'senha' : "" ;
        $array = isValue($u, $nome, $senha1, $senha2, $tipo);
        // var_dump($array, empty($array));
        if(empty($array)){
            $senha = gerarHash($u, $senha1);
            $q = "UPDATE usuarios SET nome = '$nome', tipo = '$tipo', senha = '$senha' WHERE usuario = '$u' ";
            if($banco->query($q)){
                echo msg_sucess("Alterações feitas com Sucesso.");
                header("refresh:2;url=index.php");
            }else{
                echo msg_error("Erro nas alterações o Usuario ");
                echo $banco->error;
            }
        }else{
            foreach($array as $a){
                echo $a;
            }
        }
        header("refresh:2;url=user-edit.php");
    }
?>
        </div>
    </body>
</html>