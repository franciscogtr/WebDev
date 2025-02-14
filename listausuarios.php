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
    <title>Minhas reservas</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <?php include 'inc/cabecalho.inc.php' ?>
        <p><a href="index.php" class="voltar">Home</a> </p>
    </header>
    <main>

    

        <?php

        require_once 'class/rb.php';
        include 'inc/conexaoBD.inc.php';



        $iniciotabela = <<<INICIO
                <table class ="tableMinhasReservas">
                    <thead>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Excluir</th>
                    </thead>
                    <tbody>
INICIO;

        $corpotabela = <<<CORPO
            <tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>
                            <a href="excluirusuario.php?email=%s">
                            <div class="divIcon"></div>
                            </a>
                            </td>
                        </tr>
CORPO;

        $todosUsuarios = R::find( 'usuario', ' id > 1 ');
        echo $iniciotabela;
        
        foreach ($todosUsuarios as $value) {

            printf(
                $corpotabela,
                $value->nome,
                $value->email,
                $value->email
            );
        }

        echo "  </tbody>
                    </table>";
        ?>
        
    </main>
    <footer>
        <?php include 'inc/rodape.inc.php' ?>

    </footer>
</body>

</html>