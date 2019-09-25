<?php

include_once 'config.php';
testaSessao();
$usuarioLogado = json_decode($_SESSION["gmUsuarioLogado"], true);

function cabeca() {

    echo '
<!DOCTYPE html>        
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Sistema de Gerenciamento  de Maquinas</title>
        <!-- Custom fonts for this template-->
        <link href="' . urlbase() . '/js/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="' . urlbase() . '/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="' . urlbase() . '/css/jquery-ui.css" rel="stylesheet">
        
    </head>
    

';
}

function rodape() {
    echo '

<script src="' . urlbase() . '/js/jquery/jquery.min.js"></script>
<script src="' . urlbase() . '/js/jquery.mask.js" ></script>
<script src="' . urlbase() . '/js/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="' . urlbase() . '/js/jquery-easing/jquery.easing.min.js"></script>
<script src="' . urlbase() . '/js/sb-admin-2.min.js"></script>
<script src="' . urlbase() . '/js/jquery-ui.js"></script>
<script src="' . urlbase() . '/js/sb-admin-2.min.js"></script>
</body>

</html>';
}
?>



