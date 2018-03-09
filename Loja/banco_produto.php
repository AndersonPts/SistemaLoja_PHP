<?php 

function listaProdutos($conexao) {

	$produtos = array();
	$resultado = mysqli_query($conexao, "SELECT p.*, c.nome as categoria_nome FROM produtos as p join categorias as c on c.id=p.categoria_id");

	while($produto = mysqli_fetch_assoc($resultado)){
		array_push($produtos, $produto);
	}
	return $produtos;
}

function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado){
	$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
	return $resultadoDaInsercao;
}

function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado){
$query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria_id}, usado = {$usado} where id = '{$id}'";
	return mysqli_query($conexao, $query);
	
	}

function buscaProduto($conexao, $id) {
	$query = "SELECT * FROM produtos where id = {$id}";
	$resultado = mysqli_query($conexao, $query); #Executa a Query
	return mysqli_fetch_assoc($resultado); #Retorna o resultado associado
}

function removeProduto($conexao, $id){
	$query = "DELETE FROM produtos WHERE id = {$id}";
	return mysqli_query($conexao, $query);
}