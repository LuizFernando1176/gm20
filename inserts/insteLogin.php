<?php
include_once '../util/conecaoBD.php';
include_once '../config.php';
include_once '../util/antiInjecao.php';
session_start();
retirarInjecao($login = $_POST['login']);
retirarInjecao($senha = $_POST['senha']);
$retirarInjecao($loginExibicao = $_POST['loginExibicao']);
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
