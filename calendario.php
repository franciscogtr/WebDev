<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Ambientes</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        
    </style>
</head>

<body>
    <header>
        <?php
        include 'inc/cabecalho.inc.php';
        ?>

        <p><a href="index.php" class="voltar">Home</a> </p>
    </header>

    <main>
        <h2>Escolha um mês para reservar</h2>

        <?php
        date_default_timezone_set('America/Fortaleza');
        $hoje = new DateTime();
        $data = $hoje->format('Y-m');

        ?>
        <form id="formMes">
            <input type="month" name="mes" id="mes"
                min="<?= $data; ?>"
                onchange="submit()">
        </form>
        <?php

        if (isset($_GET['mes'])) {

            $data = $_GET['mes'];
            $dataCompleta =  new DateTime($data);

            $strdata = $_GET['mes'];
            $data = new DateTime($strdata);
            // echo $data->format('m');

            switch ($data->format('m')) {
                case '1':
                    $mes = 'Janeiro';
                    break;
                case '2':
                    $mes = 'Fevereiro';
                    break;
                case '3':
                    $mes = 'Março';
                    break;
                case '4':
                    $mes = 'Abril';
                    break;
                case '5':
                    $mes = 'Maio';
                    break;
                case '6':
                    $mes = 'Junho';
                    break;
                case '7':
                    $mes = 'Julho';
                    break;
                case '8':
                    $mes = 'Agosto';
                    break;
                case '9':
                    $mes = 'Setembro';
                    break;
                case '10':
                    $mes = 'Outubro';
                    break;
                case '11':
                    $mes = 'Novembro';
                    break;
                case '12':
                    $mes = 'Dezembro';
                    break;
            }

            echo '<h1 id="data">' . $mes . ' de ' . $data->format('Y') . '</h1>';

        ?>
            <table>
                <thead>
                    <th>Dom</th>
                    <th>Seg</th>
                    <th>Ter</th>
                    <th>Qua</th>
                    <th>Qui</th>
                    <th>Sex</th>
                    <th>Sab</th>
                </thead>
                <tbody>

                    <tr>
                        <?php

                        $espacoinicio =  $data->format('w');
                        // echo $data->format('t');


                        for ($i = 0; $i < $espacoinicio; $i++) {
                            echo "<td>" . ' ' . "</td>";
                        }
                        // echo '<br>' . '<br>';
                        $diasdasemana = 0;
                        $totaldias =  $data->format('t');
                        for (
                            $i = 1, $diasdasemana = $espacoinicio + 1;
                            $i <= $totaldias;
                            $i++, $diasdasemana++
                        ) {
                            echo "<td>";

                        ?>
                            <a id="calendario" href="ambiente.php?data=<?= $data->format('Y-m') . '-' . $i   ?>">
                                <?= $i ?>
                            </a>
                    <?php
                            echo "</td>";
                            if ($diasdasemana % 7 == 0) {
                                echo '</tr>';
                            }
                        }
                        echo '<br>' . '<br>';

                        $strdatafim = '2039-07' . $totaldias;
                        $data = new DateTime($strdatafim);
                        $espacofim = $data->format('w');
                        for ($i = ++$espacofim; $i < 7; $i++) {
                            echo "<td>" . " " . "</td>";
                        }
                    }

                    ?>
                    <!-- <td><a id="calendario" href="processardia.php?dia=$i"></a></td> -->
                    </tr>
                </tbody>
            </table>
    </main>
    </main>
    <footer>
        <?php

        ?>
    </footer>
</body>

</html>