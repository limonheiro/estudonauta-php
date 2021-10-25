<?php 
    $nome = $_SESSION['nome'];
    $busca = $banco->query("SELECT nome, senha, tipo FROM usuarios WHERE `nome` = '$nome' LIMIT 1");
    $reg = !empty($busca) ? $busca->fetch_object() : "";
    // var_dump($reg);
?>
<h3>Alterando dados do usuario: <?php echo $_SESSION['user']; ?></h3>
<form action="user-edit.php" method="post">
    <table>
        <tr><td>Nome: <td><input type="text" name="nome" id="nome" value="<?php echo $reg->nome; ?>">
        <tr><td>Tipo: <td><select name="tipo" id="tipo">
            <option value="admin">Administrador</option>
            <option value="editor" <?php $reg->tipo === 'editor'? 'select' : ''; ?> > Editor </option>
        </select>
        <tr><td>Senha: <td><input type="password" name="senha1" id="senha1">
        <tr><td>Confirmar senha: <td><input type="password" name="senha2" id="senha2">
        <tr><td><input type="submit" value="Alterar"/>
    </table>
</form>
<?php echo voltar(); ?>