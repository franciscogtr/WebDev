<?php

//Inicia a sessão caso ainda n tenha sido iniciada

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//Impede acesso de visitantes ou usuários que não são admins

if (!isset($_SESSION['nome']) or !isset($_SESSION['admin'])) {
    header('Location:login.php');
}

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
        <p><a href="index.php" class="voltar">Home</a> </p>

    </header>


    <main>

        <h1> Remover Salas</h1>

        <?php

        $heredoc = <<<CARDINDEX

         <div class='cardIndex'>
            <div class='item'> 
                <img src="img/ambientes/%s" alt="Imagem do Ambiente">
            </div>
            <p class='pCard'>%s</p>
                <p class='pCard'>
                <a class='aCard' href="excluirambiente.php?ambiente=%s">Excluir</a></p>
        </div>

CARDINDEX;

        if (count($salas) > 0) {
            foreach ($salas as  $sala) {
                printf($heredoc, $sala->imagem, $sala->nome, $sala->nome);
            }
        }
        ?>
        <h1>Remover Laboratórios</h1>
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

<?php

if (isset($_GET['ambiente'])) {
    $ambiente = $_GET['ambiente'];

    // Usando a função findOne para buscar uma reserva com o email, ambiente, data e hora fornecidos
    $beanAmbiente = R::findOne('ambiente', 'nome = ? ', [$ambiente]);

    $imagem = $beanAmbiente->imagem;

    // Caminho completo para a imagem que você deseja excluir
    $imagemPath = 'img/ambientes/' . $imagem;

    // echo $imagemPath;
    // R::trash($beanAmbiente);

    // Verifica se a foto do ambiente existe antes de tentar deletar
    if (file_exists($imagemPath)) {
        // Tenta excluir o arquivo
        if (unlink($imagemPath)) {
            
            // echo '<div class="msg">' . '<p class="msgGreen">'  . 'Ambiente excluido com sucesso!' . '</p>' . '</div>';
            //exclui o ambiente no BD
            R::trash($beanAmbiente);
            //Redireciona para prórpia página pra tirar o GET da URL
            header('Location:excluirambiente.php'); 

        } else {
            
            echo '<div class="msg">' . '<p class="msgRed">'  . 'Erro ao excluir a imagem.' . '</p>' . '</div>';
        }
    } else {
    
        echo '<div class="msg">' . '<p class="msgRed">'  . 'A imagem não existe.' . '</p>' . '</div>';
    }



    R::close();
}
