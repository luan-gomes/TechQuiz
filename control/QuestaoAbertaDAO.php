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
	}

	if(isset($_POST['cadastrar_aberta'])){


		$nome_aberta =  $_POST['nome_aberta'];
		$titulo_aberta =  $_POST['titulo_aberta'];
		$resposta_aberta =  $_POST['resposta_aberta'];

		$manager = new QuestaoAberta($nome_aberta,$titulo_aberta,$resposta_aberta);
		$control = new QuestaoAbertaDAO($manager);
		$control->cadastrarQuestao();

	} 

?>