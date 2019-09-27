<?php

$pdo = new PDO("mysql:host=localhost; dbname=bd_pc; charset=utf8;", "root", "");
$dados = $pdo->prepare("select m.id , m.nome_maquina , m.nome_usuario , r.rack ,s.setor, m.ponto , m.mac , m.inv ,m.tombo , w.sw , b.barramento from maquina m join rack r on m.id_rack = r.id join setor s on m.id_setor = s.id join switch w on m.id_sw = w.id join barramento b on m.id_barramento = b.id");
$dados->execute();
echo json_encode($dados->fetchAll(PDO::FETCH_ASSOC));
?>