<?php
	session_start();
	include_once('head.php');
	include_once('sidemenu.php');
?>

	<section id="inside-content">
		<div id="inside-header">
			<h1>Seja bem-vindo, <?php echo $_SESSION["usuario"] ?>, ao painel de controle do TechQuiz</h1>
			<span>Tech Quiz é um evento que ocorre na UNIFACS para os estudantes dos cursos de Tecnologia da Informação. O formato do evento constitui-se em grupos de alunos, de quantidade limitada, que devem responde a perguntas projetadas.</span>
		</div>
	</section>

<?php
	include_once('footer.php');
?>