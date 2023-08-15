<?php
	require '../model/repositorio_pedidos.php';
	
	$repositorio->removerPedido($_REQUEST['codigo']);

	header('Location: ../index.php?deletado=true');
    exit;
?>

