<?php
	require 'repositorio_pedidos.php';
	
	$repositorio->removerPedido($_REQUEST['codigo']);

	header('Location: index.php');
    exit;
?>

