<?php

include_once '../util/conecaoBD.php';
include_once '../config.php';
session_start();
$login = $_POST['login'];
$senha = $_POST['senha'];
$con = conectar();
$queryLogin = "SELECT `login`, `senha` FROM `usuario` WHERE login like '$login' and senha like '$senha'";
$select = mysqli_query($con, $queryLogin);


if (mysqli_num_rows($select) > 0) {
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header('Location:../index.php');
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('Location: ../login.php');
}
?>
