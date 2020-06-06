<?php 

class QuestaoVF{

		public $nome;
		public $titulo;
		public $veracidade;


		function __construct($nome,$titulo,$veracidade){
			$this->nome = $nome;
			$this->titulo = $titulo;
			$this->veracidade = $veracidade;
		}
	}


?>