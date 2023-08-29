<?php
    
    //Interface de repositorio para pedidos. 
	interface IRepositorioPedido{
		public function cadastrarPedido($pedido);
		public function removerPedido($codigo);
		public function alterarPedido($pedido);
		public function buscarPedido($codigo);
		public function getListaPedido();
	}
?>


