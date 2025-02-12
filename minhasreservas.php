<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas reservas</title>
</head>

<body>
    <header>
        <?php include 'inc/cabecalho.inc.php' ?>
        <p><a href="index.php" class="voltar">Home</a> </p>
    </header>
    <main>

        <?php

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        require_once 'class/rb.php';
        include 'inc/conexaoBD.inc.php';

        $todasReservas = R::find('reserva', ' nome LIKE ? ', [$_SESSION['nome']]);

        foreach($todasReservas as $reservasfeitas){

        }
    
        ?>
    </main>
    <footer>
        <?php include 'inc/rodape.inc.php' ?>

    </footer>
</body>

</html>