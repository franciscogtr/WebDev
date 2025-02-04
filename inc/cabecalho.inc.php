<?php
   session_start(); 

   date_default_timezone_set('America/Fortaleza');

   $hora = new DateTime();
   echo $hora->format('h');

   if ($_SESSION['nome']) {
     

   if ($hora->format('h')<12) {
    ?> <h2> Bom dia, <?= $_SESSION['nome'] ?></h2>
    <?php
   }

   if ($hora->format('h')>12 && $hora->format('h')<18) {
      ?> <h2> Boa Tarde, <?= $_SESSION['nome'] ?></h2>
      <?php
   }
   
   if ($hora->format('h')>18 && $hora->format('h')<24) {
   ?> <h2> Boa Noite, <?= $_SESSION['nome'] ?> </h2>
   <?php
     }
   }
   
