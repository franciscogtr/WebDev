<?php

//Inicia a sessão caso ainda n tenha sido iniciada

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//Impede acesso de visitantes ou usuários que não são admins

if (!isset($_SESSION['nome']) or !isset($_SESSION['admin'])) {
    header('Location:login.php');
}

require_once 'class/rb.php';
include 'inc/conexaoBD.inc.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    // echo $email;

    $usuario = R::findOne('usuario', ' email = ? ', [$_GET['email']]);
    // echo $usuario;
    R::trash($usuario);
    R::close();

    header('Location:listausuarios.php');
}