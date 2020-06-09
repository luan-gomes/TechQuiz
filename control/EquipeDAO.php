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
			//Insert na tabela equipe
			$sql = 'INSERT INTO equipe VALUES(null,"'.$this->equipe->nome.'","'.$this->equipe->evento.'","'.$this->equipe->login.'","'.$this->equipe->senha.'")';
			mysqli_query($conexao,$sql); 

			//Insert membros
			$sql1 = 'INSERT INTO membros VALUES("'.$this->equipe->matricula1.'","'.$this->equipe->membro1.'")';
			mysqli_query($conexao,$sql1);
			$sql11 = 'INSERT INTO equipe_has_membros VALUES(null,(SELECT max(id) FROM equipe),"'.$this->equipe->matricula1.'")';
			mysqli_query($conexao,$sql11);

			$sql2 = 'INSERT INTO membros VALUES("'.$this->equipe->matricula2.'","'.$this->equipe->membro2.'")';
			mysqli_query($conexao,$sql2);
			$sql21 = 'INSERT INTO equipe_has_membros VALUES(null,(SELECT max(id) FROM equipe),"'.$this->equipe->matricula2.'")';
			mysqli_query($conexao,$sql21);

			$sql3 = 'INSERT INTO membros VALUES("'.$this->equipe->matricula3.'","'.$this->equipe->membro3.'")';
			mysqli_query($conexao,$sql3);
			$sql31 = 'INSERT INTO equipe_has_membros VALUES(null,(SELECT max(id) FROM equipe),"'.$this->equipe->matricula3.'")';
			mysqli_query($conexao,$sql31);

			$sql4 = 'INSERT INTO membros VALUES("'.$this->equipe->matricula4.'","'.$this->equipe->membro4.'")';
			mysqli_query($conexao,$sql4);
			$sql41 = 'INSERT INTO equipe_has_membros VALUES(null,(SELECT max(id) FROM equipe),"'.$this->equipe->matricula4.'")';
			mysqli_query($conexao,$sql41);

			$sql5 = 'INSERT INTO membros VALUES("'.$this->equipe->matricula5.'","'.$this->equipe->membro5.'")';
			mysqli_query($conexao,$sql5);
			$sql51 = 'INSERT INTO equipe_has_membros VALUES(null,(SELECT max(id) FROM equipe),"'.$this->equipe->matricula5.'")';
			mysqli_query($conexao,$sql51);
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

		$manager = new Equipe($nome_equipe,$senha,$username,$evento,$membro1,$matricula1,$membro2,$matricula2,$membro3,$matricula3,$membro4,$matricula4,$membro5,$matricula5);
		$control = new EquipeDAO($manager);
		$control->cadastrarEquipe();

	}