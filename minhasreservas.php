<!DOCTYPE html>
<html lang="en">

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

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        require_once 'class/rb.php';
        include 'inc/conexaoBD.inc.php';

       

        $iniciotabela = <<<INICIO
                <table>
                    <thead>
                        <th>Reservante</th>
                        <th>Data da reserva</th>
                        <th>Ambiente reservado</th>
                        <th>Hora reservada</th>
                    </thead>
                    <tbody>
INICIO;

        $corpotabela = <<<CORPO
            <tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                        </tr>
CORPO;


        echo $iniciotabela;
        $todasReservas = R::find('reserva', ' nome_resevante LIKE ? ', [$_SESSION['nome']]);       
        
        foreach ($todasReservas as $key => $value) {
            printf(
                $corpotabela,
                $value->nome_resevante,
                $value->ambiente,
                $value->data,
                $value->hora
            );
        }

        echo "  </tbody>
                    </table>";
        ?>
        <p >

        </p>
    </main>
    <footer>
        <?php include 'inc/rodape.inc.php' ?>

    </footer>
</body>

</html>