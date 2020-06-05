<?php

	session_start();
	include_once('../conexao-bd.php');
	include_once('../model/QuestaoVF.php');

	class QuestaoVFDAO{

		public $questao;

		function __construct($questao){
			$this->questao = $questao;
		}

		function cadastrarQuestao(){
			
			$conexao = abrirConexao();
			$sql = 'INSERT INTO questoes VALUES(null,"'.$this->questao->nome.'","'.$this->questao->titulo.'")';
			mysqli_query($conexao,$sql);
			$sql_2 = 'INSERT INTO questao_vf VALUES(null,(SELECT MAX(id) FROM questoes),'.$this->questao->veracidade.',"'.$this->questao->afirmacao.'")';
			mysqli_query($conexao,$sql_2);
			fecharConexao($conexao);

		}
	}

	if(isset($_POST['cadastrar_vf'])){


		$nome =  $_POST['nome'];
		$titulo =  $_POST['titulo'];
		$afirmacao =  $_POST['afirmacao'];
		$veracidade =  $_POST['veracidade'];

		$manager = new QuestaoVF($nome,$titulo,$afirmacao,$veracidade);
		$control = new QuestaoVFDAO($manager);
		$control->cadastrarQuestao();

	}  

?>