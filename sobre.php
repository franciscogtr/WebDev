<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        
        <p><img class="imgSobre" src="img/analuiza.png" alt="Ana Luiza"><br>Nome: Ana Luiza Alves Viera</p>
        <p>Email: alav@aluno.ifnmg.edu.br</p>
        <p><img class="imgSobre" src="img/francisco.jpg" alt="foto Francisco"><br>Nome: Francisco José Geraldo Matos de Sousa</p>
        <p>Email: fjgms@aluno.ifnmg.edu.br</p>
        <p> <img class="imgSobre" src="img/samuel.jpg" alt="Foto Samuel"><br>Nome: Samuel Motta de Castro</p>
        <p>Email: smc11@aluno.ifnmg.edu.br</p>


    </main>
    <footer>
        <?php
        include 'inc/rodape.inc.php'
        ?>
    </footer>
</body>
</html>