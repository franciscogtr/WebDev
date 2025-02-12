<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reserva horario</title>
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

        if (isset($_GET['ambiente']) && isset($_GET['data'])) {
            $ambiente = $_GET['ambiente'];
            $data = $_GET['data'];
            // echo $ambiente;
        }

        //Buscando reservas feitas no dia selecionado
        $reservas = R::find('reserva', ' data LIKE ? ', [$_GET['data']]);
        // foreach ($reservas as $reserva) {
        //     echo '<p>' . $reserva->hora . '</p>';
        // }
        ?>

        <h2>Selecione os Horários para Reserva</h2>

        <table class="reserva">
            <tbody>
                <?php
                $hora_inicial = 7;  // Hora de início
                $hora_final = 18;   // Hora final
                $index = 0;         // Variável para controle da linha

                // Laço para gerar a tabela dinamicamente
                for ($hora = $hora_inicial; $hora <= $hora_final; $hora++) {
                    $hora_formatada = str_pad($hora, 2, '0', STR_PAD_LEFT) . ":00";

                    // Começa uma nova linha a cada 3 horários
                    if ($index % 3 == 0) {
                        echo "<tr>";
                    }

                    // Verificar se o horário está reservado
                    $disponivel = true;
                    foreach ($reservas as $reserva) {
                        if ($reserva->hora == $hora_formatada && $reserva->ambiente == $ambiente) {
                            $disponivel = false;
                            break;
                        }
                    }

                    // Se não estiver disponível, exibe como texto desabilitado
                    if (!$disponivel) {
                        echo "<td><span style='color:#a0a0a0; text-decoration:none;'>$hora_formatada</span></td>";
                    } else {
                        // Caso esteja disponível, exibe o link
                        echo "<td><a id='calendario' href='processareserva.php?hora=$hora_formatada&ambiente=$ambiente&data=$data'>$hora_formatada</a></td>";
                    }

                    // Fechando a linha a cada 3 horários
                    if ($index % 3 == 2) {
                        echo "</tr>";
                    }

                    $index++;
                }
                ?>
            </tbody>
        </table>

        <div class="divReserva"><button class="buttonReserva" type="button"><a class="acabecalho" href="index.php">Finalizar</a></button></div>
                    
    </main>
    <footer>
        <?php include 'inc/rodape.inc.php' ?>
    </footer>
</body>

</html>