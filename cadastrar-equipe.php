<?php
	include_once('conexao-bd.php');
	$conexao = abrirConexao();
?>

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

		$(document).ready(function(){

			$('select').niceSelect();

			$('#menu-item-cadastrarequipe').addClass('active');

			$('#my-form').on('submit',function(e){
				e.preventDefault();

				$.ajax({
					type: "POST",
					url: 'control/EquipeDAO.php',
					data:{
						cad_equipe: $('#cad_equipe').val(),
						senha: $('#senha').val(),
						username: $('#username').val(),
						evento: $('#evento').val(),
						nome_equipe: $('#nome_equipe').val(),
						membro1: $('#membro1').val(),
						matricula1: $('#matricula1').val(),
						membro2: $('#membro2').val(),
						matricula2: $('#matricula2').val(),
						membro3: $('#membro3').val(),
						matricula3: $('#matricula3').val(),
						membro4: $('#membro4').val(),
						matricula4: $('#matricula4').val(),
						membro5: $('#membro5').val(),
						matricula5: $('#matricula5').val()
					},
					success:function(){
						alert('Equipe cadastrada com sucesso!');
						$('#senha').val('');
						$('#username').val('');
						$('#evento').val('');
						$('#nome_equipe').val('');
						$('#membro1').val('');
						$('#matricula1').val('');
						$('#membro2').val('');
						$('#matricula2').val('');
						$('#membro3').val('');
						$('#matricula3').val('');
						$('#membro4').val('');
						$('#matricula4').val('');
						$('#membro5').val('');
						$('#matricula5').val('');
					},
					error:function(){
						alert('Infelizmente, não foi possível cadastrar essa equipe!');
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
			<h1>Cadastro de Equipe</h1>
		</div>
		<form id="my-form" method="post">

			<div class="inside-content-container">
				<label for="nome_equipe">Nome da Equipe</label>
				<input id="nome_equipe" type="text" name="nome_equipe" required />
			</div>

			<div class="inside-content-container">
				<label for="username">Nome de usuário</label>
				<input id="username" type="text" name="username" required />
			</div>

			<div class="inside-content-container">
				<label for="senha">Senha</label>
				<input id="senha" type="password" name="senha" required />
			</div>

			<!-- EVENTO -->

			<label id="cad-equipe-label-evento" for="evento">Selecione o evento</label>
			<div id="container-select ">
				<select id="evento" class="wide" name="evento" required>
					<option data-display="Escolha uma opção"></option>
					<?php
							$sql = 'select * from evento';
							$resultado = mysqli_query($conexao,$sql);
							while($dados = mysqli_fetch_assoc($resultado)):
					?>
					<option value="<?php echo $dados["id"]; ?>"><?php echo $dados["nome"]; ?></option>
					<?php
							endwhile;
					?>
				</select>
			</div> <!--container-select -->
			<div id="cad-equipe-divisor-select"></div>
			<!-- MEMBROS -->

			<div class="inside-content-container">
				<label for="membro1">Nome do membro 1</label>
				<input id="membro1" type="text" name="membro1" required />
			</div>

			<div class="inside-content-container">
				<label for="matricula1">Matrícula do membro 1</label>
				<input id="matricula1" type="text" name="matricula1" required />
			</div>

			<div class="inside-content-container">
				<label for="membro2">Nome do membro 2</label>
				<input id="membro2" type="text" name="membro2" required />
			</div>

			<div class="inside-content-container">
				<label for="matricula2">Matrícula do membro 2</label>
				<input id="matricula2" type="text" name="matricula2" required />
			</div>

			<div class="inside-content-container">
				<label for="membro3">Nome do membro 3</label>
				<input id="membro3" type="text" name="membro3" required />
			</div>

			<div class="inside-content-container">
				<label for="matricula3">Matrícula do membro 3</label>
				<input id="matrícula3" type="text" name="matricula3" required />
			</div>

			<div class="inside-content-container">
				<label for="membro4">Nome do membro 4</label>
				<input id="membro4" type="text" name="membro4" required />
			</div>

			<div class="inside-content-container">
				<label for="matricula4">Matrícula do membro 4</label>
				<input id="matricula4" type="text" name="matricula4" required />
			</div>

			<div class="inside-content-container">
				<label for="membro5">Nome do membro 5</label>
				<input id="membro5" type="text" name="membro5" required />
			</div>

			<div class="inside-content-container">
				<label for="matricula5">Matrícula do membro 5</label>
				<input id="matricula5" type="text" name="matricula5" required />
			</div>

			<div id="login-container-button">
				<input id="cad_equipe" type="submit" name="cad_equipe" value="Cadastrar" />
			</div>
		</form>
	</section>

<?php
	include_once('footer.php');
?>