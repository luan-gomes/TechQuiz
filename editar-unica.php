<?php
	include_once('conexao-bd.php');
	$conexao = abrirConexao();

	if(isset($_GET['id'])){

		$id = $_GET['id'];
		$sql = "SELECT * FROM questoes WHERE id = '$id'";
		$resultado = mysqli_query($conexao, $sql);
		$dados = mysqli_fetch_array($resultado);

		$sql_two = "SELECT * FROM questao_multipla WHERE questoes_id = '$id'";
		$resultado_two = mysqli_query($conexao, $sql_two);
		$dados_two = mysqli_fetch_array($resultado_two);

	}
?>

<!DOCTYPE html>
<html>
<head>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.nice-select.js"></script>
	<meta varshet="UTF-8" />
	<title>TechQuiz - Editar questões</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<!--<link rel="stylesheet" type="text/css" href="css/style-questoes.css" />-->
	<link rel="stylesheet" href="css/nice-select.css">
	<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@400;900&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<script>

		$(document).ready(function() {

			$('select').niceSelect();

			$('#edit-questao-unica').on('submit',function(e){

				e.preventDefault();

				$.ajax({
					type: "POST",
					url: 'control/QuestaoUnicaDAO.php',
					data:{
						editar_unica: $('#unica').val(),
						nome: $('#nome_unica').val(),
						titulo: $('#titulo_unica').val(),
						alternativa_a: $('#a').val(),
						alternativa_b: $('#b').val(),
						alternativa_c: $('#c').val(),
						alternativa_d: $('#d').val(),
						alternativa_e: $('#e').val(),
						alt_correta: $('#alternativa-correta').val(),
						questoes_id: $('#questoes-id').val(),
						unica_id: $('#unica-id').val()
					},
					success:function(){
						window.location.href = "buscar-questoes.php";
					},
					error:function(){
						alert('Infelizmente, não foi possível cadastrar esse questão!');
					}
				});
				
			});

	});

	</script>

</head>

<?php
	include_once('sidemenu.php');
?>

	<section id="inside-content"> 

		<div id="inside-header">
			<h1>Editar questão de escolha única</h1>
		</div>


		<div id="edit-unica-alt" class="container-questao">

			<form id="edit-questao-unica" method="post">

				<input id="questoes-id" type="hidden" name="questoes_id" value="<?php echo $dados['id'] ?>" />
				<input id="unica-id" type="hidden" name="unica_id" value="<?php echo $dados_two['id'] ?>" />

				<div class="inside-question-input">
					<label for="nome">Nome da Questão</label>
					<input id="nome_unica" type="text" name="nome" value="<?php echo $dados['nome'];?>" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="titulo">Título da Questão</label>
					<input id="titulo_unica" type="text" name="titulo" value="<?php echo $dados['titulo'];?>" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="alternativa_a">Alternativa A</label>
					<input id="a" type="text" name="alternativa_a" value="<?php echo $dados_two['alternativa_a'];?>" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="alternativa_b">Alternativa B</label>
					<input id="b" type="text" name="alternativa_b" value="<?php echo $dados_two['alternativa_b'];?>" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="alternativa_c">Alternativa C</label>
					<input id="c" type="text" name="alternativa_c"value="<?php echo $dados_two['alternativa_c'];?>" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="alternativa_d">Alternativa D</label>
					<input id="d" type="text" name="alternativa_d" value="<?php echo $dados_two['alternativa_d'];?>" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="alternativa_e">Alternativa E</label>
					<input id="e" type="text" name="alternativa_e" value="<?php echo $dados_two['alternativa_e'];?>"required />
				</div> <!-- inside-question-input -->

				<div id="container-select">
					<select id="alternativa-correta" class="wide" name="alt_correta"value="<?php echo $dados_two['alternativa_correta'];?>" required>
						<option data-display="Qual a alternativa correta?"></option>
						<option value="A">Alternativa A</option>
						<option value="B">Alternativa B</option>
						<option value="C">Alternativa C</option>
						<option value="D">Alternativa D</option>
						<option value="E">Alternativa E</option>
					</select>
				</div> <!--container-select -->

				<div class="cad-container-button after-select">
					<input id="unica" type="submit" name="editar_unica" value="Editar" />
				</div>

			</form>
			
		</div> <!-- container-questao-unica -->

	</section>

<?php
	include_once('footer.php');
?>