<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cabecalho</title>
   <link rel="stylesheet" href="../stylesheet.css">
</head>
<body>
<?php
session_start();

date_default_timezone_set('America/Fortaleza');

$hora = new DateTime();
// echo $hora->format('H');

if (!isset($_SESSION['nome'])) {
   echo '<p class="cabecalho">' . 'Bom dia, Visitante!' . '</p>';

   ?>
      <div>
            <button type="button"><a href="login.php">Login</a></button>
        </div>
   <?php
} else {

   if ($hora->format('H') < 12) {
      echo '<p class="cabecalho">' . 'Bom dia, ' . $_SESSION['nome'] . '!</p>';
   }

   if ($hora->format('H') > 12 && $hora->format('H') < 18) {
      echo '<p class="cabecalho">' . 'Boa tarde, ' . $_SESSION['nome'] . '!</p>';
   }

   if ($hora->format('H') > 18 && $hora->format('H') < 24) {
      echo '<p class="cabecalho">' . 'Boa noite, ' . $_SESSION['nome'] . '!</p>';
   }

   ?>
      <div>
            <button type="button"><a href="logout.php">Logout</a></button>
        </div>
   <?php
}
?>
</body>
</html>




