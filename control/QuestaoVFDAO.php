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
			$sql_2 = 'INSERT INTO questao_vf VALUES(null,(SELECT MAX(id) FROM questoes),'.$this->questao->veracidade.',null)';
			mysqli_query($conexao,$sql_2);
			fecharConexao($conexao);

		}

		function editarQuestao($id1,$id2){

			$conexao = abrirConexao();
			$sql = 'UPDATE questoes SET nome="'.$this->questao->nome.'" , titulo="'.$this->questao->titulo.'" WHERE id="'.$id1.'"';
			mysqli_query($conexao,$sql);
			$sql_2 = 'UPDATE questao_vf SET alternatina_correta="'.$this->questao->veracidade.'" WHERE id="'.$id2.'"';
			mysqli_query($conexao,$sql_2);
			fecharConexao($conexao);

		}

		function deletarQuestao(){

			$conexao = abrirConexao();
			$sql_2 = 'DELETE FROM questao_vf WHERE questoes_id="'.$this->questao.'"';
			mysqli_query($conexao,$sql_2);
			$sql = 'DELETE FROM questoes WHERE id="'.$this->questao.'"';
			mysqli_query($conexao,$sql);
			fecharConexao($conexao);
			header('Location: ../buscar-questoes.php');

		}
	}

	if(isset($_POST['cadastrar_vf'])){


		$nome =  $_POST['nome'];
		$titulo =  $_POST['titulo'];
		$veracidade =  $_POST['veracidade'];

		$manager = new QuestaoVF($nome,$titulo,$veracidade);
		$control = new QuestaoVFDAO($manager);
		$control->cadastrarQuestao();

	} else if(isset($_POST['edit_vf'])){


		$nome =  $_POST['nome'];
		$titulo =  $_POST['titulo'];
		$veracidade =  $_POST['veracidade'];
		$questoes_id =  $_POST['questoes_id'];
		$unica_id =  $_POST['unica_id'];

		$manager = new QuestaoVF($nome,$titulo,$veracidade);
		$control = new QuestaoVFDAO($manager);
		$control->editarQuestao($questoes_id,$unica_id);

	} else if(isset($_GET['id'])){

		$id = $_GET['id'];
		$control = new QuestaoVFDAO($id);
		$control->deletarQuestao();

	}


?>