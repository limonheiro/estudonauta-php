<!DOCTYPE html>
<html lang="pt-br">
	<?php
		require_once "head.php";
		$ordem = $_GET['o'] ?? "";
		$chave = $_GET['c'] ?? "";
	?>
	<title> <?php echo !empty($busca) ? $busca->fetch_object()->nome  : "Listagem de Jogos"; ?> </title>

	<body>
		<div id="corpo">
			<?php
				include_once "topo.php";
				// echo msg_sucess('ok');
				// echo msg_warning('ok');	
				// echo msg_error('ok');		
			?>
			<h1>Escolha seu jogo</h1>
			<form method="get" id="busca">
				Ordernar: <a href="index.php?o=N&c=<? echo $chave ?>">Nome</a> | <a href="index.php?o=P&c=<? echo $chave ?>">Produtora</a> | <a href="index.php?o=D&c=<? echo $chave ?> ">Nota Alta</a> | <a href="index.php?o=A&c=<? echo $chave ?>">Nota Baixa</a> | <?php echo !empty($_GET['c']) ? '<a href="index.php">Listar Tudo</a> |' : '' ?> 
				Buscar: <input type="text" name="c" size="10" maxlength="40"/>
				<input type="submit" value="Ok"/>
			</form>
			<table class="listagem">
				<?php
					$q = "select j.cod, j.nome, j.capa, p.produtora, g.genero from jogos j join generos g on g.cod = j.genero_id join produtoras p on p.cod = j.produtora_id ";
					$values = [
						"N" => "ORDER BY j.nome",
						"P" => "ORDER BY p.produtora",
						"D" => "ORDER BY j.nota DESC",
						"A" => "ORDER BY j.nota ASC",
						"" => ""
					];
					$busca = $chave ? " WHERE j.nome LIKE '%{$chave}%' OR p.produtora LIKE '%{$chave}%'  OR g.genero LIKE '%{$chave}%'" : " " ;
					$busca = $banco->query($q.$busca.$values[$ordem]);
					
					if(!$busca){
						echo "<h1>Infelizmente não foi possivel acessar a busca</h1>";
					}else if($busca->num_rows == 0){
							echo "<tr><td>Nenhum resultado encontrado";
					}else{
						while($reg = $busca->fetch_object()){
							echo "<tr><td><img src='".thumb($reg->capa)."' class='mini'><td><a href='detalhes.php?cod={$reg->cod}'>{$reg->nome}</a>";
							#está logado
							echo '<td>';
							if (isLoged()){
								if(isEditor()||isAdmin()){
									echo "<i class='material-icons'>edit</i>";
								}if(isAdmin()){
									echo "<i class='material-icons'>add_circle</i>";
									echo "<i class='material-icons'>delete</i>";
								}
							} 
						}
					}
				
				?>		
				
			</table>
		</div>
		<?php
			require_once "rodape.php";
		?>
	</body>

</html>
