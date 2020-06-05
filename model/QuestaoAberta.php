<?php 

class QuestaoAberta{

		public $nome;
		public $titulo;
		public $rubrica;


		function __construct($nome,$titulo,$rubrica){
			$this->nome = $nome;
			$this->titulo = $titulo;
			$this->rubrica = $rubrica;
		}
	}


?>