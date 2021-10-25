<head>
    <?php
        require_once "includes/banco.php";
        require_once "includes/login.php";
        require_once "includes/funcoes.php";
        $c = $_GET['cod'] ?? "";
        $q = "select * from jogos where jogos.cod = '$c'";
        $busca = $c ? $banco->query($q) : "";
    ?>
    
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="estilos/estilo.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>