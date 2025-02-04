<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>

<body>
    <header>
        <h1>Cadastro Root</h1>
    </header>
    <main>

        <?php

        require_once 'class/rb.php';
        include 'inc/conexaoBD.inc.php';

        $usuario = R::load('usuario', 1);
        // echo $usuario->id;

        if ($usuario->id == 0) {

            $usuario = R::dispense('usuario');
            $usuario->nome = 'root';
            $usuario->email = 'root@mail.com';
            $usuario->senha = 'asdf';
            $usuario->admin = TRUE;
            $id = R::store($usuario);

            echo 'Cadastro realizado com sucesso"';
        } else {
            echo 'Usuário root já existe';
        }

        R::close();
        ?>

    </main>
    <footer>

    </footer>
</body>

</html>