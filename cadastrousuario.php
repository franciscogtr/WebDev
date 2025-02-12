<?php
        //Inicia a sessão caso ainda n tenha sido iniciada

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        //Impede acesso de visitantes ou usuários que não são admins

        if (!isset($_SESSION['nome']) or !isset($_SESSION['admin'])) {
            header('Location:login.php');
        }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        
    </header>
    <main>
        <form action>
            <fieldset>
            <h2 class="form">Cadastrar Usuário</h2>
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
                <a href="index.php" class="voltar">Home</a>
                <button type="submit">Cadastrar</button>
            </fieldset>
        </form>
        <?php

        if (isset($_GET['nome']) && isset($_GET['email']) && isset($_GET['senha'])) {

            require_once 'class/rb.php';
            include 'inc/conexaoBD.inc.php';

            $usuario  = R::findOne('usuario', ' email = ? ', [$_GET['email']]);
            //echo $usuario;

            // filtro para não cadastrar emails iguais, pois email é a chave de busca em login.php

            if ($usuario) {

                echo 'email já cadastrado';

            } else {

                $usuario = R::dispense('usuario');
                $usuario->nome = $_GET['nome'];
                $usuario->email = $_GET['email'];
                $usuario->senha = password_hash($_GET['senha'], PASSWORD_DEFAULT);
                $usuario->admin = $_GET['admin'];
                $id = R::store($usuario);
                R::close();
                echo 'Usuario cadastrado com sucesso!';
            }
        }

        ?>

    </main>
    <footer>
        <?php include 'inc/rodape.inc.php' ?>
    </footer>
</body>

</html>