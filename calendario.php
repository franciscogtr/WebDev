<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário</title>
    <style>
        table {
            text-align: center;
        }

        td {
            padding-left: 5px;
            padding-right: 5px;

        }

        th {
            color: white;
            background-color: black;
            padding-left: 5px;
            padding-right: 5px;

        }


        #calendario {
            color: black;
            text-decoration: none;
        }

        #calendario:hover {
            color: red;
        }

        tr:nth-child(even) {
            background-color: #C7C7C7;
        }
    </style>
</head>

<body>
    <header>
        <?php
        include 'inc/cabecalho.inc.php';
        // include 'validaracesso.php';
        ?>
    </header>

    <main>
        <h1>Calendário</h1>

        <?php
        date_default_timezone_set('America/Fortaleza');
        $hoje = new DateTime();
        $data = $hoje->format('Y-m');

        ?>
        <form>
            <input type="month" name="mes" id="mes"
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
        include 'inc/rodape.inc.php'
        ?>
    </footer>
</body>

</html>