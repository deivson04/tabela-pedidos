<?php
   require '../model/repositorio_pedidos.php';
   
   //Cria um novo objeto com os dados recebidos pelo form
   $pedidoRecebido = new Pedido();
   $pedidoRecebido->setNomeDoCliente($_REQUEST['nomeDoCliente']);
   $pedidoRecebido->setNomeDaLoja($_REQUEST['nomeDaLoja']);
   $pedidoRecebido->setDataDoPedido($_REQUEST['dataDoPedido']);
   $pedidoRecebido->setBairroDaLoja($_REQUEST['bairroDaLoja']);
   $pedidoRecebido->setDescricaoDoPedido($_REQUEST['descricaoDoPedido']);
   $pedidoRecebido->setMetodoDePagamento($_REQUEST['metodoDePagamento']);
   $pedidoRecebido->setParcelamento($_REQUEST['parcelamento']);
   $pedidoRecebido->setLoginId($_REQUEST['login_id']);
   
   //Envia para o repositorio
   $repositorio->cadastrarPedido($pedidoRecebido);
   //echo "<pre>";
    //var_dump($repositorio);
    //die; 
   header('Location: ../index.php');
   exit;
?>

