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

		function editarQuestao($id1,$id2){

			$conexao = abrirConexao();
			$sql = 'UPDATE questoes SET nome="'.$this->questao->nome.'" , titulo="'.$this->questao->titulo.'" WHERE id="'.$id1.'"';
			mysqli_query($conexao,$sql);
			$sql_2 = 'UPDATE questao_multipla SET alternativa_a="'.$this->questao->a.'",alternativa_b = "'.$this->questao->b.'",alternativa_c="'.$this->questao->c.'",alternativa_d="'.$this->questao->d.'",alternativa_e="'.$this->questao->e.'",alternativa_correta="'.$this->questao->correta.'" WHERE id="'.$id2.'"';
			mysqli_query($conexao,$sql_2);
			fecharConexao($conexao);

		}

		function deletarQuestao(){

			$conexao = abrirConexao();
			$sql_2 = 'DELETE FROM questao_multipla WHERE questoes_id="'.$this->questao.'"';
			mysqli_query($conexao,$sql_2);
			$sql = 'DELETE FROM questoes WHERE id="'.$this->questao.'"';
			mysqli_query($conexao,$sql);
			fecharConexao($conexao);
			header('Location: ../buscar-questoes.php');

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

	} else if(isset($_POST['editar_unica'])){

		$nome =  $_POST['nome'];
		$titulo =  $_POST['titulo'];
		$a =  $_POST['alternativa_a'];
		$b =  $_POST['alternativa_b'];
		$c =  $_POST['alternativa_c'];
		$d =  $_POST['alternativa_d'];
		$e =  $_POST['alternativa_e'];
		$alt_correta =  $_POST['alt_correta'];
		$questoes_id =  $_POST['questoes_id'];
		$unica_id =  $_POST['unica_id'];

		$manager = new QuestaoUnica($nome,$titulo,$a,$b,$c,$d,$e,$alt_correta);
		$control = new QuestaoUnicaDAO($manager);
		$control->editarQuestao($questoes_id,$unica_id);

	} else if(isset($_GET['id'])){

		$id = $_GET['id'];
		$control = new QuestaoUnicaDAO($id);
		$control->deletarQuestao();

	}

?>