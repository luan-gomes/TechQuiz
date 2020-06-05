<!DOCTYPE html>
<html>
<head>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.nice-select.js"></script>
	<meta varshet="UTF-8" />
	<title>TechQuiz - Cadastrar questões</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<!--<link rel="stylesheet" type="text/css" href="css/style-questoes.css" />-->
	<link rel="stylesheet" href="css/nice-select.css">
	<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@400;900&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<script>
		$(document).ready(function() {

		 	$('select').niceSelect();

		 	$('#tipo-questao').change(function(){
		 		if($('#tipo-questao').val()=="UN"){
		 			$('#unica').show(500);
		 		} else {
		 			$('#unica').hide();
		 		} if($('#tipo-questao').val()=="VF"){
		 			$('#vf').show(500);
		 		} else {
		 			$('#vf').hide();
		 		} if($('#tipo-questao').val()=="AB"){
		 			$('#aberta').show(500);
		 		} else {
		 			$('#aberta').hide();
		 		}
		 	});

		 	$('#menu-item-alterarsenha').addClass('active');

		});
	</script>

</head>

<?php
	include_once('sidemenu.php');
?>


	<section id="inside-content">

		<div id="inside-header">
			<h1>Cadastrar Questões</h1>
		</div>

		<div id="container-select ">
			<select id="tipo-questao" class="wide" name="questao" required>
				<option data-display="Escolha uma opção"></option>
				<option value="UN">Única escolha</option>
				<option value="VF">Verdadeiro ou Falso</option>
				<option value="AB">Aberta</option>
			</select>
		</div> <!--container-select -->

		<div id="aberta" class="container-questao">
			<h3>Questão Aberta</h3>
			<form>
				<div class="inside-question-input">
					<label for="name">Nome da Questão</label>
					<input type="text" name="name" required />
				</div>
				<div class="inside-question-input">
					<label for="titulo">Título da Questão</label>
					<input type="text" name="titulo" required />
				</div>
				<div class="inside-question-input">
					<label for="resposta">Resposta da Questão</label>
					<input type="text" name="resposta" required />
				</div>
				<div class="cad-container-button">
					<input type="submit" name="cadastrar-aberta" value="Cadastrar" />
				</div>
			</form>
		</div> <!-- container-questao-aberta -->

		<div id="unica" class="container-questao">

			<h3>Questão Única</h3>

			<form>

				<div class="inside-question-input">
					<label for="name">Nome da Questão</label>
					<input type="text" name="name" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="titulo">Título da Questão</label>
					<input type="text" name="titulo" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="alternativa-a">Alternativa A</label>
					<input type="text" name="alternativa-a" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="alternativa-b">Alternativa B</label>
					<input type="text" name="alternativa-b" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="alternativa-c">Alternativa C</label>
					<input type="text" name="alternativa-c" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="alternativa-d">Alternativa D</label>
					<input type="text" name="alternativa-d" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="alternativa-e">Alternativa E</label>
					<input type="text" name="alternativa-e" required />
				</div> <!-- inside-question-input -->

				<div id="container-select">
					<select id="alternativa-correta" class="wide" name="alt-correta" required>
						<option data-display="Qual a alternativa correta?"></option>
						<option value="A">Alternativa A</option>
						<option value="B">Alternativa B</option>
						<option value="C">Alternativa C</option>
						<option value="D">Alternativa D</option>
						<option value="E">Alternativa E</option>
					</select>
				</div> <!--container-select -->

				<div class="cad-container-button after-select">
					<input type="submit" name="cadastrar-unica" value="Cadastrar" />
				</div>

			</form>
			
		</div> <!-- container-questao-unica -->

		<div id="vf" class="container-questao">

			<h3>Questão Verdadeiro ou Falso</h3>

			<form>

				<div class="inside-question-input">
					<label for="name">Nome da Questão</label>
					<input type="text" name="name" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="titulo">Título da Questão</label>
					<input type="text" name="titulo" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="afirmacao">Afirmação</label>
					<input type="text" name="afirmacao" required />
				</div> <!-- inside-question-input -->

				<div id="container-select">
					<select id="veracidade" class="wide" name="verd-false" required>
						<option data-display="A afirmação é verdeira ou falsa?"></option>
						<option value="V">Verdadeira</option>
						<option value="F">Falsa</option>
					</select>
				</div> <!--container-select -->

				<div class="cad-container-button after-select" >
					<input type="submit" name="cadastrar-vf" value="Cadastrar" />
				</div>

			</form>
			
		</div> <!-- container-questao-vf -->

	</section> <!--inside-content -->


<?php
	include_once('footer.php');
?>