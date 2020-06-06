<?php

	session_start();
	include_once('../conexao-bd.php');
	include_once('../model/QuestaoAberta.php');

	class QuestaoAbertaDAO{

		public $questao;

		function __construct($questao){
			$this->questao = $questao;
		}

		function cadastrarQuestao(){
			
			$conexao = abrirConexao();
			$sql = 'INSERT INTO questoes VALUES(null,"'.$this->questao->nome.'","'.$this->questao->titulo.'")';
			mysqli_query($conexao,$sql);
			$sql_2 = 'INSERT INTO questao_aberta VALUES(null,(SELECT MAX(id) FROM questoes),"'.$this->questao->rubrica.'")';
			mysqli_query($conexao,$sql_2);
			fecharConexao($conexao);

		}

		function editarQuestao($id1,$id2){

			$conexao = abrirConexao();
			$sql = 'UPDATE questoes SET nome="'.$this->questao->nome.'" , titulo="'.$this->questao->titulo.'" WHERE id="'.$id1.'"';
			mysqli_query($conexao,$sql);
			$sql_2 = 'UPDATE questao_aberta SET rubrica="'.$this->questao->rubrica.'" WHERE id="'.$id2.'"';
			mysqli_query($conexao,$sql_2);
			fecharConexao($conexao);

		}
	}

	if(isset($_POST['cadastrar_aberta'])){


		$nome_aberta =  $_POST['nome_aberta'];
		$titulo_aberta =  $_POST['titulo_aberta'];
		$resposta_aberta =  $_POST['resposta_aberta'];

		$manager = new QuestaoAberta($nome_aberta,$titulo_aberta,$resposta_aberta);
		$control = new QuestaoAbertaDAO($manager);
		$control->cadastrarQuestao();

	} else if(isset($_POST['editar_aberta'])){


		$nome_aberta =  $_POST['nome_aberta'];
		$titulo_aberta =  $_POST['titulo_aberta'];
		$resposta_aberta =  $_POST['resposta_aberta'];
		$questoes_id =  $_POST['questoes_id'];
		$unica_id =  $_POST['unica_id'];

		$manager = new QuestaoAberta($nome_aberta,$titulo_aberta,$resposta_aberta);
		$control = new QuestaoAbertaDAO($manager);
		$control->editarQuestao($questoes_id,$unica_id);

	} 

?>