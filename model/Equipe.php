<?php

	class Equipe{

		public $nome;
		public $login;
		public $senha;
		public $evento;
		public $membro1;
		public $matricula1;
		public $membro2;
		public $matricula2;
		public $membro3;
		public $matricula3;
		public $membro4;
		public $matricula4;
		public $membro5;
		public $matricula5;

		function __construct($nome,$senha,$login,$evento,$membro1,$matricula1,$membro2,$matricula2,$membro3,$matricula3,$membro4,$matricula4,$membro5,$matricula5){
			$this->nome = $nome;
			$this->login = $login;
			$this->evento = $evento;
			$this->senha = $senha;
			$this->membro1 = $membro1;
			$this->matricula1 = $matricula1;
			$this->matricula2 = $matricula2;
			$this->membro2 = $membro2;
			$this->matricula3 = $matricula3;
			$this->membro3 = $membro3;
			$this->matricula4 = $matricula4;
			$this->membro4 = $membro4;
			$this->matricula5 = $matricula5;
			$this->membro5 = $membro5;
		}
	}

?>