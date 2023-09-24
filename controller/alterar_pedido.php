<?php
   require '../model/repositorio_pedidos.php';
    //echo "<pre>";
    //var_dump($_REQUEST);
    //die;
   
   //Cria um novo objeto com as entradas recebidas pelo usuário
   $pedidoRecebido = new Pedido();
   $pedidoRecebido->setCodigo($_REQUEST['codigo']);
   $pedidoRecebido->setNomeDoCliente($_REQUEST['nomeDoCliente']);
   $pedidoRecebido->setNomeDaLoja($_REQUEST['nomeDaLoja']);
   $pedidoRecebido->setDataDoPedido($_REQUEST['dataDoPedido']);
   $pedidoRecebido->setBairroDaLoja($_REQUEST['bairroDaLoja']);
   $pedidoRecebido->setDescricaoDoPedido($_REQUEST['descricaoDoPedido']);
   $pedidoRecebido->setMetodoDePagamento($_REQUEST['metodoDePagamento']);
   $pedidoRecebido->setParcelamento($_REQUEST['parcelamento']);
   $pedidoRecebido->setLoginId($_REQUEST['login_id']);
   //Atualiza o pedido existente no banco com os dados recebidos pelo form
   $repositorio->alterarPedido($pedidoRecebido);
   
   header('Location: ../index.php?editado=true');
   exit;
?>

