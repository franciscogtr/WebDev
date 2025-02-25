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
    <?php
        include 'inc/cabecalho.inc.php'
        ?>  
         <p><a href="index.php" class="voltar">Home</a> </p> 
    </header>
    <main>
        <form action>
            <fieldset>
            <h2 class="form">Cadastrar Usuário</h2>
                <br><br>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
                <br><br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                <br><br>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" minlength="8" required>
                <br><br>
                <p>Administrador?
                <input type="checkbox" name="admin" id="admin">
                </p>
                <br><br>
                <p class="pHeader"><a href="index.php" class="voltar">Voltar</a></p>
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

                
                echo '<div class="msg">' . '<p class="msgRed">'  . 'email já cadastrado!' . '</p>' .  '</div>' ;

            } else {

                $usuario = R::dispense('usuario');
                $usuario->nome = $_GET['nome'];
                $usuario->email = $_GET['email'];
                $usuario->senha = password_hash($_GET['senha'], PASSWORD_DEFAULT);
                
                if (isset($_GET['admin'])) {
                    $usuario->admin = $_GET['admin'];
                }

                $id = R::store($usuario);
                R::close();
                echo '<div class="msg">' . '<p class="msgGreen">'  . 'Usuario cadastrado com sucesso!' . '</p>' . '</div>';
            }
        }

        ?>

    </main>
    <footer>
        <?php include 'inc/rodape.inc.php' ?>
    </footer>
</body>

</html>