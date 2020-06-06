<?php
	include_once('conexao-bd.php');
	$conexao = abrirConexao();

	if(isset($_GET['id'])){

		$id = $_GET['id'];
		$sql = "SELECT * FROM questoes WHERE id = '$id'";
		$resultado = mysqli_query($conexao, $sql);
		$dados = mysqli_fetch_array($resultado);

		$sql_two = "SELECT * FROM questao_vf WHERE questoes_id = '$id'";
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

			$('#edit-questao-vf').on('submit',function(e){

				e.preventDefault();

				$.ajax({
					type: "POST",
					url: 'control/QuestaoVFDAO.php',
					data:{
						edit_vf: $('#edit_vf').val(),
						nome: $('#nome_vf').val(),
						titulo: $('#titulo_vf').val(),
						veracidade: $('#veracidade').val(),
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

		<div id="edit-vf" class="container-questao">

			<h3>Questão Verdadeiro ou Falso</h3>

			<form id="edit-questao-vf" method="post">

				<input id="questoes-id" type="hidden" name="questoes_id" value="<?php echo $dados['id'] ?>" />
				<input id="unica-id" type="hidden" name="unica_id" value="<?php echo $dados_two['id'] ?>" />

				<div class="inside-question-input">
					<label for="nome">Nome da Questão</label>
					<input id="nome_vf" type="text" name="nome" value="<?php echo $dados['nome'] ?>" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="titulo">Título da Questão</label>
					<input id="titulo_vf" type="text" name="titulo" value="<?php echo $dados['titulo'] ?>" required />
				</div> <!-- inside-question-input -->

				<div id="container-select">
					<select id="veracidade" class="wide" name="veracidade" required>
						<option data-display="A afirmação é verdeira ou falsa?"></option>
						<option value="1">Verdadeira</option>
						<option value="0">Falsa</option>
					</select>
				</div> <!--container-select -->

				<div class="cad-container-button after-select">
					<input id="edit_vf" type="submit" name="edit_vf" value="Editar" />
				</div>

			</form>
			
		</div> <!-- container-questao-vf -->

	</section>

<?php
	include_once('footer.php');
?>