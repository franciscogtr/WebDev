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
    <title>Cadastrar Ambiente</title>
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

    
        <form method="get">
            <fieldset>
                <h2 class="form">Cadastrar Ambiente</h2>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome">
                <br><br>
                <label for="imagem">Foto do ambiente:</label>
                <input class="ambiente" type="file" name="imagem" id="imagem">
                <br><br>
                <label for="tipo">Tipo de ambiente:</label>
                <select class="ambiente" name="tipo" id="tipo">
                <option value="">Selecionar</option>
                <option value="lab">Laboratório</option>
                <option value="sal">Sala</option>
                </select>
                <br><br>
                <a href="index.php" class="voltar">Voltar</a>
                <button type="submit">Cadastrar</button>
            </fieldset>
        </form>
    </main>
    <footer>
    <?php
        include 'inc/rodape.inc.php'
        ?>
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