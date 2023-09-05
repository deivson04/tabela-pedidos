<?php

class Pedido {

	private $codigo;
	private $nomeDoCliente;
	private $nomeDaLoja;
	private $dataDoPedido;
    private $bairroDaLoja;
    private $descricaoDoPedido;
    private $metodoDePagamento;
    private $parcelamento;
	private $login_id;

	function __construct( $codigo, $nomeDoCliente, $nomeDaLoja, $dataDoPedido, $bairroDaLoja, $descricaoDoPedido, $metodoDePagamento, $parcelamento, $login_id) {
			
		$this->codigo = $codigo;	
		$this -> nomeDoCliente = $nomeDoCliente;
		$this -> nomeDaLoja = $nomeDaLoja;
		$this -> dataDoPedido = $dataDoPedido;
        $this -> bairroDaLoja = $bairroDaLoja;
        $this -> descricaoDoPedido = $descricaoDoPedido;
        $this -> metodoDePagamento = $metodoDePagamento;
        $this -> parcelamento = $parcelamento;
	    $this -> login_id = $login_id;
	}
		
	function getCodigo(){
		return $this -> codigo;
	}
    
    function getNomeDoCliente() {
		return $this -> nomeDoCliente;
	}
    
	function getNomeDaLoja() {
		return $this -> nomeDaLoja;
	}

	function getDataDoPedido() {
		return $this -> dataDoPedido;
	}

	function getBairroDaLoja() {
		return $this -> bairroDaLoja;
	}

    function getDescricaoDoPedido() {
		return $this -> descricaoDoPedido;
	}

    function getMetodoDePagamento() {
		return $this -> metodoDePagamento;
	}

    function getParcelamento() {
		return $this -> parcelamento;
	}

	function getLogin_id() {
		return $this -> login_id;
	}

	function setCodigo($valor){
			$this->codigo = $valor;
	}

	function setNomeDoCliente($valor) {
		$this -> nomeDoCliente = $valor;
	}

	function setNomeDoSalao($valor) {
		$this -> nomeDoSalao = $valor;
	}

	function setDataDoPedido($valor) {
		$this -> dataDoPedido  = $valor;
	}

    function setBairroDoSalao($valor) {
		$this -> bairroDoSalao  = $valor;
	}

    function setDescricaoDoPedido($valor) {
		$this -> descricaoDoPedido = $valor;
	}

    function setMetodoDePagamento($valor) {
		$this -> metodoDePagamento  = $valor;
	}

    function setParcelamento($valor) {
		$this -> parcelamento = $valor;
	}
    
	function setLogin_id($valor) {
		$this -> login_id = $valor;
	}
}
?>