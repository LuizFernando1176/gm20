<?php
include "../util/conecaoBD.php";
$coon = mysqli_connect("localhost", "root", "", "bd_pc");
//$q = strtolower($_GET["q"]);
//$sql = "SELECT * FROM maquinas WHERE setor like '%" . $q . "%'";
$sql = mysqli_query($coon, "SELECT id , setor FROM setor WHERE  NOT Excluido ORDER BY setor ");

//$query = mysqli_query($coon,$sql);// or die ("Erro". mysql_query());


 while ($rows = mysqli_fetch_array($sql)){

	//if (srtpos(strtolower($reg['nom_lista']),$q !== false){
		echo $rows["setor"]."|".$rows["setor"]."\n";
//	}
}
?>