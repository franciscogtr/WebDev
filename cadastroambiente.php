<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        <form method="get">
            <fieldset>
                <h2>Cadastrar Ambiente</h2>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome">
                <br><br>
                <label for="imagem">Foto do ambiente:</label>
                <input type="file" name="imagem" id="imagem">
                <br><br>
                <label for="tipo">Tipo de ambiente:</label>
                <select name="tipo" id="tipo">
                    <option value="lab">Laboratório</option>
                    <option value="sal">Sala</option>
                </select>
                <br><br>
                <button type="submit">Cadastrar</button>
            </fieldset>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>
<?php
 if (isset($_GET['nome']) && isset($_GET['imagem']) && isset($_GET['tipo']))
 {
    require_once 'class/rb.php';
    include 'inc/conexaoBD.inc.php';

    $ambiente  = R::findOne('usuario', ' nome = ? ', [$_GET['nome']]);

                // filtro para não cadastrar ambientes iguais

                if ($ambiente) {
                    echo 'ambiente já cadastrado';
                } else {
                    $ambiente = R::dispense('ambiente');
                    $ambiente->nome = $_GET['nome'];
                    $ambiente->imagem = $_GET['imagem'];
                    $ambiente->tipo = $_GET['tipo'];
                    $id = R::store($ambiente);
                    R::close();
                    echo 'Ambiente cadastrado com sucesso!';
                }
 }
?>