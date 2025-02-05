<?php

require_once 'class/rb.php';
include 'inc/conexaoBD.inc.php';

$salas = R::find('ambiente', ' tipo LIKE ? ', ['sal']);
$labs = R::find('ambiente', ' tipo LIKE ? ', ['lab']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Ambientes</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <nav>

        <a class="aheader" href="calendario.php">Calendário</a>
        <a class="aheader" href="minhssreservas.php">Minhas Reservas</a>
        <select id="cadastrar" onchange="redirecionarPagina()">
        <option value="">Cadastrar</option>
        <option value="cadastroambiente.php">Ambiente</option>
        <option value="cadastrousuario.php">Usuário</option>
        </select>

    <script>
        function redirecionarPagina() {
            var select = document.getElementById("cadastrar");
            var valor = select.value;
            if (valor) {
                window.location.href = valor;  // Redireciona para a página selecionada
            }
        }
    </script>
        <a class="aheader" href="sobre.php">Sobre</a></p>

        <?php
        include 'inc/cabecalho.inc.php'
        ?>

    </nav>
    <main>
        <h2>Ambientes</h2>

        <h3>Salas</h3>

        <?php

        $heredoc = <<<CARDINDEX

         <div class='cardindex'>
            <div>
                <img src="img/%s" alt="Imagem do Ambiente">
            </div>
            <div>
                <p>%s</p>
            </div>
        </div>

CARDINDEX;
        if (count($salas) > 0) {
            foreach ($salas as  $sala) {
                printf($heredoc, $sala->imagem, $sala->nome);
            }
        }
        ?>
        <h3>Laboratórios</h3>
        <?php
        if (count($salas) > 0) {
            foreach ($labs as  $lab) {
                printf($heredoc, $lab->imagem, $lab->nome);
            }
        }
        ?>
    </main>
    <footer>
        <?php include 'inc/rodape.inc.php' ?>
    </footer>
</body>

</html>