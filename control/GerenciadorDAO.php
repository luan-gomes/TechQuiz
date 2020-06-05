<?php

	session_start();
	include_once('../conexao-bd.php');
	include_once('../model/Gerenciador.php');

	class GerenciadorDAO{

		public $gerenciador;

		function __construct($gerenciador){
			$this->gerenciador = $gerenciador;
		}

		function cadastrarGerenciador(){

			$conexao = abrirConexao();
			$sql = 'INSERT INTO gerenciador VALUES(null,"'.$this->gerenciador->login.'","'.$this->gerenciador->senha.'")';
			mysqli_query($conexao,$sql);
			fecharConexao($conexao);

		}

		function alterarSenha($senhanova, $id){


			$conexao = abrirConexao();
			$sql = 'UPDATE gerenciador SET senha="'.$senhanova.'" WHERE id="'.$id.'"';
			mysqli_query($conexao,$sql);
			fecharConexao($conexao);

		}

		function validarLogin(){

			$conexao = abrirConexao();
			$sql = 'SELECT * FROM gerenciador WHERE login="'.$this->gerenciador->login.'" AND senha="'.$this->gerenciador->senha.'"';
			$resultado = mysqli_query($conexao,$sql);

			if(mysqli_num_rows($resultado)>0){
				$dados = mysqli_fetch_array($resultado);
				$_SESSION["id"] = $dados['id'];
				$_SESSION["usuario"] = $dados['login'];
				header('Location: ../welcome.php');
			}

			fecharConexao($conexao);

		}

	}


	if(isset($_POST['cad-gerenciador'])){

		$username =  $_POST['username'];
		$password =  $_POST['pass'];

		$manager = new Gerenciador($username,$password);
		$control = new GerenciadorDAO($manager);
		$control->cadastrarGerenciador();

	} else if(isset($_POST['alterar-senha-gerenciador'])){

		$id = $_POST['id'];
		$username = $_POST['usuario'];
		$password =  $_POST['senha-antiga'];
		$passtwo = $_POST['senha-nova'];

		$manager = new Gerenciador($username,$password);
		$control = new GerenciadorDAO($manager);
		$control->alterarSenha($passtwo,$id);

	} else if(isset($_POST['entrar-login-gerenciador'])){

		$login = $_POST['username'];
		$senha = $_POST['pass'];

		$gerenciador = new Gerenciador($login,$senha);
		$control = new GerenciadorDAO($gerenciador);
		$control->validarLogin();

	}
?>