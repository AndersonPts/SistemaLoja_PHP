<?php include("cabecalho.php"); ?>
<?php include("conecta.php"); ?>
<?php include("banco_produto.php"); ?>

<?php 
if(array_key_exists("removido", $_GET) && $_GET['removido']==true){
?>
	<p class="alert-sucess">Produto apagado com sucesso!</p>
<?php	
	}
?>

<table class="table table-striped table-bordered">
<?php
	$produtos = listaProdutos($conexao);
	foreach ($produtos as $produto) :
?>
	<tr>
		<td><?= $produto['nome'] ?></td>
		<td><?= $produto['preco'] ?></td>
		<td><?= substr($produto['descricao'], 0, 40) ?></td>
		<td><?= $produto['categoria_nome'] ?></td>
		<td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto['id']?>">Alterar</a></td>
		<td>
			<form action="remove-produto.php" method="POST">
			<input type="hidden" name="id" value="<?=$produto['id']?>">
				<button class="btn btn-danger">Remover</button>
			</form>			
		</td>
	</tr>
<?php
	endforeach
?>
</table>
<?php include("rodape.php"); ?>