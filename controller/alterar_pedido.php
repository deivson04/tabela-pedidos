<?php
   require '../model/repositorio_pedidos.php';
   // echo "<pre>";
   // var_dump($_REQUEST);
   // die;
   
   //Cria um novo objeto com as entradas recebidas pelo usuário
   $pedidoRecebido = new Pedido($_REQUEST['codigo'], $_REQUEST['nomeDoCliente'], $_REQUEST['nomeDoSalao'], $_REQUEST['dataDoPedido'], $_REQUEST['bairroDoSalao'], $_REQUEST['descricaoDoPedido'], $_REQUEST['metodoDePagamento'], $_REQUEST['parcelamento']);
   
   //Atualiza o pedido existente no banco com os dados recebidos pelo form
   $repositorio->alterarPedido($pedidoRecebido);
   
   header('Location: ../index.php?editado=true');
   exit;
?>

