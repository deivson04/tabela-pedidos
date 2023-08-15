<?php

class Login {

	private $id;
	private $email;
	private $senha;
		
	function getId(){
		return $this->id;
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

	function setEmail($valor) {
		$this->email = $valor;
	}

    function setSenha($valor) {
		$this->senha = $valor;
	}
}
?>