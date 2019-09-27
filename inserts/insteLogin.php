<?php

include_once '../util/conecaoBD.php';
include_once '../config.php';
include_once '../util/antiInjecao.php';
include_once '../util/alertas.php';

session_start();
retirarInjecao($login = filter_input(INPUT_POST, 'login'));
retirarInjecao($senha = filter_input(INPUT_POST, 'senha'));
$con = conectar();
$queryLogin = "SELECT `id`,`login`, `senha` , `loginExibicao`,`nivel` FROM `usuario` WHERE login like '$login' and senha like md5(md5('$senha')) ";
$select = mysqli_query($con, $queryLogin);

if (mysqli_num_rows($select) > 0) {

    $resultados = mysqli_fetch_assoc($select);
    $nomeDeExibicao = $resultados['loginExibicao'];
    $login = $resultados['login'];
    $id = $resultados['id'];
    $nivel = $resultados['nivel'];
    $senha = $resultados['senha'];
    $usuarioLogadoParaSalvarNaSessao = '{
	  "nome":"' . $nomeDeExibicao . '",
	  "login":"' . $login . '",
           "nivel":"' . $nivel . '"
	}';
    $_SESSION['gmUsuarioLogado'] = $usuarioLogadoParaSalvarNaSessao;
    $_SESSION ['login'] = $login;
    $_SESSION ['loginExibicao'] = $nomeDeExibicao;
    $_SESSION ['nivel'] = $nivel;
    $_SESSION ['senha'] = $senha;
    $_SESSION ['id'] = $id;
    $_SESSION["sessiontime"] = time() + 60;



    header('Location:../index.php');
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('Location: ../login.php?alerta=10');
}
 