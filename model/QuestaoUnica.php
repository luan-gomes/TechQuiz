<?php 

class QuestaoUnica{

		public $nome;
		public $titulo;
		public $a;
		public $b;
		public $c;
		public $d;
		public $e;
		public $correta;


		function __construct($nome,$titulo,$a,$b,$c,$d,$e,$correta){
			$this->nome = $nome;
			$this->titulo = $titulo;
			$this->a = $a;
			$this->b = $b;
			$this->c = $c;
			$this->d = $d;
			$this->e = $e;
			$this->correta = $correta;
		}
	}


?>