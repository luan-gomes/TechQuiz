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
		 			$('#unica-alt').show(500);
		 		} else {
		 			$('#unica-alt').hide();
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

		 	$('#menu-item-cadastrarquestoes').addClass('active');

		 	$('#cad-questao-aberta').on('submit',function(e){

				e.preventDefault();

				$.ajax({
					type: "POST",
					url: 'control/QuestaoAbertaDAO.php',
					data:{
						cadastrar_aberta: $('#aberta_button').val(),
						nome_aberta: $('#nome_aberta').val(),
						titulo_aberta: $('#titulo_aberta').val(),
						resposta_aberta: $('#resposta_aberta').val()
					},
					success:function(){
						alert('Questão aberta cadastrada com sucesso!');
						$('#nome_aberta').val('');
						$('#titulo_aberta').val('');
						$('#resposta_aberta').val('');
					},
					error:function(){
						alert('Infelizmente, não foi possível cadastrar esse questão!');
					}
				});
				
			});


		 	$('#cad-questao-unica').on('submit',function(e){

				e.preventDefault();

				$.ajax({
					type: "POST",
					url: 'control/QuestaoUnicaDAO.php',
					data:{
						cadastrar_unica: $('#unica').val(),
						nome: $('#nome_unica').val(),
						titulo: $('#titulo_unica').val(),
						alternativa_a: $('#a').val(),
						alternativa_b: $('#b').val(),
						alternativa_c: $('#c').val(),
						alternativa_d: $('#d').val(),
						alternativa_e: $('#e').val(),
						alt_correta: $('#alternativa-correta').val()
					},
					success:function(){
						alert('Questão única cadastrada com sucesso!');
						$('#nome_unica').val('');
						$('#titulo_unica').val('');
						$('#a').val('');
						$('#b').val('');
						$('#c').val('');
						$('#d').val('');
						$('#e').val('');
						$('#alternativa-correta').val('');
					},
					error:function(){
						alert('Infelizmente, não foi possível cadastrar esse questão!');
					}
				});
				
			});


		 	$('#cad-questao-vf').on('submit',function(e){
		 		
				e.preventDefault();

				$.ajax({
					type: "POST",
					url: 'control/QuestaoVFDAO.php',
					data:{
						cadastrar_vf: $('#vf-button').val(),
						nome: $('#nome_vf').val(),
						titulo: $('#titulo_vf').val(),
						veracidade: $('#veracidade').val()
					},
					success:function(){
						alert('Questão de Verdadeiro ou Falso cadastrada com sucesso!');
						$('#nome_vf').val('');
						$('#titulo_vf').val('');
						$('#veracidade').val('');
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
			<form id="cad-questao-aberta" method="post">
				<div class="inside-question-input">
					<label for="nome">Nome da Questão</label>
					<input id="nome_aberta" type="text" name="nome_aberta" required />
				</div>
				<div class="inside-question-input">
					<label for="titulo">Título da Questão</label>
					<input id="titulo_aberta" type="text" name="titulo_aberta" required />
				</div>
				<div class="inside-question-input">
					<label for="resposta">Resposta da Questão</label>
					<input id="resposta_aberta" type="text" name="resposta_aberta" required />
				</div>
				<div class="cad-container-button">
					<input id="aberta_button" type="submit" name="cadastrar_aberta" value="Cadastrar" />
				</div>
			</form>
		</div> <!-- container-questao-aberta -->

		<div id="unica-alt" class="container-questao">

			<h3>Questão Única</h3>

			<form id="cad-questao-unica" method="post">

				<div class="inside-question-input">
					<label for="nome">Nome da Questão</label>
					<input id="nome_unica" type="text" name="nome" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="titulo">Título da Questão</label>
					<input id="titulo_unica" type="text" name="titulo" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="alternativa_a">Alternativa A</label>
					<input id="a" type="text" name="alternativa_a" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="alternativa_b">Alternativa B</label>
					<input id="b" type="text" name="alternativa_b" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="alternativa_c">Alternativa C</label>
					<input id="c" type="text" name="alternativa_c" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="alternativa_d">Alternativa D</label>
					<input id="d" type="text" name="alternativa_d" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="alternativa_e">Alternativa E</label>
					<input id="e" type="text" name="alternativa_e" required />
				</div> <!-- inside-question-input -->

				<div id="container-select">
					<select id="alternativa-correta" class="wide" name="alt_correta" required>
						<option data-display="Qual a alternativa correta?"></option>
						<option value="A">Alternativa A</option>
						<option value="B">Alternativa B</option>
						<option value="C">Alternativa C</option>
						<option value="D">Alternativa D</option>
						<option value="E">Alternativa E</option>
					</select>
				</div> <!--container-select -->

				<div class="cad-container-button after-select">
					<input id="unica" type="submit" name="cadastrar_unica" value="Cadastrar" />
				</div>

			</form>
			
		</div> <!-- container-questao-unica -->

		<div id="vf" class="container-questao">

			<h3>Questão Verdadeiro ou Falso</h3>

			<form id="cad-questao-vf" method="post">

				<div class="inside-question-input">
					<label for="nome">Nome da Questão</label>
					<input id="nome_vf" type="text" name="nome" required />
				</div> <!-- inside-question-input -->

				<div class="inside-question-input">
					<label for="titulo">Título da Questão</label>
					<input id="titulo_vf" type="text" name="titulo" required />
				</div> <!-- inside-question-input -->

				<div id="container-select">
					<select id="veracidade" class="wide" name="veracidade" required>
						<option data-display="A afirmação é verdeira ou falsa?"></option>
						<option value="1">Verdadeira</option>
						<option value="0">Falsa</option>
					</select>
				</div> <!--container-select -->

				<div class="cad-container-button after-select" >
					<input id="vf-button" type="submit" name="cadastrar_vf" value="Cadastrar" />
				</div>

			</form>
			
		</div> <!-- container-questao-vf -->

	</section> <!--inside-content -->


<?php
	include_once('footer.php');
?>