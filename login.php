<!DOCTYPE html>
<html>

<head>

	<script src="js/jquery.js"></script>
	<meta varshet="UTF-8" />
	<title>TechQuiz - Login do Gerenciador</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@400;900&display=swap" rel="stylesheet">

</head>

<body>
	<div class="login-container">

		<img class="login-logo" src="imagens/techquiz-logo.png" alt="Logo do TechQuiz" />

		<form class="login-form" action="control/GerenciadorDAO.php" method="POST">
			<div class="login-container-input">
				<label for="username"><img src="imagens/user.png"/></label>
				<input id="login-username" type="text" name="username" placeholder="Nome do usuário" required />
			</div>
			<div class="login-container-input">
				<label for="pass"><img src="imagens/key.png"/></label>
				<input id="login-pass" type="password" name="pass" placeholder="Senha" required />
			</div>
			<span id="login-msg-error">*Nome de usuário ou senha inválidos</span>
			<div id="login-container-button">
				<input type="submit" name="entrar-login-gerenciador" value="Entrar" />
			</div>

		</form> <!-- login-form -->

	</div> <!-- login-container -->

</body>

</html>