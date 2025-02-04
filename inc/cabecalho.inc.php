<?php
   session_start(); 
   date_default_timezone_set('America/Fortaleza');
   $hora = new DateTime();
   echo $hora->format('h');

   if ($hora->format('h')<12) {
    # code...
   }
?>