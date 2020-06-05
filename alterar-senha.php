<?php
	session_start();
	include_once('head.php');
	include_once('sidemenu.php');
?>

	<section id="inside-content">
		<div id="inside-header">
			<h1>Alterar senha</h1>
		</div>
		<form id="my-form" action="control/GerenciadorDAO.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $_SESSION["id"] ?>" />
			<input type="hidden" name="usuario" value="<?php echo $_SESSION["usuario"] ?>" />
			<div class="inside-content-container">
				<label for="senha-antiga">Senha antiga</label>
				<input id="form-senhaantiga" type="password" name="senha-antiga" required />
			</div>
			<div class="inside-content-container">
				<label for="senha-nova">Nova senha</label>
				<input id="form-senhanova" type="password" name="senha-nova" required />
			</div>
			<div id="login-container-button">
				<input type="submit" name="alterar-senha-gerenciador" value="Alterar" />
			</div>
		</form>
	</section>

	<script>
		
		$('#menu-item-alterarsenha').addClass('active');

	</script>

<?php
	include_once('footer.php');
?>