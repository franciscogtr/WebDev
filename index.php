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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<style>
    

    
</style>

<body>
    <header>
        <?php
        include 'inc/cabecalho.inc.php'
        ?>
        <nav>
            <a class="aheader" href="minhasreservas.php">Minhas Reservas</a>
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'on'): ?>

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
                            window.location.href = valor; // Redireciona para a página selecionada
                        }
                    }
                </script>

            <?php endif; ?>
            <!-- Caixa seletora oculta para alinhamento do cabeçalho -->
            <select style="color:#f2f2f2"></select>

            <a class="aheader" href="sobre.php">Sobre</a></p>

        </nav>
    </header>


    <main>
        
        <h1>Salas</h1>

        <?php

        $heredoc = <<<CARDINDEX

         <div class='cardIndex'>
            <div class='item'> 
                <img src="img/%s" alt="Imagem do Ambiente">
            </div>
            <p class='pCard'>%s</p>
                <p class='pCard'><a class='aCard' href="calendario.php?ambiente=%s">Reservar</a></p>
        </div>

CARDINDEX;

        if (count($salas) > 0) {
            foreach ($salas as  $sala) {
                printf($heredoc, $sala->imagem, $sala->nome, $sala->nome);
            }
        }
        ?>
        <h1>Laboratórios</h1>
        <?php
        if (count($labs) > 0) {
            foreach ($labs as  $lab) {
                printf($heredoc, $lab->imagem, $lab->nome, $lab->nome);
            }
        }
        ?>
    </main>
    <footer>
        <?php include 'inc/rodape.inc.php' ?>
    </footer>
</body>

</html>