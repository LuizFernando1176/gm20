<?php
include_once 'config.php';
function testaSessao() {
    session_start();
    if (!isset($_SESSION['gmUsuarioLogado'])) {
        unset($_SESSION['gmUsuarioLogado']);
        header('location:login.php');
    }
    if (isset($_SESSION["sessiontime"])) {
        if ($_SESSION["sessiontime"] < time()) {
            session_unset();
            header('Location:'.urlbase().'/login.php?alerta=13');
        } else {
            //Seta mais tempo 60 segundos
            $_SESSION["sessiontime"] = time() + 500;
        }
    } else {
        session_unset();
        //Redireciona para login
    }
}

