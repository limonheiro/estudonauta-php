<!DOCTYPE html>
<html lang="pt-br">

	<?php
		require_once "head.php";
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
			<table class="listagem">
			<?php
				$q = "select * from jogos j join generos g on j.genero_id = g.cod join produtoras p on j.produtora_id = p.cod where j.cod = '$c'";
				$busca = $banco->query($q);
		
				if(!$busca){
					echo "Não foi possivel terminar a busca {$banco->error}";
				}elseif($busca->num_rows == 1){
					$reg = $busca->fetch_object();
					echo "<tr><td colspan='2'><h2>{$reg->nome}</h2>";
					echo "<tr><td ><img src='".thumb($reg->capa)."' class='detalhes'>";
					echo "<td id='descricao'>{$reg->descricao}";					
					echo "<tr><td id='genero'>{$reg->genero}";
					echo "<td id='produtora'>{$reg->produtora}";
					echo "<tr><td>".number_format($reg->nota, 1)."/10.0";
					echo "<td>";
					if (isLoged()){
						if(isEditor()||isAdmin()){
							echo "<i class='material-icons'>edit</i>";
						}
						if(isAdmin()){
							echo "<i class='material-icons'>add_circle</i>";
							echo "<i class='material-icons'>delete</i>";
						}
					} 	
				}else{
					while ($reg = $busca->fetch_object()){
						echo $reg;
					}
				}
			?>
			</table>
				<?php echo voltar(); ?>
		</div>
		<?php
			require_once "rodape.php";
		?>
	</body>

</html>

