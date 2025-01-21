<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>
<body>
    <header>
        <h1>Cadastro Admin</h1>
    </header>
    <main>
    <form>
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
                <button type="submit">Cadastrar</button>
            </fieldset>
            <?php
                require 'class/rb.php';
              include 'conexaoBD.inc.php.php';

              $usuario = R::dispense('usuario');
              $usuario->nome = $_GET['nome'];
              $usuario->email = $_GET['email'];
              $usuario->senha = $_GET['senha'];
              $usuario->admin = TRUE;
            ?>
        </form>

    </main>
    <footer>

    </footer>
</body>
</html>