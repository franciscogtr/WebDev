<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
 
    require_once 'class/rb.php';
    include 'inc/conexaoBD.inc.php';

    $novoHorario;


    header('Location:reservahorario.php');

?>
