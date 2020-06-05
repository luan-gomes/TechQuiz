<?php 

class QuestaoVF{

		public $nome;
		public $titulo;
		public $afirmacao;
		public $veracidade;


		function __construct($nome,$titulo,$afirmacao,$veracidade){
			$this->nome = $nome;
			$this->titulo = $titulo;
			$this->afirmacao = $afirmacao;
			$this->veracidade = $veracidade;
		}
	}


?>