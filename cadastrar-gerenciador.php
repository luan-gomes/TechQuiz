<?php
	include_once('head.php');
	include_once('sidemenu.php');
?>

	<section id="inside-content">
		<div id="inside-header">
			<h1>Cadastro de Gerenciador</h1>
		</div>
		<form id="my-form" method="post">
			<div class="inside-content-container">
				<label for="username">Nome do usuário</label>
				<input id="gerenciador-user" type="text" name="username" required />
			</div>
			<div class="inside-content-container">
				<label for="pass">Senha</label>
				<input id="gerenciador-senha" type="password" name="pass" required />
			</div>
			<div id="login-container-button">
				<input id="gerenciador-button" type="submit" name="cad_gerenciador" value="Cadastrar" />
			</div>
		</form>
	</section>

	<script>

		$('#menu-item-cadastrargerenciador').addClass('active');

		$('#my-form').on('submit',function(e){
			e.preventDefault();

			$.ajax({
				type: "POST",
				url: 'control/GerenciadorDAO.php',
				data:{
					cad_gerenciador: $('#gerenciador-button').val(),
					pass: $('#gerenciador-senha').val(),
					username: $('#gerenciador-user').val()
				},
				success:function(){
					alert('Gerenciador cadastrado com sucesso!');
					$('#gerenciador-senha').val('');
					$('#gerenciador-user').val('');

				},
				error:function(){
					alert('Infelizmente, não foi possível cadastrar esse gerenciador!');
				}
			});
				
		});

	</script>

<?php
	include_once('footer.php');
?>