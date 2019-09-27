<?php
include_once '../util/corpo.php';
include_once '../util/conecaoBD.php';
$coon = conectar();
$query01 = "SELECT `id`, `rack` FROM `rack`";
$query02 = "SELECT `id`, `setor` FROM `setor`";
$query03 = "SELECT `id`, `sw` FROM `switch`";
$query04 = "SELECT `id`, `barramento` FROM `barramento`";
$queryRack = mysqli_query($coon, $query01);
$querySetor = mysqli_query($coon, $query02);
$querySw = mysqli_query($coon, $query03);
$queryBarramento = mysqli_query($coon, $query04);
cabeca();
$indice = isset($_GET['alerta']) ? $_GET['alerta'] : null;
?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Pending Requests Card Example -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-8">
                <!-- Card Header - Dropdown -->
                <div class="card-header py d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Cadastro de Máquina</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form  method="post" action="../inserts/insert_maquinas.php">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome_maquina">Nome da Máquina</label>
                                <input type="text" class="form-control" id="nome_maquina" name="nome_maquina" placeholder="Nome da Máquina">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nome_usuario">Nome do Usuario</label>
                                <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" placeholder="Nome do Usuario">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ponto">Ponto</label>
                            <input type="text" class="form-control" id="ponto" name="ponto" placeholder="PPxPTx">
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $("#mac").mask("AA:AA:AA:AA:AA:00");
                            });
                        </script>

                        <div class="form-group">
                            <label for="">Mac</label>
                            <input type="text" class="form-control" id="mac" name="mac" placeholder="MAC Apenas numeros">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div>
                                    <label>Locada</label> <input id="label1" type="radio" name="inv" data-tab="tab1" />
                                    <label>Propria</label> <input id="label2" type="radio" name="tombo" data-tab="tab2" />

                                </div>

                                <div id="tab1" data-content="" style="display: none;">
                                    <input type="text" name="inv" placeholder="Digite o INV" class="form-control">
                                </div>
                                <div id="tab2" data-content="" style="display: none;">
                                    <input type="text" name="tombo" placeholder="Digite o Tombo" class="form-control">
                                </div>


                                <script type="text/javascript">
                                    //consultando os radio responsaveis por exibir os conteudos.
                                    var tabs = document.querySelectorAll("[data-tab]");

                                    //consultando os conteudos a serem exibidos.
                                    var contents = document.querySelectorAll("[data-content]");

                                    //declarando a função que será associada a cada input:radio
                                    var tabOnClick = function (elem) {
                                        for (var indice in contents) {
                                            //verificando se o input:radio selecionado está associado ao conteudo atual.
                                            var display = contents[indice].id == elem.target.dataset.tab ? "block" : "none";
                                            contents[indice].style.display = display;
                                        }
                                    }

                                    //associando todos os input:radio ao método declarado acima.
                                    for (var indice in tabs) {
                                        tabs[indice].onclick = tabOnClick;
                                    }
                                </script>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="setor">Setor</label>
                                <select name="id_setor" id="id_setor" class="form-control">
                                    <option selected>Escolha o Setor</option>
                                    //abrimos um contador while para que enquanto houver registros ele continua no loopin
                                    <?php while ($setores = mysqli_fetch_array($querySetor)) { ?>
                                        <option value="<?php echo $setores['id'] ?>"><?php echo utf8_encode($setores['setor']) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rack">Rack</label>
                                <select id="id_rack"  name="id_rack" class="form-control">
                                    <option selected>Escolha o Rack</option>
                                    <?php while ($racks = mysqli_fetch_array($queryRack)) { ?>
                                        <option value="<?php echo $racks['id'] ?>"><?php echo $racks['rack'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_sw">Switch</label>
                                <select id="id_sw"  name="id_sw" class="form-control">
                                    <option selected>Escolha o Switch</option>
                                    <?php while ($SW = mysqli_fetch_array($querySw)) { ?>
                                        <option value="<?php echo $SW['id'] ?>"><?php echo $SW['sw'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="barramento">Barramento</label>
                                <select id="id_barramento"  name="id_barramento" class="form-control">
                                    <option selected>Escolha o Barramento</option>
                                    <?php while ($barramento = mysqli_fetch_array($queryBarramento)) { ?>
                                        <option value="<?php echo $barramento['id'] ?>"><?php echo $barramento['barramento'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                            <button type="reset" class="btn btn-danger">Apagar</button>
                        </center>
                    </form>
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

                            