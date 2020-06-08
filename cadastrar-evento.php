<?php
	include_once('head.php');
	include_once('sidemenu.php');
?>

	<section id="inside-content">
		<div id="inside-header">
			<h1>Cadastro de Evento</h1>
		</div>
		<form id="my-form" method="post">
			<div class="inside-content-container">
				<label for="username">Nome do evento</label>
				<input id="nome_evento" type="text" name="nome_evento" required />
			</div>
			<div class="inside-content-container">
				<label for="semestre">Semestre</label>
				<input id="semestre" type="text" name="semestre" required />
			</div>
			<div id="login-container-button">
				<input id="cad_evento" type="submit" name="cad_evento" value="Cadastrar" />
			</div>
		</form>
	</section>

	<script>

		$('#menu-item-cadastrarevento').addClass('active');

		$('#my-form').on('submit',function(e){
			e.preventDefault();

			$.ajax({
				type: "POST",
				url: 'control/EventoDAO.php',
				data:{
					cad_evento: $('#cad_evento').val(),
					semestre: $('#semestre').val(),
					nome_evento: $('#nome_evento').val()
				},
				success:function(){
					alert('Evento cadastrado com sucesso!');
					$('#semestre').val('');
					$('#nome_evento').val('');

				},
				error:function(){
					alert('Infelizmente, não foi possível cadastrar esse evento!');
				}
			});
				
		});

	</script>

<?php
	include_once('footer.php');
?>