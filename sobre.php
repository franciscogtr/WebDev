<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            border: solid black 1px;
            border-radius: 50%;
            /* size: 10px; */
            height: 20%;
            width: 20%;
        }
    </style>
</head>

<body>
    <header>
        <?php
        include 'inc/cabecalho.inc.php'
        ?>
    </header>
    <main>
        
        <h2>Sobre</h2>

        <h3><b>Feito por: </b></h3> <br>
        <p><img src="img/analuiza.png" alt="Ana Luiza"><br>Nome: Ana Luiza Alves Viera</p>
        <p>Email: alav@aluno.ifnmg.edu.br</p>
        <p><img src="img/francisco.jpg" alt="foto Francisco"><br>Nome: Francisco José Geraldo Matos de Sousa</p>
        <p>Email: fjgms@aluno.ifnmg.edu.br</p>
        <p> <img src="img/samuel.jpg" alt="Foto Samuel"><br>Nome: Samuel Motta de Castro</p>
        <p>Email: smc11@aluno.ifnmg.edu.br</p>


    </main>
    <footer>
        <?php
        include 'inc/rodape.inc.php'
        ?>
    </footer>
</body>
</html>