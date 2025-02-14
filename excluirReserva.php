<?php

$email = $_GET['email'];
$ambiente = $_GET['ambiente'];
$data = $_GET['data'];
$hora = $_GET['hora'];

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'class/rb.php';
include 'inc/conexaoBD.inc.php';

// Usando a função findOne para buscar uma reserva com o email, ambiente, data e hora fornecidos
$Reserva = R::findOne('reserva', 'email_reservante = ? AND ambiente = ? AND data = ? AND hora = ?', [$email, $ambiente, $data, $hora]);

R::trash( $Reserva ); 

R:: close();

header('Location:minhasreservas.php');