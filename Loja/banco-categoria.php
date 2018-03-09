<?php

function listaCategorias($conexao){#função
	$categorias = array(); # CRIA UM ARRAY VAZIA DE CATEGORIAS 
	$query = "SELECT * FROM categorias"; # CONSULTA SQL RESPONSÁVEL POR BUSCAR AS CATEGORIAS NO BANCO
	$resultado = mysqli_query($conexao, $query); # EXECUTA A QUERY DE CIMA
	while ($categoria = mysqli_fetch_assoc($resultado)) { # PARA CADA LINHA ASSOCIADA DA TABELA, PEGAR UMA CATEGORIA ATÉ ACABAR
		array_push($categorias, $categoria);
	}
	return $categorias;
}

?>