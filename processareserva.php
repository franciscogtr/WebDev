<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'class/rb.php';
include 'inc/conexaoBD.inc.php';

$reserva = R::dispense('reserva');


$reserva->nomeResevante = $_SESSION['nome'];
$reserva->emailResevante = $_SESSION['email'];
$reserva->ambiente = $_GET['ambiente'];
$reserva->data =  date($_GET['data']);
$reserva->hora = $_GET['hora'];

$id = R::store($reserva);

R::close();

$link = 'reservahorario.php?ambiente=' . $_GET['ambiente'] . '&data=' . $_GET['data'];

// echo $link;

header("Location: $link");


?>
