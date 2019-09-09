<?php
include_once '../util/conecaoBD.php';
include_once '../util/cabeca.php';

$id = $_GET['id'];
$coon = conectar();
$query02 = "SELECT `setor` FROM `setor` where id=$id";
$query = mysqli_query($coon, $query02);
$querySetor = mysqli_fetch_assoc($query);
?>



<div class="container">

    <form style="margin: 4% ; padding: 1.5%;margin-top: 15%;" method="post" action="../salvar/salvarSetor.php">
        <center><h3 class="descEstilo">Editar Setor</h3></center><br><br>
        <center> <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-6">
                    <input type="hidden" value="<?php echo $id; ?>" name="id" />
                    <label for="setor">Nome do Setor</label>
                    <input type="text" class="form-control" id="setor" name="setor" value="<?php echo $querySetor ['setor'] ?>" name="setor" placeholder="">
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Editar</button>
        </center>
    </form>
</div>






<?php
include_once '../util/rodape.php';
?>