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
    <form action="login.php" method="get">
            <fieldset>
                Credenciais
                <br>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome">
                <br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
                <br>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha">
                <br>
                <button type="submit">Cadastrar</button>
            </fieldset>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>