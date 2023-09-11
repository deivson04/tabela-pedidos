<?php

class Login {

	private $id;
	private $nome;
	private $email;
	private $senha;

	function __construct( $id, $nome, $email, $senha) {
			
		$this->id = $id;	
		$this -> nome = $nome;
		$this -> email = $email;
	    $this -> senha = $senha;
	}
	
	function getId(){
		return $this->id;
	}
    
    function getNome() {
		return $this->nome;
	}
	
	function getEmail() {
		return $this->email;
	}
    
	function getSenha() {
		return $this->senha;
	}

	function setId($valor){
			$this->id = $valor;
	}
    
	function setNome($valor) {
		$this->nome = $valor;
	}
		
	function setEmail($valor) {
		$this->email = $valor;
	}

    function setSenha($valor) {
		$this->senha = $valor;
	}
}
?>