<?php
session_start();

date_default_timezone_set('America/Fortaleza');

$hora = new DateTime();
// echo $hora->format('H');

if (!isset($_SESSION['nome'])) {
   echo '<h2>' . 'Bom dia, Visitante!' . '</h2>';
} else {

   if ($hora->format('H') < 12) {
      echo '<h2>' . 'Bom dia, ' . $_SESSION['nome'] . '!</h2>';
   }

   if ($hora->format('H') > 12 && $hora->format('H') < 18) {
      echo '<h2>' . 'Boa tarde, ' . $_SESSION['nome'] . '!</h2>';
   }

   if ($hora->format('H') > 18 && $hora->format('H') < 24) {
      echo '<h2>' . 'Boa noite, ' . $_SESSION['nome'] . '!</h2>';
   }
}
