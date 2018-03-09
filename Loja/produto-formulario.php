<!-- Aqui temos duas requisições
	** Uma para pedir o formulário, e a resposta foi o formulário; 
	** A outra foi o envio das informações, e a resposta foi a mensagem elegante confirmando a adição.
-->
<?php include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");

$categorias = listaCategorias($conexao);
 ?>
		
	<h1>Formulário de Cadastro</h1>
		<form action="adiciona_produto.php" method="POST">
			<table class="table">
				<tr> <!-- LINHA -->
					<td>Nome</td> <!-- COLUNA  -->
					<td><input class="form-control" type="text" name="nome" /><br/></td>
				</tr>
				<tr>
					<td>Preço</td>
					<td><input class="form-control" type="number" name="preco" /><br/></td>
				</tr>
				<tr>
					<td>Descrição</td>
					<td><textarea name="descricao" class="form-control" ></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="checkbox" name="usado" value="true"> Usado</td>
				</tr>
				<tr>
					<td>Categoria</td>
					<td>
						<select name="categoria_id" form="form-control">
						<?php foreach ($categorias as $categoria) : ?>
							<option value="<?=$categoria['id']?>">
								<?=$categoria['nome']?>
							</option>
						<?php endforeach ?>
					</select>
					</td>
				</tr>
				<tr>	
					<td><input class="btn btn-primary" type="submit" value="Cadastrar" /><br/></td>
				</tr>		
			</table>
		</form>	
<?php include("rodape.php"); ?>




