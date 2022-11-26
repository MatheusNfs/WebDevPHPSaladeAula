<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php require "html/head.php" ?>
</head>
	<!--  -->
	<body>
		<?php 
		include "html/header.php"; 
		require_once "src/conexao.php";
		
		$sql_code = "SELECT * FROM produtos";
		$sql_query = $conexao->query($sql_code);
		
		if(!isset($_SESSION)){
			SESSION_START();
		}
		?>
		<main>
		<?php
			if(isset($_SESSION['tipo'])){
				echo "<a href='cadastroProduto.php' class='col-1 btn btn-link align-middle' style = 'float:right;'>
				<i class='bi bi-plus-circle' style='font-size: 2rem;'></i>
				<h7 class='align-middle'>Cadastrar</h7>
			</a>";
			}
			?>
		

			<h1>Produtos</h1>
			<h3>Lista de Produtos Cadastrados</h3>
			<table class = "table table-bordered">
				<tr>
					<th scope="col"> ID </th>
					<th scope="col"> FOTO </th>
					<th scope="col"> NOME </th>
					<th scope="col"> TIPO </th>
					<th scope="col"> CATEGORIA </th>
					<th scope="col"> FABRICANTE </th>
					<th scope="col"> ATIVO </th>
					<th scope="col"> AÇÃO </th>
				</tr>
				<?php 
					while($produto = $sql_query->fetch_assoc()){

				?>
				<tr>
						<td><?=$produto['idproduto']?></td>
						<td><img height = "50" src="<?=$produto['foto']?>"></td>
						<td><?=$produto['nome']?></td>
						<td><?=$produto['tipo']?></td>
						<td><?=$produto['categoria']?></td>
						<td><?=$produto['fabricante']?></td>
						<td><?=$produto['descricao']?></td>
						<td><?=$produto['ativo']?></td>
						<td><?php
							if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == "G"){
								$idProduto = $produto['idproduto'];
								echo "<a href='estoque.php?id=$idProduto'>ESTOQUE</a>";
							}
							?>
							<a href="mais_detalhes.php?id=<?=$produto["idproduto"]; ?>">DETALHES</a>
						</td>
				</tr>
					<?php }?>
			</table>
		</main>
		<?php include "html/rodape.php" ?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>