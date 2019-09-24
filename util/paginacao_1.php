<?php
$quant_pg = $countTotal/$numreg;
$quant_pg++;
//$url_ant = "http://www.site.com.br/produtos/";
$url_ant = 'teste01.php?pag='; 
// anterior  
if ( $pg > 1) {
   echo "<a href=".$url_ant.($pg-1) ."><span class='text-info'>Anterior</span></a>&nbsp;";
} else {
   echo "<span class='text-info'>Anterior</span>&nbsp;";
}
// Faz controle das páginas que irá mostrar na paginação	
if(($pg - 4) < 1) {
   $anterior = 1;
} else {
   $anterior = $pg - 4;
}
if(($pg + 6) > $quant_pg) {
   $proximo = $quant_pg;
} else {
   $proximo = $pg + 6;
}
// Crio os números das páginas entre Anterior e Próximo	
for($i_pg = $anterior; $i_pg < $proximo; $i_pg++) {
   if ($pg == ($i_pg)) {
	echo "<span class='style3'>$i_pg</span>";
   } else {
       $i_pg2 = $i_pg;
       echo "&nbsp;<a href={$url_ant}{$i_pg2}><span class='text-info'>$i_pg</span></a>&nbsp;";
   }
}
// proximo
if (( $pg + 1 ) < $quant_pg) {
   echo "<a href=".$url_ant.($pg+1)."><span class='text-info'>&nbsp;Pr&oacute;xima</span></a>";
} else {
   echo "<span class='text-info'>&nbsp;Pr&oacute;xima</span>";
}
?>