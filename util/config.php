<?php

function urlbase() {

    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
        $protocol = 'https://';
    } else {
        $protocol = 'http://';
    }
    $url = $protocol . $_SERVER['HTTP_HOST'] . '/gm20';
    return $url;
}

?>