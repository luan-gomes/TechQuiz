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
			<input id="alterarsenha-id" type="hidden" name="id" value="<?php echo $_SESSION["id"] ?>" />
			<input id="alterarsenha-usuario" type="hidden" name="usuario" value="<?php echo $_SESSION["usuario"] ?>" />
			<div class="inside-content-container">
				<label for="senha_antiga">Senha antiga</label>
				<input id="alterarsenha-senhaantiga" type="password" name="senha_antiga" required />
			</div>
			<div class="inside-content-container">
				<label for="senha_nova">Nova senha</label>
				<input id="alterarsenha-senhanova" type="password" name="senha_nova" required />
			</div>
			<div id="login-container-button">
				<input id="alterarsenha-button" type="submit" name="alterar_senha_gerenciador" value="Alterar" />
			</div>
		</form>
	</section>

	<script>
		
		$('#menu-item-alterarsenha').addClass('active');

		$('#my-form').on('submit',function(e){

			e.preventDefault();

			$.ajax({
				url: 'control/GerenciadorDAO.php',
				type: "POST",
				data: {
					alterar_senha_gerenciador: $('#alterarsenha-button').val(),
					senha_antiga: $('#alterarsenha-senhaantiga').val(),
					senha_nova: $('#alterarsenha-senhanova').val(),
					id: $('#alterarsenha-id').val(),
					usuario: $('#alterarsenha-usuario').val()
				},
				success:function(){
					alert('Senha alterada com sucesso!');
					$('#alterarsenha-senhaantiga').val('');
					$('#alterarsenha-senhanova').val('');

				},
				error:function(){
					alert('Infelizmente, não foi possível alterar a senha!');
				}
			});

		});

	</script>

<?php
	include_once('footer.php');
?>