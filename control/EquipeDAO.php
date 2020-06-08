<?php

	session_start();
	include_once('../conexao-bd.php');
	include_once('../model/Equipe.php');

	class EquipeDAO{

		public $equipe;

		function __construct($equipe){
			$this->equipe = $equipe;
		}

		function cadastrarEquipe(){


			$conexao = abrirConexao();
			$sql = 'INSERT INTO gerenciador VALUES(null,"'.$this->gerenciador->login.'","'.$this->gerenciador->senha.'")';
			mysqli_query($conexao,$sql);
			fecharConexao($conexao);

		}

	} if(isset($_POST['cad_equipe'])){

		$evento =  $_POST['evento'];
		$username =  $_POST['username'];
		$senha =  $_POST['senha'];
		$nome_equipe =  $_POST['nome_equipe'];
		$membro1 =  $_POST['membro1'];
		$matricula1 =  $_POST['matricula1'];
		$membro2 =  $_POST['membro2'];
		$matricula2 =  $_POST['matricula2'];
		$membro3 =  $_POST['membro3'];
		$matricula3 =  $_POST['matricula3'];
		$membro4 =  $_POST['membro4'];
		$matricula4 =  $_POST['matricula4'];
		$membro5 =  $_POST['membro5'];
		$matricula5 =  $_POST['matricula5'];

		$manager = new Equipe($nome_evento,$semestre);
		$control = new EquipeDAO($manager);
		$control->cadastrarEquipe();

	}