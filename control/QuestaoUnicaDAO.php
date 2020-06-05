<?php

	session_start();
	include_once('../conexao-bd.php');
	include_once('../model/QuestaoUnica.php');

	class QuestaoUnicaDAO{

		public $questao;

		function __construct($questao){
			$this->questao = $questao;
		}

		function cadastrarQuestao(){

			$conexao = abrirConexao();
			$sql = 'INSERT INTO questoes VALUES(null,"'.$this->questao->nome.'","'.$this->questao->titulo.'")';
			mysqli_query($conexao,$sql);

			$sql_2 = 'INSERT INTO questao_multipla VALUES(null,(SELECT MAX(id) FROM questoes),"'.$this->questao->a.'","'.$this->questao->b.'","'.$this->questao->c.'","'.$this->questao->d.'","'.$this->questao->e.'","'.$this->questao->correta.'")';
			mysqli_query($conexao,$sql_2);
			fecharConexao($conexao);

		}
	} 

	if(isset($_POST['cadastrar_unica'])){

		$nome =  $_POST['nome'];
		$titulo =  $_POST['titulo'];
		$a =  $_POST['alternativa_a'];
		$b =  $_POST['alternativa_b'];
		$c =  $_POST['alternativa_c'];
		$d =  $_POST['alternativa_d'];
		$e =  $_POST['alternativa_e'];
		$alt_correta =  $_POST['alt_correta'];

		$manager = new QuestaoUnica($nome,$titulo,$a,$b,$c,$d,$e,$alt_correta);
		$control = new QuestaoUnicaDAO($manager);
		$control->cadastrarQuestao();

	}

?>