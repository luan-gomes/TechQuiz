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

			//Inserir na tabela evento
			$sql = 'INSERT INTO evento VALUES(null,"'.$this->evento->nome.'","'.$this->evento->semestre.'")';
			mysqli_query($conexao,$sql);

			//Criar o primeiro bloco de perguntas
			$sql_two = 'INSERT INTO bloco VALUES(null,"Bloco 1",(SELECT MAX(id) from evento))';
			mysqli_query($conexao,$sql_two);

			//Vincular questões ao primeiro bloco
			$bloco1 = array();
			$contador = count($bloco1);
			$pode_inserir;

			while($contador<20) { 

				$gera = rand(1,30);
				$contador = count($bloco1);
				$pode_inserir = true;

				if($contador==0){
					$sql_bloco1 = 'INSERT INTO questoes_has_bloco VALUES(null,(SELECT questoes_id from questao_multipla where id="'.$gera.'"),(SELECT MAX(id) from bloco),(SELECT MAX(id) from evento))';
					mysqli_query($conexao,$sql_bloco1);
					array_push($bloco1,$gera);

				} else {

					for ($a=0; $a < $contador; $a++) { 

						if($bloco1[$a]==$gera){
							$pode_inserir = false;
							break;
						} 

					} 

					if ($pode_inserir==true){
						$sql_bloco1 = 'INSERT INTO questoes_has_bloco VALUES(null,(SELECT questoes_id from questao_multipla where id="'.$gera.'"),(SELECT MAX(id) from bloco),(SELECT MAX(id) from evento))';
						mysqli_query($conexao,$sql_bloco1);
						array_push($bloco1,$gera);
					}
				
				}
				
			}

			//Criar o segund bloco de perguntas
			$sql_three = 'INSERT INTO bloco VALUES(null,"Bloco 2",(SELECT MAX(id) from evento))';
			mysqli_query($conexao,$sql_three);

			//Vincular questões ao segundo bloco
			$bloco2 = array();
			$contador_bloco_2 = count($bloco2);

			while($contador_bloco_2<20) { 

				$gera = rand(1,30);
				$contador_bloco_2 = count($bloco2);
				$pode_inserir = true;

				if($contador_bloco_2==0){
					$sql_bloco2 = 'INSERT INTO questoes_has_bloco VALUES(null,(SELECT questoes_id from questao_aberta where id="'.$gera.'"),(SELECT MAX(id) from bloco),(SELECT MAX(id) from evento))';
					mysqli_query($conexao,$sql_bloco2);
					array_push($bloco2,$gera);

				} else {

					for ($a=0; $a < $contador_bloco_2; $a++) { 

						if($bloco2[$a]==$gera){
							$pode_inserir = false;
							break;
						} 

					} 

					if ($pode_inserir==true){
						$sql_bloco2 = 'INSERT INTO questoes_has_bloco VALUES(null,(SELECT questoes_id from questao_aberta where id="'.$gera.'"),(SELECT MAX(id) from bloco),(SELECT MAX(id) from evento))';
						mysqli_query($conexao,$sql_bloco2);
						array_push($bloco2,$gera);
					}
				
				}
				
			}

			//Criar o terceiro bloco de perguntas
			$sql_four = 'INSERT INTO bloco VALUES(null,"Bloco 3",(SELECT MAX(id) from evento))';
			mysqli_query($conexao,$sql_four);

			//Vincular questões ao terceiro bloco
			$bloco3 = array();
			$contador_bloco_3 = count($bloco3);

			while($contador_bloco_3<10) { 

				$gera = rand(1,20);
				$contador_bloco_3 = count($bloco3);
				$pode_inserir = true;

				if($contador_bloco_3==0){
					$sql_bloco3 = 'INSERT INTO questoes_has_bloco VALUES(null,(SELECT questoes_id from questao_vf where id="'.$gera.'"),(SELECT MAX(id) from bloco),(SELECT MAX(id) from evento))';
					mysqli_query($conexao,$sql_bloco3);
					array_push($bloco3,$gera);

				} else {

					for ($a=0; $a < $contador_bloco_3; $a++) { 

						if($bloco3[$a]==$gera){
							$pode_inserir = false;
							break;
						} 

					} 

					if ($pode_inserir==true){
						$sql_bloco3 = 'INSERT INTO questoes_has_bloco VALUES(null,(SELECT questoes_id from questao_vf where id="'.$gera.'"),(SELECT MAX(id) from bloco),(SELECT MAX(id) from evento))';
						mysqli_query($conexao,$sql_bloco3);
						array_push($bloco3,$gera);
					}
				
				}
				
			}

			fecharConexao($conexao);

		}

	} if(isset($_POST['cad_evento'])){

		$semestre =  $_POST['semestre'];
		$nome_evento =  $_POST['nome_evento'];

		$manager = new Evento($nome_evento,$semestre);
		$control = new EventoDAO($manager);
		$control->cadastrarEvento();

	}