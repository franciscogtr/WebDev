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
                <table class ="tableMinhasReservas">
                    <thead>
                        <th>Reservante</th>
                        <th>Ambiente reservado</th>
                        <th>Data da reserva</th>
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
        $todasReservas = R::find('reserva', ' email_resevante LIKE ? ', [$_SESSION['email']]);

        foreach ($todasReservas as $value) {

            // Converte a data do banco (assumindo que está no formato 'YYYY-MM-DD')
            $dataFormatada = DateTime::createFromFormat('Y-m-d', $value->data)->format('d/m/Y');

            printf(
                $corpotabela,
                $value->nome_resevante,
                $value->ambiente,
                $dataFormatada,
                $value->hora
            );
        }

        echo "  </tbody>
                    </table>";
        ?>
        <p>

        </p>
    </main>
    <footer>
        <?php include 'inc/rodape.inc.php' ?>

    </footer>
</body>

</html>