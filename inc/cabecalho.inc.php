<head>
   <link rel="stylesheet" href="stylesheet.css">
</head>
<?php
session_start();

date_default_timezone_set('America/Fortaleza');

$hora = new DateTime();
// echo $hora->format('H');

if (!isset($_SESSION['nome'])) {
   echo '<h3 class="cabecalho">' . 'Bom dia, Visitante!' . '</h3>';

   ?>
      <div>
            <button type="button"><a href="login.php">Login</a></button>
        </div>
   <?php
} else {

   if ($hora->format('H') < 12) {
      echo '<h3 class="cabecalho">' . 'Bom dia, ' . $_SESSION['nome'] . '!</h3>';
   }

   if ($hora->format('H') > 12 && $hora->format('H') < 18) {
      echo '<h3 class="cabecalho">' . 'Boa tarde, ' . $_SESSION['nome'] . '!</h3>';
   }

   if ($hora->format('H') > 18 && $hora->format('H') < 24) {
      echo '<h3 class="cabecalho">' . 'Boa noite, ' . $_SESSION['nome'] . '!</h3>';
   }

   ?>
      <div>
            <button type="button"><a href="logout.php">Logout</a></button>
        </div>
   <?php
}




