<?php

class Pedido {

	public $codigo;
	public $nomeDoCliente;
	public $nomeDoSalao;
	public $dataDoPedido;
    public $bairroDoSalao;
    public $descricaoDoPedido;
    public $metodoDePagamento;
    public $parcelamento;

	function __construct( $codigo, $nomeDoCliente, $nomeDoSalao, $dataDoPedido, $bairroDoSalao, $descricaoDoPedido, $metodoDePagamento, $parcelamento) {
			
		$this->codigo = $codigo;	
		$this -> nomeDoCliente = $nomeDoCliente;
		$this -> nomeDoSalao = $nomeDoSalao;
		$this -> dataDoPedido = $dataDoPedido;
        $this -> bairroDoSalao = $bairroDoSalao;
        $this -> descricaoDoPedido = $descricaoDoPedido;
        $this -> metodoDePagamento = $metodoDePagamento;
        $this -> parcelamento = $parcelamento;
	}
		
	function getCodigo(){
		return $this -> codigo;
	}
    
    function getNomeDoCliente() {
		return $this -> nomeDoCliente;
	}
    
	function getNomeDoSalao() {
		return $this -> nomeDoSalao;
	}

	function getDataDoPedido() {
		return $this -> dataDoPedido;
	}

	function getBairroDoSalao() {
		return $this -> bairroDoSalao;
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
}
?>