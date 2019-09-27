<?php
include_once '../util/conecaoBD.php';
include_once '../util/corpo.php';
include '../util/antiInjecao.php';
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
<div class="container-fluid">

    <div class="card text-center" style="padding: 1%" id="caixa">
        <div class="card-header">Informações da Maquina <?php echo $row['nome_maquina']; ?></div>
        <div class="card-body">
            <input type="hidden" value="<?php echo $id; ?>" name="id" />
            <p>Setor : <strong><?php echo $row['setor'] ?></strong></p>
            <p>N. do Usuário: <strong><?php echo $row['nome_usuario']; ?></strong></p>
            <p>N. da Máquina: <strong><?php echo $row['nome_maquina']; ?></strong></p> 
            <p>INV: <strong><?php echo $row['inv'] ?></strong></p> 
            <p>Tombo: <strong><?php echo $row['tombo'] ?></strong></p> 
            <p>MAC: <strong><?php echo $row['mac']; ?> </strong></p> 
            <p>Ponto: <strong><?php echo $row['ponto']; ?></strong></p>  
            <p>Rack:<strong> <?php echo $rowRack['rack']; ?></strong></p> 
            <p>Sw: <strong><?php echo $rowSw['sw']; ?></strong></p> 
            <p>Barram.: <strong><?php echo $rowBarramento['barramento']; ?></p> 
            <center><button class='btn btn-success'value='Print this page' id="btn">Imprimir</button>
                <button class="btn btn-dark"><a href="../exibir/exibirMaquinas.php">Voltar</a></button></center>
        </div>

    </div>
    <script >
        document.getElementById('btn').onclick = function() {
            var conteudo = document.getElementById('caixa').innerHTML,
                tela_impressao = window.open('about:blank');

            tela_impressao.document.write(conteudo);
            tela_impressao.window.print();
            tela_impressao.window.close();
        };
        </script>
        
    
</div>
<?php
rodape();



      

       
    