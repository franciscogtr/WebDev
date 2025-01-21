<?php

session_start();

$_SESSION['nome'] = $_GET['nome'];
$_SESSION['email'] = $_GET['email'];
$_SESSION['senha'] = $_GET['senha'];

header('Location:index.php');