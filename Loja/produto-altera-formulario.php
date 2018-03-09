<!-- Aqui temos duas requisições
	** Uma para pedir o formulário, e a resposta foi o formulário; 
	** A outra foi o envio das informações, e a resposta foi a mensagem elegante confirmando a adição.
-->
<?php 
include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");
include("banco_produto.php");

$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
$categorias = listaCategorias($conexao);
$usado = $produto['usado'] ? "checked='checked'" : ""; # NESSE TERNÁRIO, REALIZA-SE A CONFERÊNCIA DO CAMPO USADO E RETORNA MARCADO CASO SEJA IGUAL 

 ?>
		
	<h1>Alterando Produto</h1>
		<form action="altera-produto.php" method="POST">
			<input type="hidden" name="id" value="<?=$produto['id']?>" >
			<table class="table">
				<tr> <!-- LINHA -->
					<td>Nome</td> <!-- COLUNA  -->
					<td><input class="form-control" type="text" name="nome" value="<?=$produto['nome']?>" /><br/></td>
				</tr>
				<tr>
					<td>Preço</td>
					<td><input class="form-control" type="number" name="preco" value="<?=$produto['preco']?>" /><br/></td>
				</tr>
				<tr>
					<td>Descrição</td>
					<td><textarea name="descricao" class="form-control"><?=$produto['descricao']?></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="checkbox" name="usado" <?=$usado?> value="true"> Usado</td>
				</tr>
				<tr>
					<td>Categoria</td>
					<td>
						<select name="categoria_id" form="form-control">
						<?php foreach ($categorias as $categoria) : 
							$essaEhACategoria = $produto['categoria_id'] == $categoria['id'];
							$selecao = $essaEhACategoria ? "selected='selected'" : "";
						?>
							<option value="<?=$categoria['id']?>" <?=$selecao?>>
								<?=$categoria['nome']?>
							</option>	
						<?php endforeach ?>
					</select>
					</td>
				</tr>
				<tr>	
					<td><input class="btn btn-primary" type="submit" value="Alterar" /><br/></td>
				</tr>		
			</table>
		</form>	
<?php include("rodape.php"); ?>




