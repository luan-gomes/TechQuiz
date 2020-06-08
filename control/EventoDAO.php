<?php

	session_start();
	include_once('../conexao-bd.php');
	include_once('../model/Evento.php');

	class EventoDAO{

		public $evento;

		function __construct($evento){
			$this->evento = $evento;
		}

		function cadastrarEvento(){


			$conexao = abrirConexao();
			$sql = 'INSERT INTO evento VALUES(null,"'.$this->evento->nome.'","'.$this->evento->semestre.'")';
			mysqli_query($conexao,$sql);
			fecharConexao($conexao);

		}

		function vincularQuestoes(){
			
		}

	}

	if(isset($_POST['cad_evento'])){

		$semestre =  $_POST['semestre'];
		$nome_evento =  $_POST['nome_evento'];

		$manager = new Evento($nome_evento,$semestre);
		$control = new EventoDAO($manager);
		$control->cadastrarEvento();

	}