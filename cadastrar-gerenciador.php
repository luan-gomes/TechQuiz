<?php
	include_once('head.php');
	include_once('sidemenu.php');
?>

	<section id="inside-content">
		<div id="inside-header">
			<h1>Cadastro de Gerenciador</h1>
		</div>
		<form id="my-form" action="control/GerenciadorDAO.php" method="POST">
			<div class="inside-content-container">
				<label for="username">Nome do usuário</label>
				<input id="form-user" type="text" name="username" required />
			</div>
			<div class="inside-content-container">
				<label for="pass">Senha</label>
				<input id="form-senha" type="password" name="pass" required />
			</div>
			<div id="login-container-button">
				<input type="submit" name="cad-gerenciador" value="Cadastrar" />
			</div>
		</form>
	</section>

	<script>
		
		$('#menu-item-cadastrargerenciador').addClass('active');

	</script>

<?php
	include_once('footer.php');
?>