<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>
    <header>
    
    </header>
    <main>
    <form method="get">
    <fieldset>
        <h2 class="form">Login</h2>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha">
        <br><br>
        <p id="padmin">Administrador?
            <input type="checkbox" name="admin" id="admin">
        </p>
        <br><br>
        <button type="submit">Entrar</button>
    </fieldset>
</form>
<?php
require_once 'class/rb.php';
include 'inc/conexaoBD.inc.php';

if (isset($_GET['senha']) && isset($_GET['email'])) {

    $usuario  = R::findOne('usuario', ' email = ? ', [$_GET['email']]);
    R::close();

    if ($usuario) {

        if (password_verify( $_GET['senha'], $usuario->senha)) {

            if ($usuario->admin == $_GET['admin']) {
            
                session_start();

                $_SESSION['nome'] = $usuario->nome;
                $_SESSION['email'] = $usuario->email;
                $_SESSION['senha'] = $usuario->senha;
                $_SESSION['admin'] = $usuario->admin;
            header('Location:index.php');

            }
            else{

                echo 'A opção de Administrador foi
                preenchida INCORRETAMENTE';
            }

        } else {
            echo 'senha incorreta';
        }



        // echo $_SESSION['nome'];
        // echo $_SESSION['email'];
        // echo $_SESSION['senha'];
        // echo $_SESSION['admin'];


    } else {
        echo 'email não cadastrado, ACESSO NEGADO';
    }
}

?>
    </main>
    <footer>

    </footer>
</body>
</html>