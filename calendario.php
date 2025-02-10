<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Ambientes</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <?php
        
        ?>
    </header>

    <main>
        <h2>Escolha um mês para reservar</h2>

        <?php
        date_default_timezone_set('America/Fortaleza');
        $hoje = new DateTime();
        $data = $hoje->format('Y-m');

        ?>
        <form id="formMes">
            <input id="inputMes" type="month" name="mes" id="mes"
                min="<?= $data; ?>"
                onchange="submit()">
        </form>
        <?php

        if (isset($_GET['mes'])) {

            $data = $_GET['mes'];
            $dataCompleta =  new DateTime($data);

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
                        $strdata = $_GET['mes'];
                        $data = new DateTime($strdata);

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

                        $strdatafim = '2039-07-' . $totaldias;
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