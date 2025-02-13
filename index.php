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
            <p class="pHeader"><a class="aheader" href="minhasreservas.php">Reservas</a></p>
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === 'on'): ?>

                <select id="cadastrar" onchange="redirecionarCadastro()">
                    <option value="">Cadastrar</option>
                    <option value="cadastroambiente.php">Ambiente</option>
                    <option value="cadastrousuario.php">Usuário</option>
                </select>
                <script>
                    function redirecionarCadastro() {
                        var select = document.getElementById("cadastrar");
                        var valor = select.value;
                        if (valor) {
                            window.location.href = valor; // Redireciona para a página selecionada
                        }
                    }
                </script>

            

            <select id="excluir" onchange="redirecionarExcluir()">
                    <option value="">Remover</option>
                    <option value="excluirambiente.php">Ambiente</option>
                    <option value="excluirusuario.php">Usuário</option>
                </select>
                <script>
                    function redirecionarExcluir() {
                        var select = document.getElementById("excluir");
                        var valor = select.value;
                        if (valor) {
                            window.location.href = valor; // Redireciona para a página selecionada
                        }
                    }
                </script>

            <?php endif; ?>
            

            <p class="pHeader"><a class="aheader" href="sobre.php">Sobre</a></p>

        </nav>
    </header>


    <main>
        
        <h1>Salas</h1>

        <?php

        $heredoc = <<<CARDINDEX

         <div class='cardIndex'>
            <div class='item'> 
                <img src="img/ambientes/%s" alt="Imagem do Ambiente">
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