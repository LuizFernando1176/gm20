<?php



function testaSessao() {
    session_start();
    if (!isset($_SESSION['gmUsuarioLogado'])) {
        unset($_SESSION['gmUsuarioLogado']);
               header('location:login.php');
    }
}

function urlbase () {
    
    return $url=('/gm20');
    
}
?>