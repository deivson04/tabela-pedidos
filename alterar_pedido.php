<?php
   require 'repositorio_pedidos.php';
   
   //Cria um novo objeto com as entradas recebidas pelo usuário
   $pedidoRecebido = new Pedido($_REQUEST['codigo'], $_REQUEST['nomeDoCliente'], $_REQUEST['nomeDoSalao'], $_REQUEST['dataDoPedido'], $_REQUEST['bairroDoSalao'], $_REQUEST['descricaoDoPedido'], $_REQUEST['metodoDePagamento'], $_REQUEST['parcelamento']);
   
   //Atualiza o pedido existente no banco com os dados recebidos pelo form
   $repositorio->alterarPedido($pedidoRecebido);
   
   header('Location: index.php');
   exit;
?>

