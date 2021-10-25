<h1>Novo Usuario</h1>

<form action="user-new.php" method="post">
    <table>
        <tr><td>Usuario: <td><input type="text" id="usuario" name="usuario" size='10'>
        <tr><td>Nome: <td><input type="text" name="nome" id="nome" maxlength="255">
        <tr><td>Tipo: <td><select name="tipo" id="tipo">
            <option value="admin">Administrador do Sistema</option>
            <option value="editor" selected>Editor do Sistema</option>
        </select>
        <tr><td>Senha: <td><input type="password" name="senha1" id="senha1">
        <tr><td>Confirmar senha: <td><input type="password" name="senha2" id="senha2">
        <tr><td><input type="submit" value="Cadastrar Usuário">
    </table>
</form>