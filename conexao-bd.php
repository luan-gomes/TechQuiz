<?php

	define ('HOSTNAME','localhost');
	define ('USERNAME', 'root');
	define ('PASSWORD','');
	define ('DATABASE','techquiz');
	define ('CHARSET','utf8');


	/*function abrirConexao(){

		$pdo = new PDO('mysql:host='.HOSTNAME.';dbname='.DATABASE,USERNAME,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}

	function fecharConexao($pdo){

		$pdo = null;
		
	}*/

	
	function abrirConexao(){
		$sql = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE) or die(mysqli_error());
		mysqli_set_charset($sql,CHARSET) or die (mysqli_error($sql));
		return $sql;
	}

	function fecharConexao($sql){
		@mysqli_close($sql) or die (mysqli_error($sql));
	}

?>