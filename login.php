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

if (isset($_GET['senha'])) {
    
    $usuario  = R::findOne('usuario', ' email = ? ', [$_GET['email']]);
    // echo $usuario;
}

// session_start();


// $_SESSION['nome'] = $_GET['nome'];
// $_SESSION['email'] = $_GET['email'];
// $_SESSION['senha'] = $_GET['senha'];

// header('Location:index.php');