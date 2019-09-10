<?php

function urlSite() {
    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
        $protocol = 'https://';
    } else {
        $protocol = 'http://';
    }
    $url = $protocol . $_SERVER['HTTP_HOST'] . '/scp';
    return $url;
}

function testaSessao() {
    session_start();
    if (!isset($_SESSION['gmUsuarioLogado'])) {
        unset($_SESSION['gmUsuarioLogado']);
               header('location:login.php');
    }
}

?>