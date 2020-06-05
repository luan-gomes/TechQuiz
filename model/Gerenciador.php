<?php

	class Gerenciador{

		public $login;
		public $senha;

		function __construct($login, $senha){
			$this->login = $login;
			$this->senha = $senha;
		}
	}

?>