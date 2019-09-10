<?php
include_once '../util/conecaoBD.php';
include_once '../util/corpo.php';
include_once '../util/antiInjecao.php';
cabeca();
retirarInjecao($id = $_GET['id']);
$coon = conectar();
$busca = mysqli_query($coon, "select m.id , m.nome_maquina , m.nome_usuario , r.rack ,s.setor, m.ponto , m.mac , m.inv ,m.tombo , w.sw , b.barramento from maquina m join rack r on m.id_rack = r.id join setor s on m.id_setor = s.id join switch w on m.id_sw = w.id join barramento b on m.id_barramento = b.id   WHERE m.id =$id");
$row = mysqli_fetch_assoc($busca);
$query01 = "SELECT `id`, `rack` FROM `rack`";
$query02 = "SELECT `id`, `setor` FROM `setor`";
$query03 = "SELECT `id`, `sw` FROM `switch`";
$query04 = "SELECT `id`, `barramento` FROM `barramento`";
$querySw = mysqli_query($coon, $query03);
$queryBarramento = mysqli_query($coon, $query04);
$queryRack = mysqli_query($coon, $query01);
$querySetor = mysqli_query($coon, $query02);
$rowSw = mysqli_fetch_assoc($querySw);
$rowBarramento = mysqli_fetch_assoc($queryBarramento);
$rowRack = mysqli_fetch_assoc($queryRack);
$rowSetor = mysqli_fetch_assoc($querySetor);
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
                <div class="sidebar-brand-icon mx-3"><img src="../img/logo.svg" class="img-profile" width="80%" height="80%"></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Painel Controle</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-file-alt"></i>
                    <span>Relatorios</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Relatorios</h6>
                        <a class="collapse-item" href="../relatorios/gerarRelatorio.php">Gerar Relatorio</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user-plus"></i>
                    <span>Cadastros</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cadastrar</h6>
                        <a class="collapse-item" href="../cadastros/cadastroMaquinas.php">Maquinas</a>
                        <a class="collapse-item" href="../cadastros/cadastroSetor.php">Setor</a>
                        <a class="collapse-item" href="../cadastros/cadastroUser.php">Usuarios</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiess" aria-expanded="true" aria-controls="collapseUtilitiess">
                    <i class="fas fa-filter"></i>
                    <span>Exibir</span>
                </a>
                <div id="collapseUtilitiess" class="collapse" aria-labelledby="headingUtilitiess" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Exibir</h6>
                        <a class="collapse-item" href="../exibir/exibirMaquinas.php">Maquinas</a>
                        <a class="collapse-item" href="../exibir/exibirSetores.php">Setor</a>
                        <a class="collapse-item" href="../exibir/exibirUsuarios.php">Usuarios</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar Por..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-1 d-none d-lg-inline text-gray-800 small"><strong>Bem Vindo, <?php echo $usuarioLogado['nome'] ?></strong></span></a></strong>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw  text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configurações 
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->

                    <!-- Pending Requests Card Example -->
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-8">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">Editar Máquina</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form  method="POST" action="../salvar/salvarMaquina.php">
                                        <div class="form-row">
                                            <input type="hidden" value="<?php echo $id; ?>" name="id" />
                                            <div class="form-group col-md-6">
                                                <label for="nome_maquina">Nome da Máquina</label>
                                                <input type="text" class="form-control" id="nome_maquina" value="<?php echo $row['nome_maquina']; ?>" name="nome_maquina" placeholder="Nome da Máquina">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nome_usuario">Nome do Usuario</label>
                                                <input type="text" class="form-control" id="nome_usuario" value="<?php echo $row['nome_usuario']; ?>" name="nome_usuario" placeholder="Nome do Usuario">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ponto">Ponto</label>
                                            <input type="text" class="form-control" value="<?php echo $row['ponto']; ?>" id="ponto" name="ponto" placeholder="PPxPTx">
                                        </div>
                                        <script src="../js/jquery.mask.js" type="text/javascript"></script>
                                        <script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
                                        <script src="../js/jquery.min.js" type="text/javascript"></script>
                                        <script type="text/javascript">
                                            $(function () {
                                                $("#mac").mask("AA:AA:AA:AA:A0:AA");


                                            });
                                        </script>
                                        <div class="form-group">
                                            <label for="mac">Mac</label>
                                            <input type="text" class="form-control" id="mac" value="<?php echo $row['mac']; ?>" name="mac" placeholder="MAC Apenas numeros">
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
                                                    <option selected value="<?php echo $row['id'] ?>"><?php echo $row['setor'] ?></option>
                                                    <?php while ($setores = mysqli_fetch_array($querySetor)) { ?>
                                                        <option value="<?php echo $setores['id'] ?>"><?php echo utf8_encode($setores['setor']) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="rack">Rack</label>
                                                <select id="id_rack"  name="id_rack" class="form-control">
                                                    <option selected value="<?php echo $rowRack['id']; ?>"><?php echo $rowRack['rack']; ?></option>
                                                    <?php while ($racks = mysqli_fetch_array($queryRack)) { ?>
                                                        <option value="<?php echo $racks['id'] ?>"><?php echo utf8_encode($racks['rack']) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="id_sw">Switch</label>
                                                <select id="id_sw"  name="id_sw" class="form-control">
                                                    <option selected value="<?php echo $rowSw['id']; ?>"><?php echo $rowSw['sw']; ?></option>
                                                    <?php while ($racks = mysqli_fetch_array($querySw)) { ?>
                                                        <option value="<?php echo $racks['id'] ?>"><?php echo utf8_encode($racks['sw']) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="barramento">Barramento</label>
                                                <select id="id_barramento"  name="id_barramento" class="form-control">
                                                    <option selected value="<?php echo $rowBarramento['id']; ?>"><?php echo $rowBarramento['barramento']; ?></option>
                                                    <?php while ($racks = mysqli_fetch_array($queryBarramento)) { ?>
                                                        <option value="<?php echo $racks['id'] ?>"><?php echo utf8_encode($racks['barramento']) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <center>
                                            <button type="submit" class="btn btn-warning"><a></a>Salvar</button>

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


                                            