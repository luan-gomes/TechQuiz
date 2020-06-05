<?php  
	session_start();
?>
<!DOCTYPE html>
<html>

<head>

	<script src="js/jquery.js"></script>
	<meta varshet="UTF-8" />
	<title>TechQuiz - Login do Gerenciador</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@400;900&display=swap" rel="stylesheet">

	<script>
		
		$(document).ready(function(){

			$('#login-form').on('submit',function(e){
			e.preventDefault();

			$.ajax({
				type: "POST",
				url: 'control/GerenciadorDAO.php',
				dataType: 'json',
				data:{
					entrar_login_gerenciador: $('#login-button').val(),
					pass: $('#login-pass').val(),
					username: $('#login-username').val()
				},
				success:function(retorno){
					if(retorno.ok){
						window.location.href = "welcome.php";
					}else if(retorno.erro){
						$('#login-msg-error').html('');
						$('#login-msg-error').html(retorno.erro);
					}

				},
				error:function(){
					alert('deu ruim!');
				}
			});
				
		});

		});
	</script>


</head>

<body>
	<div class="login-container">

		<img class="login-logo" src="imagens/techquiz-logo.png" alt="Logo do TechQuiz" />

		<form id="login-form" method="post">
			<div class="login-container-input">
				<label for="username"><img src="imagens/user.png"/></label>
				<input id="login-username" type="text" name="username" placeholder="Nome do usuário" required />
			</div>
			<div class="login-container-input">
				<label for="pass"><img src="imagens/key.png"/></label>
				<input id="login-pass" type="password" name="pass" placeholder="Senha" required />
			</div>
			<span id="login-msg-error"></span>
			<div id="login-container-button">
				<input id="login-button" type="submit" name="entrar_login_gerenciador" value="Entrar" />
			</div>

		</form> <!-- login-form -->

	</div> <!-- login-container -->


</body>

</html>