<?php

include_once '../util/conecaoBD.php';
include_once '../config.php';
session_start();
$login = $_POST['login'];
$senha = $_POST['senha'];
$loginExibicao = $_POST['loginExibicao'];
$con = conectar();
$queryLogin = "SELECT `login`, `senha`  FROM `usuario` WHERE login like '$login' and senha like '$senha' ";
$select = mysqli_query($con, $queryLogin);
$exibir = mysqli_fetch_assoc($select);
$sesao01 = $exibir['loginExibir'];

if (mysqli_num_rows($select) > 0) {
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
//    $_SESSION ['loginExibicao']=$sesao01;
    header('Location:../index.php');
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    unset($_SESSION ['loginExibicao']);
    header('Location: ../login.php');
}
?>
