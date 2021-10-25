<?php
    session_start();
    // $_SESSION['user']="";
    // $_SESSION['nome']="";
    // $_SESSION['tipo']="";

    if(!isset($_SESSION['user'])){    
        $_SESSION['user']="";
        $_SESSION['nome']="";
        $_SESSION['tipo']="";
    }

    function logout(){
        $_SESSION['user']="";
        $_SESSION['nome']="";
        $_SESSION['tipo']="";
        header("refresh:1;url= http://localhost/estudonauta/");
    }

    function isValue($usuario, $nome, $senha1, $senha2, $tipo){
        $array = [];
        if($senha1 === $senha2){
            if (empty($usuario)) {
                array_push($array, msg_error("campo de usuario obrigatorio"));
            }
            if (empty($nome)){
                array_push($array, msg_error("campo de nome obrigatorio"));
            }
            if (empty($senha1)){
                array_push($array, msg_error("campo de senha obrigatorio"));
            }
            if (empty($tipo)){
                array_push($array, msg_error("campo de tipo obrigatorio"));
            }
        }else{
            array_push($array, msg_error("Senhas não correspondem"));
        }
        return $array;
    }

    function isLoged(){
        return !empty($_SESSION['user']) || !empty($_SESSION['nome']) ;
    }

    function isAdmin(){
        $t = $_SESSION['tipo'];
        if(empty($t)){
            return false;
        } elseif($t == 'admin'){
            return true;
        }else{
            return false;
        }
        return false;
    }

    function isEditor(){
        $t = $_SESSION['tipo'];
        if(empty($t)){
            return false;
        } elseif($t == 'editor'){
            return true;
        }else{
            return false;
        }
        return false;
    }

    function criarSenha($user, $password){
        $string = $user.$password;
        $newPassword = '';
        for($pos = 0; $pos < strlen($string); $pos++){
            $num = ord($string[$pos]);
            $newPassword .= chr($num + round(cos($num)*10));
        }
        return $newPassword;
    }

    function gerarHash($user, $password){
        return password_hash(criarSenha($user,$password), PASSWORD_DEFAULT, ['time_cost'=>100, 'memory_cost'=>'2048k', 'threads'=>6]);
    }

    function verificarHash($user, $password, $hash){
        return password_verify(criarSenha($user,$password), $hash);
    }
    // echo verificarHash('admin', 'admin', '$2y$10$ccJdnrBlvuGTnukEahK58uwpYNKwS9mj2c0AHQTqjbk2L31jeqixq');
?>