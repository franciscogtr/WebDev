<form method="get">
    <fieldset>
        Credenciais
        <br><br>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha">
        <br><br>
        <p>Administrador?
            <input type="checkbox" name="admin" id="admin">
        </p>
        <br><br>
        <button type="submit">Entrar</button>
    </fieldset>
</form>
<?php
require_once 'class/rb.php';
include 'inc/conexaoBD.inc.php';

if (isset($_GET['senha']) && isset($_GET['email']) && isset($_GET['nome'])) {

    $usuario  = R::findOne('usuario', ' email = ? ', [$_GET['email']]);
    R::close();

    if ($usuario) {
        session_start();
        $_SESSION['nome'] = $usuario->nome;
        $_SESSION['email'] = $usuario->email;
        $_SESSION['senha'] = $usuario->senha;
        $_SESSION['admin'] = $usuario->admin;

        // echo $_SESSION['nome'];
        // echo $_SESSION['email'];
        // echo $_SESSION['senha'];
        // echo $_SESSION['admin'];

        header('Location:index.php');
    } else {
        echo 'usuario não cadastrado, ACESSO NEGADO';
    }
}

?>