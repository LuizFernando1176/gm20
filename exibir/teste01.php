<?php
include '../util/conecaoBD.php';
include_once '../util/corpo.php';
$numreg = 5; // Quantos registros por página vai ser mostrado
$pg = isset($_GET["pag"]) ? $_GET["pag"] : 1;
$inicial = ($pg * $numreg) - $numreg;
// Serve para contar quantos registros você tem na sua tabela para fazer a paginação
$coon = conectar();
$totalProdutos = mysqli_query($coon, "select COUNT(id) total FROM setor");
$totalProduto = mysqli_fetch_assoc($totalProdutos);
$countTotal = $totalProduto['total'];
// Faz o Select pegando o registro inicial até a quantidade de registros para página
$sql = mysqli_query($coon, "SELECT id , setor FROM setor ORDER BY setor ASC LIMIT $inicial, $numreg");
cabeca();
?>
<div class="card-body">
    <table class="table table-striped table-responsive" >
        <div id="divAlerta" class="divAlerta"></div>
        <thead>
            <tr><th>Nome do Setor</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($rows = mysqli_fetch_array($sql)) {
                echo "<tr>";
                echo "<td >" . utf8_encode($rows['setor']) . "</td>";
                echo "<td >" . "<button class='btn btn-warning'><a href='../editar/editarSetor.php?id=" . $rows['id'] . "'>Editar</a></button>" . "</td>";
                echo "<td >" . "<button class='btn btn-danger'><a href='../deletes/deletarSetor.php?id=" . $rows['id'] . "'>Deletar</a></button>" . "</td>";
            } echo "</tr>";
            ?>
        </tbody>
    </table>
    <?php
    echo "<br><br>"; // quebra de linha entre a paginação e o conteúdo
    // aqui uma pequena mudança no código do wolfphw
    // a paginação só exibida quando o total de produtos for maior
    // que a quantidade de registros por página
    if ($countTotal > $numreg) {
        include '../util/paginacao_1.php'; // chamada do arquivo. ex: << Anterior 1 2 3 4 5 Próxima >>
    }
    ?>