<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cabecalho</title>
   <link rel="stylesheet" href="../stylesheet.css">
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php
session_start();

date_default_timezone_set('America/Fortaleza');

$hora = new DateTime();
// echo $hora->format('H');

if (!isset($_SESSION['nome'])) {
   echo '<h2 class="cabecalho">' . 'Olá, Visitante!' . '</h2>';

   ?>
      <div>
            <button  type="button"><a class="acabecalho" href="login.php">Login</a></button>
        </div>
   <?php
} else {

   if ($hora->format('H') < 12) {
      echo '<h2 class="cabecalho">' . 'Bom dia, ' . $_SESSION['nome'] . '!</h2>';
   }

   if ($hora->format('H') > 12 && $hora->format('H') < 18) {
      echo '<h2 class="cabecalho">' . 'Boa tarde, ' . $_SESSION['nome'] . '!</h2>';
   }

   if ($hora->format('H') > 18 && $hora->format('H') < 24) {
      echo '<h2 class="cabecalho">' . 'Boa noite, ' . $_SESSION['nome'] . '!</h2>';
   }

   ?>
      
      <button type="button"><a class="acabecalho" href="logout.php">Logout</a></button>
   
   <?php
}
?>
</body>
</html>




