<?php
	include_once('conexao-bd.php');
	include_once('head.php');
	include_once('sidemenu.php');
	$conexao = abrirConexao();
?>


	<section id="inside-content">
		<div id="inside-header">
			<h1>Buscar Questões</h1>
			<hr/>
		</div>

		<div id="selecao-aberta" class="container-buscar-questao">
			<h3>Questões Abertas</h3>

			<table class="tabela-edicao">
				
				<thead>
					<th>Nome</th>
					<th>Título</th>
					<th>Rúbrica</th>
					<th></th>
					<th></th>
				<tbody>
					<?php
						$sql = 'select * from questoes inner join questao_aberta on questoes.id = questao_aberta.questoes_id';
						$resultado = mysqli_query($conexao,$sql);
						while($dados = mysqli_fetch_assoc($resultado)):
					?>
					<tr>
						<td><?php echo $dados["nome"]; ?></td>
						<td><?php echo $dados['titulo']; ?></td>
						<td><?php echo $dados['rubrica']; ?></td>
						<td>
							<a href="editar-aberta.php?id=<?php echo $dados['questoes_id'];?>" class="button-buscar-questao" id="editar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						</td>
						<td>
							<a href="control/QuestaoAbertaDAO.php?id=<?php echo $dados['questoes_id'];?>" class="button-buscar-questao" id="deletar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>

					<?php
						endwhile;
					?>
				</tbody>

			</table>
			
		</div>

		<div id="selecao-unica" class="container-buscar-questao">

			<h3>Questões de Resposta Única</h3>

			<table class="tabela-edicao">

				<thead>
					<th>Nome</th>
					<th>Título</th>
					<th>A</th>
					<th>B</th>
					<th>C</th>
					<th>D</th>
					<th>E</th>
					<th>Correta</th>
					<th></th>
					<th></th>
				<tbody>
					<?php
						$sql_unica = 'select * from questoes inner join questao_multipla on questoes.id = questao_multipla.questoes_id';
						$resultado_unica = mysqli_query($conexao,$sql_unica);
						while($dados_unica = mysqli_fetch_assoc($resultado_unica)):
					?>
					<tr>
						<td><?php echo $dados_unica["nome"]; ?></td>
						<td><?php echo $dados_unica['titulo']; ?></td>
						<td><?php echo $dados_unica['alternativa_a']; ?></td>
						<td><?php echo $dados_unica['alternativa_b']; ?></td>
						<td><?php echo $dados_unica['alternativa_c']; ?></td>
						<td><?php echo $dados_unica['alternativa_d']; ?></td>
						<td><?php echo $dados_unica['alternativa_e']; ?></td>
						<td><?php echo $dados_unica['alternativa_correta']; ?></td>
						<td>
							<a href="editar-unica.php?id=<?php echo $dados_unica['questoes_id'];?>" class="button-buscar-questao" id="editar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						</td>
						<td>
							<a href="control/QuestaoUnicaDAO.php?id=<?php echo $dados_unica['questoes_id'];?>" class="button-buscar-questao" id="deletar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>

					<?php
						endwhile;
					?>
				</tbody>

			</table>
			
		</div>

		<div id="selecao-vf" class="container-buscar-questao">
			<h3>Questões de Verdadeiro ou Falso</h3>

			<table class="tabela-edicao">
				
				<thead>
					<th>Nome</th>
					<th>Título</th>
					<th>Veracidade</th>
					<th></th>
					<th></th>
				<tbody>
					<?php
						$sql_vf = 'select * from questoes inner join questao_vf on questoes.id = questao_vf.questoes_id';
						$resultado_vf = mysqli_query($conexao,$sql_vf);
						while($dados_vf = mysqli_fetch_assoc($resultado_vf)):
					?>
					<tr>
						<td><?php echo $dados_vf["nome"]; ?></td>
						<td><?php echo $dados_vf['titulo']; ?></td>
						<td><?php
						 
						 	if($dados_vf['alternatina_correta']==true){
						 		echo 'Verdadeiro';
						 	} else {
						 		echo 'Falso';
						 	}

						 ?></td>
						<td>
							<a href="editar-vf.php?id=<?php echo $dados_vf['questoes_id'];?>" class="button-buscar-questao" id="editar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						</td>
						<td>
							<a href="control/QuestaoVFDAO.php?id=<?php echo $dados_vf['questoes_id'];?>" class="button-buscar-questao" id="deletar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>

					<?php
						endwhile;
					?>
				</tbody>

			</table>
			
		</div>

	</section>

	<script>

		$('#menu-item-buscarquestoes').addClass('active');

	</script>

<?php
	include_once('footer.php');
?>