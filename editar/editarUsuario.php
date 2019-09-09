<?php
include_once '../util/conecaoBD.php';
include_once '../util/cabeca.php';

$id = $_GET['id'];
$coon = conectar();
$query02 = "SELECT `id`, `login`, `senha`, `nivel` FROM `usuario` WHERE  id=$id";
$query = mysqli_query($coon, $query02);
$querySetor = mysqli_fetch_assoc($query);
?>



<div class="container">



    <form style="margin: 4% ; padding: 1.5%;margin-top: 15%;" method="post" action="../salvar/salvarUser.php">
        <center><h3 class="descEstilo">Editar Usuario</h3></center><br><br>
        <center> <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-6">
                    <input type="hidden" value="<?php echo $id; ?>" name="id" />
                    <label for="">Nome do Usuario</label>
                    <input type="text" class="form-control"  value="<?php echo $querySetor ['login'] ?>" name="login" placeholder="Nome do Usuario">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Senha</label>
                    <input type="password" readonly=" "class="form-control" value="<?php echo $querySetor ['senha'] ?>" name="senha" placeholder="">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Nivel</label>
                    <input type="text" readonly=""class="form-control"  value="<?php echo $querySetor ['nivel'] ?>" name="nivel" placeholder="">
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Editar</button>
        </center>
    </form>
</div>




</div>

<?php
include_once '../util/rodape.php';
?>