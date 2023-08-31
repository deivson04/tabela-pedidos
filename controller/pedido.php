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

	function __construct( $codigo, $nomeDoCliente, $nomeDaLoja, $dataDoPedido, $bairroDaLoja, $descricaoDoPedido, $metodoDePagamento, $parcelamento) {
			
		$this->codigo = $codigo;	
		$this -> nomeDoCliente = $nomeDoCliente;
		$this -> nomeDaLoja = $nomeDaLoja;
		$this -> dataDoPedido = $dataDoPedido;
        $this -> bairroDaLoja = $bairroDaLoja;
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