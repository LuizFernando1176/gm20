<?php
	$conn = new mysqli('localhost', 'root', '', 'bd_pc');
	
	if(!$conn){
		die("Error: Erro ao conectar ao banco.");
	}
?>