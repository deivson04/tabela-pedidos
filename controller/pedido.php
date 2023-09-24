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
	

	function __construct() {
	   
	}
		
	function getCodigo(){
		return $this->codigo;
	}
    
    function getNomeDoCliente() {
		return $this->nomeDoCliente;
	}
    
	function getNomeDaLoja() {
		return $this->nomeDaLoja;
	}

	function getDataDoPedido() {
		return $this->dataDoPedido;
	}

	function getBairroDaLoja() {
		return $this->bairroDaLoja;
	}

    function getDescricaoDoPedido() {
		return $this->descricaoDoPedido;
	}

    function getMetodoDePagamento() {
		return $this->metodoDePagamento;
	}

    function getParcelamento() {
		return $this->parcelamento;
	}

	function getLoginId() {
		return $this->login_id;
	}

	function setCodigo($valor){
			$this->codigo = $valor;
	}

	function setNomeDoCliente($valor) {
		$this->nomeDoCliente = $valor;
	}

	function setNomeDaLoja($valor) {
		$this->nomeDaLoja = $valor;
	}

	function setDataDoPedido($valor) {
		$this->dataDoPedido  = $valor;
	}

    function setBairroDaLoja($valor) {
		$this->bairroDaLoja  = $valor;
	}

    function setDescricaoDoPedido($valor) {
		$this->descricaoDoPedido = $valor;
	}

    function setMetodoDePagamento($valor) {
		$this->metodoDePagamento  = $valor;
	}

    function setParcelamento($valor) {
		$this->parcelamento = $valor;
	}

	function setLoginId($valor) {
		$this->login_id = $valor;
	}
}
?>