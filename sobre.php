<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <?php
            include 'inc/cabecalho.inc.php'
        ?>
        <p><a href="index.php" class="voltar">Home</a> </p>
    </header>
    <main>
        
        <h2>Equipe Desenvolvedora</h2>

        <div class="divMae">
            <div class="divSobre">
                <img class="imgSobre" src="img/criadores/analuiza.png" alt="Ana Luiza">
                <p class="sobre"><b>Nome: </b> Ana Luiza Alves Viera</p>
                <p class="sobre"><b>Email: </b> alav@aluno.ifnmg.edu.br</p>
            </div>
            <div class="divSobre">
                <img class="imgSobre" src="img/criadores/francisco.jpg" alt="foto Francisco">
                <p class="sobre"><b>Nome: </b> Francisco José Geraldo Matos de Sousa</p>
                <p class="sobre"><b>Email:</b> fjgms@aluno.ifnmg.edu.br</p>
            </div>
            <div class="divSobre">
                <img class="imgSobre" src="img/criadores/samuel.jpg" alt="Foto Samuel">
                <p class="sobre"><b>Nome: </b> Samuel Motta de Castro</p>
                <p class="sobre"><b>Email: </b> smc11@aluno.ifnmg.edu.br</p>
            </div>
        </div>


    </main>
    <footer>
        <?php
        include 'inc/rodape.inc.php'
        ?>
    </footer>
</body>
</html>