<?php

include "../util/conecaoBD.php";
$coon = mysqli_connect("localhost", "root", "", "bd_pc");
$sql = mysqli_query($coon, "SELECT id , setor FROM setor WHERE  NOT Excluido  ");
while ($rows = mysqli_fetch_array($sql))  {
    echo utf8_encode($rows["id"]) . "|" . utf8_encode($rows["setor"]) . "\n";
}
