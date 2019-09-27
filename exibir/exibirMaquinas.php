<?php
include_once '../util/conecaoBD.php';
include_once '../util/corpo.php';
$numreg = 5; // Quantos registros por página vai ser mostrado
$pg = isset($_GET["pag"]) ? $_GET["pag"] : 1;
$inicial = ($pg * $numreg) - $numreg;
// Serve para contar quantos registros você tem na sua tabela para fazer a paginação
$coon = conectar();
$totalMaquinas = mysqli_query($coon, "select COUNT(id) total FROM maquina");
$totalMaquina = mysqli_fetch_assoc($totalMaquinas);
$countTotal = $totalMaquina['total'];
// Faz o Select pegando o registro inicial até a quantidade de registros para página
$sql = mysqli_query($coon, "select m.id , m.nome_maquina , m.nome_usuario , r.rack ,s.setor, m.ponto , m.mac , m.inv ,m.tombo , w.sw , b.barramento from maquina m join rack r on m.id_rack = r.id join setor s on m.id_setor = s.id join switch w on m.id_sw = w.id join barramento b on m.id_barramento = b.id WHERE NOT m.Excluido  LIMIT $inicial, $numreg");
$coon = conectar();
cabeca();
$indice = isset($_GET['alerta']) ? $_GET['alerta'] : null;
?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">


    </div>
    <!-- Content Row -->

    <!-- Pending Requests Card Example -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-8">
                <!-- Card Header - Dropdown -->
                <div class="card-header py d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Exibir Maquinas</h6>

                    <a href="../cadastros/cadastroMaquinas.php" class="btn btn-info"><span class="icon text-white-50"</span><i class=" fas fa-check"></i><span class="text">Adicionar Máquinas</span></a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <style>
                        tr{
                            font-size: 13px;
                            font-weight: bold;
                        }

                    </style>


                    <center><table class="table table-striped table-responsive" >
                            <div id="divAlerta" class="divAlerta"></div>
                            <thead>
                                <tr><th>Setor</th>
                                    <th>N. do Usuário</th>
                                    <th>N. da Máquina</th>
                                    <th>INV</th>
                                    <th>Tombo</th>
                                    <th>MAC</th>
                                    <th>Ponto</th>
                                    <th>Rack</th>
                                    <th>Sw</th>
                                    <th>Barram.</th>
                                    <th>Imprimir</th>
                                    <?php if ($usuarioLogado['nivel'] == '2') { ?> <th>Edit</th>
                                        <th>Excluir</th><?php } ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                while ($rows = mysqli_fetch_array($sql)) {
                                    echo "<tr>";
                                    echo "<td >" . utf8_encode($rows['setor']) . "</td>";
                                    echo "<td >" . $rows['nome_usuario'] . "</td>";
                                    echo "<td >" . $rows['nome_maquina'] . "</td>";
                                    echo "<td >" . utf8_encode($rows['inv']) . "</td>";
                                    echo "<td >" . utf8_encode($rows['tombo']) . "</td>";
                                    echo "<td >" . $rows['mac'] . "</td>";
                                    echo "<td >" . $rows['ponto'] . "</td>";
                                    echo "<td >" . $rows['rack'] . "</td>";
                                    echo "<td >" . utf8_encode($rows['sw']) . "</td>";
                                    echo "<td >" . utf8_encode($rows['barramento']) . "</td>";
                                    echo "<td >" . "<button class='btn btn-info'><a href='../view/visualizarMaquina.php?id=" . $rows['id'] . "'>Imprimir</a></button>" . "</td>";
                                    if ($usuarioLogado['nivel'] == '2') {
                                        echo "<td >" . "<button class='btn btn-warning'><a href='../editar/editarMaquina.php?id=" . $rows['id'] . "'>Editar</a></button>" . "</td>";

                                        echo "<td >" . "<button class='btn btn-danger'><a href='../deletes/deletarMaquina.php?id=" . $rows['id'] . "'>Deletar</a></button>" . "</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>

                            </tbody>

                        </table>
                        <script src = "../js/script.js" type = "text/javascript"></script>
                </div></center>
                <?php
                if ($countTotal > $numreg) {
                    echo '<center><div class="pagination pagination-lg" style="width: max-content">';
                    include '../util/paginacaoMaquina.php'; // chamada do arquivo. ex: << Anterior 1 2 3 4 5 Próxima >>
                    echo '</div></center>';
                }
                ?>

            </div></center>






            <!-- Pie Chart -->

            <!-- Content Row -->
            <div class="row">
                <!-- Content Column -->
                <div class="col-lg-6 mb-4">

                    </a>
                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Você deseja sair?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Selecione o botão sair pra efetivar sua saida do sistema.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                    <a class="btn btn-primary" href="../sair.php">Sair</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    rodape();
                    