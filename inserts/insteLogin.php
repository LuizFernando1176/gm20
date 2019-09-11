<?php

include_once '../util/conecaoBD.php';
include_once '../config.php';
include_once '../util/antiInjecao.php';
session_start();
retirarInjecao($login = $_POST['login']);
retirarInjecao($senha = $_POST['senha']);
$con = conectar();
$queryLogin = "SELECT `login`, `senha` , `loginExibicao`,`nivel` FROM `usuario` WHERE login like '$login' and senha like md5(md5('$senha')) ";
$select = mysqli_query($con, $queryLogin);

if (mysqli_num_rows($select) > 0) {

    $resultados = mysqli_fetch_assoc($select);
    $nomeDeExibicao = $resultados['loginExibicao'];
    $login = $resultados['loginExibicao'];
    $nivel = $resultados['nivel'];
    $usuarioLogadoParaSalvarNaSessao = '{
	  "nome":"' . $nomeDeExibicao . '",
	  "login":"' . $login . '",
           "nivel":"' . $nivel . '"
	}';
    $_SESSION['gmUsuarioLogado'] = $usuarioLogadoParaSalvarNaSessao;

    header('Location:../index.php');
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('Location: ../login.php?erro=0');
}
 